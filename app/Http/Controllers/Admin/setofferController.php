<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;


class setofferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function setoffer(){
        $edit_f_p_o_t=DB::table('front_top_banner_title')->first();
    	$editofferdate=DB::table('offer_time')->first();
        $offer_banner=DB::table('offer_banner')->first();
    	return view('admin.offer.offer', compact('editofferdate','edit_f_p_o_t', 'offer_banner'));

    }
    public function updatedate(Request $request,$id){

    	$data=array();
    	$data['date']=$request->date;
    	$data['h']=$request->h;
    	$data['m']=$request->m;
    	$data['s']=$request->s;
        $data['hot_offer_title']=$request->hot_offer_title;
    	DB::table('offer_time')->where('id', $id)->update($data);

    	$notification=array(
        		'messege'=>'Offer Time Updated Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }

    public function updatefrontpageoffertitle(Request $request,$id){
        $data=array();
        $data['front_page_offer_title']=$request->front_page_offer_title;
        DB::table('front_top_banner_title')->where('id', $id)->update($data);

        $notification=array(
                'messege'=>'Offer Title Updated Successfully',
                'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }

    public function updateofferbanner(Request $request,$id){
        
        $data=array();
        $offer_banner_image_one=$request->offer_banner_image_one;
        $offer_banner_image_two=$request->offer_banner_image_two;

        $old_image_one=$request->old_image_one;
        $old_image_two=$request->old_image_two;

        if($offer_banner_image_one && $offer_banner_image_two){
            unlink($old_image_one);
            unlink($old_image_two);
            $offer_banner_image_one_name= hexdec(uniqid()).'.'.$offer_banner_image_one->getClientOriginalExtension();
                Image::make($offer_banner_image_one)->resize(1100,400)->save('public/media/banner/'.$offer_banner_image_one_name);
                $data['offer_banner_image_one']='public/media/banner/'.$offer_banner_image_one_name;

            $offer_banner_image_two_name= hexdec(uniqid()).'.'.$offer_banner_image_two->getClientOriginalExtension();
                Image::make($offer_banner_image_two)->resize(1100,400)->save('public/media/banner/'.$offer_banner_image_two_name);
                $data['offer_banner_image_two']='public/media/banner/'.$offer_banner_image_two_name;

                $update_banner = DB::table('offer_banner')->where('id', $id)->update($data);
        }elseif ($offer_banner_image_one) {
            unlink($old_image_one);
            $offer_banner_image_one_name= hexdec(uniqid()).'.'.$offer_banner_image_one->getClientOriginalExtension();
                Image::make($offer_banner_image_one)->resize(1100,400)->save('public/media/banner/'.$offer_banner_image_one_name);
                $data['offer_banner_image_one']='public/media/banner/'.$offer_banner_image_one_name;

            $update_banner = DB::table('offer_banner')->where('id', $id)->update($data);

        }elseif ($offer_banner_image_two) {
            unlink($old_image_two);
            $offer_banner_image_two_name= hexdec(uniqid()).'.'.$offer_banner_image_two->getClientOriginalExtension();
                Image::make($offer_banner_image_two)->resize(1100,400)->save('public/media/banner/'.$offer_banner_image_two_name);
                $data['offer_banner_image_two']='public/media/banner/'.$offer_banner_image_two_name;

                $update_banner = DB::table('offer_banner')->where('id', $id)->update($data);
        }else{
            $update_banner = DB::table('offer_banner')->where('id', $id)->update($data);
        }

        if($update_banner){
            $notification=array(
                'messege'=>'Banner Updated Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Nothing To Update ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification); 
        }


    }
}
