<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;


class UpController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pushFile(Request $request)
    {
        $path="uploaded";
      
        if ($request->hasFile('thefile')) {
             echo "got the file.";
            $thefile=$request->file('thefile');
           
            if (Input::file('thefile')->isValid()) {
              Input::file('thefile')->move($path,'abc.txt');
            }
            echo $path;
        }
        else {
            echo "No file.";
            }
        echo $request->input('mytext');
        echo "Done.";
          //$path;
        //return view('home');
    }
}
