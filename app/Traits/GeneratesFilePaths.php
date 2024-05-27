<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait GeneratesFilePaths
{
    public function getFilePath($url)
    {
        if (!str_starts_with($url, 'https://')) {
            return Storage::url('public/' . $url);
        }

        return $url;
    }
}
