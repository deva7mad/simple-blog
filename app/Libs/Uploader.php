<?php

namespace App\Libs;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Uploader
{
    /**
     * @param $file
     * @param string $path
     * @param string $disk
     * @return string
     * @throws Exception
     */
    public static function upload($file, string $path = 'images/', string $disk = 'public'): string
    {
        [ $name, $file ] = self::sanitizeFile($file);

        Storage::disk($disk)->put($path.$name, $file);

        return $name;
    }

    /**
     * @param $file
     *
     * @return mixed
     *
     * @throws Exception
     */
    public static function sanitizeFile($file): array
    {
        if (is_base64($file)) {
            $file_data = base64_decode($file);
            $f = finfo_open();
            $mime = finfo_buffer($f, $file_data, FILEINFO_MIME_TYPE);
            $name = Str::random(5).time().'.'.Str::after($mime, '/');

            return [$name, base64_decode($file)];
        }

        $name = Str::random(5).time().'.'.$file->getClientOriginalExtension();

        return [$name, file_get_contents($file)];
    }
}
