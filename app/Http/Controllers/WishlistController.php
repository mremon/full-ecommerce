<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class WishlistController extends Controller
{
    public function addwishlist($id){
    	$user_id=Auth::id();
    	$check=DB::table('wishlists')->where('user_id',$user_id)->where('product_id',$id)->first();

    	$data = array('user_id' => $user_id, 'product_id' => $id);
    	if(Auth::check()){
    		if($check){
    			//$notification=array(
                // 'messege'=>'Already in your Wishlist',
                // 'alert-type'=>'error'
	            //);
	           // return Redirect()->back()->with($notification);
                return \Response::json(['error' => 'Already in your Wishlist']);
    		}else{
    			DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Product Added to Wishlist']);
    			//$notification=array(
                // 'messege'=>'Added to Wishlist',
                // 'alert-type'=>'success'
	            //);
	            //return Redirect()->back()->with($notification);
    		}
    	}else{
    		//$notification=array(
            //     'messege'=>'At first Login To Your Account',
            //     'alert-type'=>'warning'
            //);
            //return Redirect()->back()->with($notification);
            return \Response::json(['error' => 'At first Login To Your Account']);
    	}
    }
}
