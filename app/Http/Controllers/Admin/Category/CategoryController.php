<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category(){
    	$category = Category::all();

    	return view('admin.category.category', compact('category'));
    }
    public function storecategory(Request $request){
    	$validatedData = $request->validate([
	        'category_name' => 'required|unique:categories|max:55',
	    ]);

	    $data=array();
	    $data['category_name']=$request->category_name;

        $slug_cat = strtolower($request->category_name);
        $data['category_slug']=preg_replace('/\s+/', '-', $slug_cat);

	    DB::table('categories')->insert($data);

	    //$category=new Category();
	    //$category->category_name=$request->category_name;
	    //$category->save();


	    $notification=array(
        		'messege'=>'Category Inserted Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }

    public function deletecategory($id){
    	DB::table('categories')->where('id', $id)->delete();
    	$notification=array(
        		'messege'=>'Category Deleted Successfully',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }

    public function editcategory($id){
    	$category=DB::table('categories')->where('id', $id)->first();
    	return view('admin.category.edit_category', compact('category'));
    }

    public function updatecategory(Request $request,$id){
    	$validatedData = $request->validate([
	        'category_name' => 'required|max:55',
	    ]);

	    $data=array();
	    $data['category_name']=$request->category_name;

        $slug_cat = strtolower($request->category_name);
        $data['category_slug']=preg_replace('/\s+/', '-', $slug_cat);
        
	    $update = DB::table('categories')->where('id', $id)->update($data);


	    if ($update) {
	    	$notification=array(
        		'messege'=>'Category Update Successfully',
        		'alert-type'=>'success'
	        );
	        return Redirect()->route('categories')->with($notification);
	    }else{
	    	$notification=array(
        		'messege'=>'Nothing to Update',
        		'alert-type'=>'success'
	        );
	        return Redirect()->route('categories')->with($notification);
	    }
    }
}
