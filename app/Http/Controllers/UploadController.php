<?php

namespace App\Http\Controllers;
use \Input as Input;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FileServices;

class UploadController extends Controller
{
    public function multipleupload(Request $request) {
    	if ($request->hasFile('files')) {
    		$files = $request->File('files');

			$user = session('islogin');
    		$path = 'pictures/user'.$user->id.'/';
    		foreach($files as $file):
    			$filename = time()."_".$file->getClientOriginalName();
    			$file->move(public_path($path), $filename);
    		endforeach;
    		//dd($files);
    		return "selesai upload";
		}
		else
		{
			return "file gak ada";
		}
    }

    public function jsuploadformdata(Request $request) {
        if($request->hasFile('files')) 
        {
            $file = $request->File('files');
            $user = session('islogin');
            $path = 'pictures/user'.$user->id.'/';
            $filename = "jsupload_".time()."_".$file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user ->profilpict = $filename;
            if($user->save())
                return response()->json(['message' => '/'.$path.''.$filename, 'status' => true]);
            return response()->json(['message' => 'gagal save ke db', 'status' => false]);
        }

        return response()->json(['message' => 'gak ada file coy', 'status' => false]);
    }

    public function ajaxupload(Request $request) {
        if($request->ajax())
        {
            if($request->hasFile('files')) 
            {
                $file = $request->File('files');
                $user = session('islogin');
                $ofs = new FileServices();
                $path = $ofs->getpath($user->id);
                $filename = $ofs->generatefilename("ajaxupload",$file->getClientOriginalName());
                $file->move(public_path($path), $filename);
                $user ->profilpict = $filename;
                if($user->save())
                    return response()->json(['message' => '/'.$path.''.$filename, 'status' => true]);
                return response()->json(['message' => 'gagal save ke db', 'status' => false]);
            }
                    
            return response()->json(['message' => 'gak ada file coy', 'status' => false]);
        }
        
        return response()->json(['message' => 'ajax error', 'status' => false]);
    }
    

}
