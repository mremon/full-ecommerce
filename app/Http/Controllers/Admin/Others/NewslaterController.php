<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Front\Newslater;
use DB;

class NewslaterController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newslater(){
    	$subscribe=DB::table('newslaters')->get();
    	return view('admin.others.newslater', compact('subscribe'));
    }
    public function deletenewslater($id){
    	DB::table('newslaters')->where('id', $id)->delete();
    	$notification=array(
        		'messege'=>'Newslater Deleted Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }
}
