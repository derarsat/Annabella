<?php

namespace App\Helper;

use Illuminate\Support\Str;

trait PdfHelper
{
    public function pdfUploader($file, $path): string
    {
        $public_path = "/public/pdf/uploads/";
        $extension       = $file->getClientOriginalExtension();
        $file_name       = $path . Str::random(30) . '.' . $extension;
        $url             = $file->storeAs($public_path, $file_name);
        $url             = preg_replace("/public/", "", $url);
        return $url;
    }
}
