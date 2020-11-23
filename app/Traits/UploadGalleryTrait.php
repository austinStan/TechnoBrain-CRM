<?php

namespace App\Traits;

trait UploadGalleryTrait
{
    public function setGallery($value)
    {
        $attribute_name = "images";
        $disk = "public";
        $destination_path = $this->folder;

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     static::deleting(function ($obj) {
    //         if (count((array) $obj->images)) {
    //             foreach ($obj->images as $file_path) {
    //                 \Storage::disk('public_folder')->delete($file_path);
    //             }
    //         }
    //     });
    // }
}
