<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\File;

class UploadFileController extends Controller
{
    public function index() {
      $files = File::get();
        return view('Teacher.file-upload',[
         'files' => $files
        ]);
     }
     public function UploadFile(Request $request) {
        $files = new File();
        $files->level = $request->level;
        $files->name = $request->name;
        $any_file = $request->file('file_path')->getClientOriginalName();
        $request->file('file_path')->storeAs('public/files',$request->file_path->getClientOriginalName());
        $files->file_path =  $any_file;
        $files->save();
        return redirect()->back()->with('success','File uploaded successfully');
   
       
     }

     public function deleteFiles($id)
    {
        $files = File::find($id)->delete();
        return redirect()->back()->with('success','File Deleted Successfully!!!');
    }

}
