<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tempFilePath;
    protected $newFileName;
    protected $destinationPath;

    public function __construct($tempFilePath, $newFileName, $destinationPath)
    {
        $this->tempFilePath = $tempFilePath;
        $this->newFileName = $newFileName;
        $this->destinationPath = $destinationPath;
    }

    public function handle()
    {
        $fullTempFilePath = storage_path('app/' . $this->tempFilePath);
        $fullDestinationPath = public_path($this->destinationPath . '/' . $this->newFileName);

        File::move($fullTempFilePath, $fullDestinationPath);
    }
}
