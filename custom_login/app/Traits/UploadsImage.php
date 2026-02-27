<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadsImage
{
    /**
     * Handle the image upload and return the public URL.
     *
     * @param UploadedFile|null $file
     * @param string $directory
     * @param string|null $oldPath Optionally delete the old image
     * @return string|null
     */
    public function uploadImage(?UploadedFile $file, string $directory = 'images', ?string $oldPath = null): ?string
    {
        if (!$file) {
            return null;
        }

        // Delete old image if it exists and isn't a default placeholder
        if ($oldPath && !str_starts_with($oldPath, 'http')) {
            $relativePath = str_replace('/storage/', '', parse_url($oldPath, PHP_URL_PATH));
            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }
        }

        // Store the new image
        $path = $file->store($directory, 'public');

        return Storage::url($path);
    }
}
