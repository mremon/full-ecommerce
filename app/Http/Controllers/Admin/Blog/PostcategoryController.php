<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Postcategory;
use DB;

class PostcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function postcategory(){
    	$postcategory=DB::table('post_categories')->get();
    	return view('admin.blog.post_category', compact('postcategory'));
    }

    public function storepostcategory(Request $request){

    	$data=array();
    	$data['category_name_en']=$request->category_name_en;

        $post_cat_slug = strtolower($request->category_name_en);
        $data['category_name_en_slug']=preg_replace('/\s+/', '-', $post_cat_slug);

    	$data['category_name_bn']=$request->category_name_bn;

        $post_cat_bn_slug = strtolower($request->category_name_bn);
        $data['category_name_bn_slug']=preg_replace('/\s+/', '-', $post_cat_bn_slug);

    	$post = DB::table('post_categories')->insert($data);
    	if ($post) {
    		$notification=array(
	        		'messege'=>'Post category Inserted Successfully',
	        		'alert-type'=>'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		$notification=array(
	        		'messege'=>'Something Wrong',
	        		'alert-type'=>'error'
	        );
	        return Redirect()->back()->with($notification);
    	}

    	
    }

    public function deletepostcategory($id){
    	DB::table('post_categories')->where('id', $id)->delete();
    	$notification=array(
        		'messege'=>'Post category Deleted Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }
    public function editpostcategory($id){
    	$post_categories=DB::table('post_categories')->where('id', $id)->first();
    	return view('admin.blog.edit_post_category', compact('post_categories'));
    }

    public function updatepostcategory(Request $request, $id){
    	$data=array();
    	$data['category_name_en']=$request->category_name_en;

        $post_cat_slug = strtolower($request->category_name_en);
        $data['category_name_en_slug']=preg_replace('/\s+/', '-', $post_cat_slug);

    	$data['category_name_bn']=$request->category_name_bn;

        $post_cat_bn_slug = strtolower($request->category_name_bn);
        $data['category_name_bn_slug']=preg_replace('/\s+/', '-', $post_cat_bn_slug);

    	DB::table('post_categories')->where('id', $id)->update($data);

    	$notification=array(
        		'messege'=>'Post category Updated Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->route('post.categtory')->with($notification); 
    }
}
