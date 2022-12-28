<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    /**
     * @param UploadedFile $file
     * @param string $path
     * @return string
     */
    protected function upload(UploadedFile $file, string $path): string
    {
        return "/storage/" . $file->store($path, "public");
    }

    /**
     * @param string $path
     * @return bool
     */
    protected function delete(string $path): bool
    {
        return Storage::delete($path);
    }
}
