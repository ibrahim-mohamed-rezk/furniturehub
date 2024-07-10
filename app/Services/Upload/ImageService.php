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
}
