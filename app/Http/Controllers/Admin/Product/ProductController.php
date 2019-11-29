<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Product;
use DB;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $product=DB::table('products')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name')
                ->get();
    	return view('admin.product.index', compact('product'));
    }

    public function create(){
    	$category=DB::table('categories')->get();
    	$brand=DB::table('brands')->get();
    	return view('admin.product.create', compact('category', 'brand'));
    }
    public function storeproduct(Request $request){
        $data=array();
    	$data['product_name']=$request->product_name;

        $slug_pro = strtolower($request->product_name);

        $data['product_slug']=preg_replace('/\s+/', '-', $slug_pro);
 
    	$data['product_code']=$request->product_code;
    	$data['product_quantity']=$request->product_quantity;
    	$data['category_id']=$request->category_id;
    	$data['subcategory_id']=$request->subcategory_id;
    	$data['brand_id']=$request->brand_id;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['product_selling_price']=$request->product_selling_price;
    	$data['product_details']=$request->product_details;
        $data['product_short_details']=$request->product_short_details;
    	$data['product_video_link']=$request->product_video_link;
    	$data['main_slider']=$request->main_slider;
    	$data['hot_deal']=$request->hot_deal;
        $data['buyone_getone']=$request->buyone_getone;
    	$data['best_rated']=$request->best_rated;
    	$data['trend']=$request->trend;
    	$data['mid_slider_one']=$request->mid_slider_one;
    	$data['hot_deal_new']=$request->hot_deal_new;
    	$data['status']=1;

    	$product_image_one=$request->product_image_one;
    	$product_image_two=$request->product_image_two;
    	$product_image_three=$request->product_image_three;

    	if($product_image_one && $product_image_two && $product_image_three){
            $product_image_one_name= hexdec(uniqid()).'.'.$product_image_one->getClientOriginalExtension();
                Image::make($product_image_one)->resize(500,500)->save('public/media/product/'.$product_image_one_name);
                $data['product_image_one']='public/media/product/'.$product_image_one_name;

            $product_image_two_name= hexdec(uniqid()).'.'.$product_image_two->getClientOriginalExtension();
                Image::make($product_image_two)->resize(500,500)->save('public/media/product/'.$product_image_two_name);
                $data['product_image_two']='public/media/product/'.$product_image_two_name; 

            $product_image_three_name= hexdec(uniqid()).'.'.$product_image_three->getClientOriginalExtension();
                Image::make($product_image_three)->resize(500,500)->save('public/media/product/'.$product_image_three_name);
                $data['product_image_three']='public/media/product/'.$product_image_three_name; 
                
                $product=DB::table('products')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }
    }

    public function deleteproduct($id){
        $product = DB::table('products')->where('id', $id)->first();

        $product_image_one=$product->product_image_one;
        $product_image_two=$product->product_image_two;
        $product_image_three=$product->product_image_three;

        unlink($product_image_one);
        unlink($product_image_two);
        unlink($product_image_three);

        DB::table('products')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Product Deleted Successfully ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);  
    }

    public function viewproduct($id){
        $product=DB::table('products')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name', 'subcategories.subcategory_name')
                ->where('products.id', $id)
                ->first();
        return view('admin.product.show', compact('product'));

    }

    public function editproduct($id){
        $product=DB::table('products')->where('id', $id)->first();
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->get();
        $brand=DB::table('brands')->get();
        
        return view('admin.product.edit', compact('product', 'category', 'subcategory', 'brand'));
    }

    public function updateproductall(Request $request, $id){
        $data=array();
        $data['product_name']=$request->product_name;

        $slug_pro = strtolower($request->product_name);

        $data['product_slug']=preg_replace('/\s+/', '-', $slug_pro);

        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_selling_price']=$request->product_selling_price;
        $data['product_discount_price']=$request->product_discount_price;
        $data['product_details']=$request->product_details;
        $data['product_short_details']=$request->product_short_details;
        $data['product_video_link']=$request->product_video_link;
        $data['main_slider']=$request->main_slider;
        $data['hot_deal']=$request->hot_deal;
        $data['buyone_getone']=$request->buyone_getone;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['mid_slider_one']=$request->mid_slider_one;
        $data['hot_deal_new']=$request->hot_deal_new;


        $product_image_one=$request->product_image_one;
        $product_image_two=$request->product_image_two;
        $product_image_three=$request->product_image_three;

        $old_product_image_one=$request->old_product_image_one;
        $old_product_image_two=$request->old_product_image_two;
        $old_product_image_three=$request->old_product_image_three;



        if($product_image_one && $product_image_two && $product_image_three){
            unlink($old_product_image_one);
            unlink($old_product_image_two);
            unlink($old_product_image_three);
            $product_image_one_name= hexdec(uniqid()).'.'.$product_image_one->getClientOriginalExtension();
                Image::make($product_image_one)->resize(500,500)->save('public/media/product/'.$product_image_one_name);
                $data['product_image_one']='public/media/product/'.$product_image_one_name;

            $product_image_two_name= hexdec(uniqid()).'.'.$product_image_two->getClientOriginalExtension();
                Image::make($product_image_two)->resize(500,500)->save('public/media/product/'.$product_image_two_name);
                $data['product_image_two']='public/media/product/'.$product_image_two_name; 

            $product_image_three_name= hexdec(uniqid()).'.'.$product_image_three->getClientOriginalExtension();
                Image::make($product_image_three)->resize(500,500)->save('public/media/product/'.$product_image_three_name);
                $data['product_image_three']='public/media/product/'.$product_image_three_name; 

                $update = DB::table('products')->where('id', $id)->update($data);

        }elseif($product_image_one && $product_image_two){
            unlink($old_product_image_one);
            unlink($old_product_image_two);
            $product_image_one_name= hexdec(uniqid()).'.'.$product_image_one->getClientOriginalExtension();
                Image::make($product_image_one)->resize(500,500)->save('public/media/product/'.$product_image_one_name);
                $data['product_image_one']='public/media/product/'.$product_image_one_name;

            $product_image_two_name= hexdec(uniqid()).'.'.$product_image_two->getClientOriginalExtension();
                Image::make($product_image_two)->resize(500,500)->save('public/media/product/'.$product_image_two_name);
                $data['product_image_two']='public/media/product/'.$product_image_two_name;

                $update = DB::table('products')->where('id', $id)->update($data);

        }elseif ($product_image_one && $product_image_three) {
            unlink($old_product_image_one);
            unlink($old_product_image_three);
            $product_image_one_name= hexdec(uniqid()).'.'.$product_image_one->getClientOriginalExtension();
                Image::make($product_image_one)->resize(500,500)->save('public/media/product/'.$product_image_one_name);
                $data['product_image_one']='public/media/product/'.$product_image_one_name;

            $product_image_three_name= hexdec(uniqid()).'.'.$product_image_three->getClientOriginalExtension();
                Image::make($product_image_three)->resize(500,500)->save('public/media/product/'.$product_image_three_name);
                $data['product_image_three']='public/media/product/'.$product_image_three_name;

                $update = DB::table('products')->where('id', $id)->update($data);

        }elseif ($product_image_two && $product_image_three) {
            unlink($old_product_image_two);
            unlink($old_product_image_three);
            $product_image_two_name= hexdec(uniqid()).'.'.$product_image_two->getClientOriginalExtension();
                Image::make($product_image_two)->resize(500,500)->save('public/media/product/'.$product_image_two_name);
                $data['product_image_two']='public/media/product/'.$product_image_two_name;

            $product_image_three_name= hexdec(uniqid()).'.'.$product_image_three->getClientOriginalExtension();
                Image::make($product_image_three)->resize(500,500)->save('public/media/product/'.$product_image_three_name);
                $data['product_image_three']='public/media/product/'.$product_image_three_name;

                $update = DB::table('products')->where('id', $id)->update($data);

        }elseif ($product_image_one) {
            unlink($old_product_image_one);
            $product_image_one_name= hexdec(uniqid()).'.'.$product_image_one->getClientOriginalExtension();
                Image::make($product_image_one)->resize(500,500)->save('public/media/product/'.$product_image_one_name);
                $data['product_image_one']='public/media/product/'.$product_image_one_name;

                $update = DB::table('products')->where('id', $id)->update($data);
 
        }elseif ($product_image_two) {
            unlink($old_product_image_two);
            $product_image_two_name= hexdec(uniqid()).'.'.$product_image_two->getClientOriginalExtension();
                Image::make($product_image_two)->resize(500,500)->save('public/media/product/'.$product_image_two_name);
                $data['product_image_two']='public/media/product/'.$product_image_two_name;

                $update = DB::table('products')->where('id', $id)->update($data);
 
        }elseif ($product_image_three) {
            unlink($old_product_image_three);
            $product_image_three_name= hexdec(uniqid()).'.'.$product_image_three->getClientOriginalExtension();
                Image::make($product_image_three)->resize(500,500)->save('public/media/product/'.$product_image_three_name);
                $data['product_image_three']='public/media/product/'.$product_image_three_name;

                $update = DB::table('products')->where('id', $id)->update($data);

        }else{
            $update = DB::table('products')->where('id', $id)->update($data);
        }



        if($update){
            $notification=array(
                'messege'=>'Product Updated Successfully ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Nothing To Update ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification); 
        }
    }


    


    public function inactive($id){
        DB::table('products')->where('id', $id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Inactive Successfully ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);   

    }
    public function active($id){
        DB::table('products')->where('id', $id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active Successfully ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);  
    } 


    //Subcategory collect by ajax
    public function getsubcategory($category_id){
    	$cat_product = DB::table("subcategories")->where('category_id', $category_id)->get();
		return json_encode($cat_product);
    }
}
