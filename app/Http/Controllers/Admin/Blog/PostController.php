<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Post;
use DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create(){
    	$postcategory=DB::table('post_categories')->get();
    	return view('admin.blog.create', compact('postcategory'));
    }

    public function storepost(Request $request){
    	$data=array();
    	$data['post_title_en']=$request->post_title_en;

        $post_slug = strtolower($request->post_title_en);
        $data['post_title_en_slug']=preg_replace('/\s+/', '-', $post_slug);

    	$data['post_title_bn']=$request->post_title_bn;

        $post_slug_bn = strtolower($request->post_title_bn);
        $data['post_title_bn_slug']=preg_replace('/\s+/', '-', $post_slug_bn);

    	$data['post_category_id']=$request->post_category_id;
    	$data['post_details_en']=$request->post_details_en;
    	$data['post_details_bn']=$request->post_details_bn;
    	
    	$post_image=$request->post_image;
    	if($post_image){
    		$post_image_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(450,250)->save('public/media/post/'.$post_image_name);
                $data['post_image']='public/media/post/'.$post_image_name;

            DB::table('posts')->insert($data);
	        $notification=array(
	            'messege'=>'Post Inserted Successfully ',
	            'alert-type'=>'success'
	        );
	        return Redirect()->route('all.blogpost')->with($notification);  
    	}else{
    		$data['post_image']='';

            DB::table('posts')->insert($data);
	        $notification=array(
	            'messege'=>'Post Inserted Successfully ',
	            'alert-type'=>'success'
	        );
	        return Redirect()->route('all.blogpost')->with($notification);
    	}

    }

    public function index(){
    	$blogpost = DB::table('posts')
    				->join('post_categories', 'posts.post_category_id', 'post_categories.id')
    				->select('posts.*', 'post_categories.category_name_en')
    				->get();
    	return view('admin.blog.index', compact('blogpost'));
    }

    public function destroypost($id){
    	$post = DB::table('posts')->where('id', $id)->first();

    	$post_image = $post->post_image;
    	unlink($post_image);
    	DB::table('posts')->where('id', $id)->delete();

    	$notification=array(
	            'messege'=>'Post Deleted Successfully ',
	            'alert-type'=>'success'
	        );
	        return Redirect()->back()->with($notification);
    }

    public function editpost($id){
    	$post = DB::table('posts')->where('id', $id)->first();
    	$post_category=DB::table('post_categories')->get();

    	return view('admin.blog.edit_blogpost', compact('post','post_category'));
    }

    public function updatepost(Request $request, $id){

        $old_image=$request->old_image;
        $data=array();
        $data['post_title_en']=$request->post_title_en;

        $post_slug = strtolower($request->post_title_en);
        $data['post_title_en_slug']=preg_replace('/\s+/', '-', $post_slug);

        $data['post_title_bn']=$request->post_title_bn;

        $post_slug_bn = strtolower($request->post_title_bn);
        $data['post_title_bn_slug']=preg_replace('/\s+/', '-', $post_slug_bn);

        $data['post_category_id']=$request->post_category_id;
        $data['post_details_en']=$request->post_details_en;
        $data['post_details_bn']=$request->post_details_bn;
        
        $post_image=$request->post_image;
        if($post_image){
            unlink($old_image);
            $post_image_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(450,250)->save('public/media/post/'.$post_image_name);
                $data['post_image']='public/media/post/'.$post_image_name;

            DB::table('posts')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Post Updated Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);  
        }else{
            $data['post_image']=$old_image;

            DB::table('posts')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Post Updated Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);
        }
    }


}
