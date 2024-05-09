<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DownloadController extends Controller
{
    public function download($file)
    {
        $file_path = storage_path('storage/app/uploads/' . $file);

        if (file_exists($file_path)) {
            return response()->download($file_path, $file);
        } else {
            abort(404, 'File not found.');
        }
    }
}


