<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Coupon;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon(){
    	$coupon=DB::table('coupons')->get();
    	return view('admin.coupon.coupon', compact('coupon'));
    }
    public function storecoupon(Request $request){
    	//$data=array();
    	//$data['coupon']=$request->coupon;
    	//$data['discount']=$request->discount;
    	//DB::table('coupons')->insert($data);

    	$coupon=new Coupon();
	    $coupon->coupon=$request->coupon;
	    $coupon->discount=$request->discount;
	    $coupon->save();

    	$notification=array(
        		'messege'=>'Coupon Inserted Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }
    public function deletecoupon($id){
    	DB::table('coupons')->where('id', $id)->delete();
    	$notification=array(
        		'messege'=>'Coupon Deleted Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }
    public function editcoupon($id){
    	$coupon=DB::table('coupons')->where('id', $id)->first();
    	return view('admin.coupon.edit_coupon', compact('coupon'));
    }
    public function updatecoupon(Request $request, $id){
    	$data=array();
    	$data['coupon']=$request->coupon;
    	$data['discount']=$request->discount;
    	DB::table('coupons')->where('id', $id)->update($data);

    	$notification=array(
        		'messege'=>'Coupon Updated Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->route('admin.coupon')->with($notification); 
    }

    
}
