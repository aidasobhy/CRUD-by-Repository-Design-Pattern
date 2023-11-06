<?php

namespace App\Helpers;

class imageHelper
{
    public static function uploadImage($folder, $image)
    {
        if (!$image) {
            return '';
        }

        $image->store('/', $folder);
        $filename =$image->hashName();
        return $filename;
    }
}
