<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;


class frontsettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function frontsetting(){
    	$front_all=DB::table('front_setting')->first();

    	return view('admin.others.front_setting', compact('front_all'));
    }
    public function updatefrontsetting(Request $request,$id){
    	$old_site_logo=$request->old_site_logo;
        $data=array();
    	$data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['about']=$request->about;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['youtube']=$request->youtube;
        $data['google']=$request->google;

        $site_logo=$request->site_logo;


        if($site_logo){
            unlink($old_site_logo);
            $site_logo_name= hexdec(uniqid()).'.'.$site_logo->getClientOriginalExtension();
                Image::make($site_logo)->resize(1040,240)->save('public/media/logo/'.$site_logo_name);
                $data['site_logo']='public/media/logo/'.$site_logo_name;

            DB::table('front_setting')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Setting Updated Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);  
        }else{
            $data['site_logo']=$old_site_logo;

            DB::table('front_setting')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Setting Updated Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
