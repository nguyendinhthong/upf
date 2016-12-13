<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Request;
use Session;
use App\FileLink;
class ApplyController extends Controller {

  // Function to get the client ip address
  private function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
      $ipaddress = 'UNKNOWN';

    return $ipaddress;
  }

  public function upload() 
  {
  // getting all of the post data
    $file = array('image' => Input::file('image'));
  // setting up rules
  $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
  // doing the validation, passing post data, rules and the messages
  $validator = Validator::make($file, $rules);
  if ($validator->fails()) {
    // send back to the page with the input data and errors
    return Redirect::to('upload')->withInput()->withErrors($validator);

  }
  else {
    // checking file is valid.
    if (Input::file('image')->isValid()) {
      $destinationPath = 'uploads'; // upload path
      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
      //$fileName = rand(11111,99999).'.'.$extension; // renameing image

      $fileName =uniqid();
      $fileNameFull= $fileName .'.'.$extension;
      Input::file('image')->move($destinationPath, $fileNameFull); // uploading file to given path
      $downloadlink = '/'.$destinationPath.'/'.$fileNameFull;

      //Create a new record for link file
      $filelink = new FileLink;
      $filelink->filename= $fileName;
      $filelink->filecode= $fileName;
      $filelink->fileextension = $extension;
      $filelink->downloadlink=$downloadlink;
      $filelink->displaylink=Request::root().'/upload/'.$fileName;
      //$filelink->ipuploaded= get_client_ip_server();
      $filelink->ipuploaded= 'localhost';

      $filelink->save();

      // sending back with message
     
     // Session::flash('success', 'Upload successfully'); 

      //return Redirect::to('upload')->with('downloadlink',$downloadlink);
      return view('up.getlink')->with('yourfile',$filelink);
    }
    else {
      // sending back with error message.
      Session::flash('error', 'uploaded file is not valid');
      return Redirect::to('upload');
    }
  }
}

public function getlink($id){
  $filelink = FileLink::where('filecode',$id)->first();
  //echo $filelink->filecode;
  return view('up.getlink')->with('yourfile',$filelink);


}


}
