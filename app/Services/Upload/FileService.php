<?php
namespace App\Services\Upload;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class FileService implements ShouldQueue, ShouldBeUnique
{
    public static function uploadFile($image)
    {
        $newFileName = rand(10000,99999).time().'.'.$image->getClientOriginalName();
        $destinationPath = 'storage/files';
        $image->move($destinationPath, $newFileName);

        return '/public/storage/files/'.$newFileName;
    }
}