<?php

namespace App\Services\Upload;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImageService implements ShouldQueue, ShouldBeUnique
{
    public static function uploadImage($image)
    {
        $imageConverter = Image::make($image);
        $imageConverter->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    
        $newFileName = rand(10000, 99999) . time() . '.webp';
        // Save the image to S3 without using StoreAs
        Storage::disk('s3')->put('products/' . $newFileName, $imageConverter->encode('webp',80)->stream(), 's3');
        return 'https://furnturehubactive.s3.eu-central-1.amazonaws.com/products/' . $newFileName;
    }
    public static function uploadImageBlog($image)
    {
        $imageConverter = Image::make($image)->encode('webp', 90);

        $newFileName = rand(10000, 99999) . time() . '.webp';

        Storage::disk('s3')->put('blogs/' . $newFileName, $imageConverter->encode('webp')->stream(), 's3');

        return 'https://furnturehubactive.s3.eu-central-1.amazonaws.com/blogs/' . $newFileName;
    }
    public static function uploadSliderImage($image){
        // Get the original extension of the uploaded image
        $originalExtension = $image->getClientOriginalExtension();

        // Generate a new file name with the original extension
        $newFileName = rand(10000, 99999) . time() . '.' . $originalExtension;

        // Check if the image is a GIF
        if (strtolower($originalExtension) === 'gif') {
            // Directly upload the original GIF to S3 without conversion
            Storage::disk('s3')->put('sliders/' . $newFileName, file_get_contents($image), 's3');
        } else {
            // Convert other formats using Intervention Image
            $imageConverter = Image::make($image);

            // Save the image to S3 in its original format
            Storage::disk('s3')->put('sliders/' . $newFileName, $imageConverter->stream($originalExtension, 90), 's3');
        }

        // Return the S3 URL of the uploaded image
        return 'https://furnturehubactive.s3.eu-central-1.amazonaws.com/sliders/' . $newFileName;
    }
}
