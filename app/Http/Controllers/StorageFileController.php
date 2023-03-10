<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;

class StorageFileController extends Controller
{
public function getPubliclyStorgeFile($filename)

{
    $path = storage_path('app/public/image/'. $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);

    $response->header("Content-Type", $type);

    return $response;
}
}	