<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Front\Newslater;
use DB;

class FrontController extends Controller
{
    public function newslater(Request $request){
    	$validatedData = $request->validate([
	        'email' => 'required|unique:newslaters|max:55',
	    ]);

	    $data=array();
	    $data['email']=$request->email;
	    DB::table('newslaters')->insert($data);

	    $notification=array(
        		'messege'=>'Thanks For Subscribe',
        		'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function contact(){
        return view('pages.contact');
    }

    

    public function wholesale(){
        return view('pages.wholesale');
    }

    public function singlecategory($category_slug,$id){
        
        $product=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*', 'categories.category_name', 'subcategories.subcategory_name')->where('products.category_id', $id)->where('status',1)->get();

        return view('pages.category_product', compact('product'));
    }

    public function singlesubcategory($category_slug, $subcategory_slug, $category_id, $id){
        $product_sub=DB::table('products')
                    ->join('categories', 'products.category_id', 'categories.id')
                    ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                    ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name')
                    ->where('products.category_id', $category_id)
                    ->where('products.subcategory_id', $id)
                    ->where('status',1)
                    ->get();

        return view('pages.subcategory_product', compact('product_sub'));

    }
    public function trendsshow(){
        $trands=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*','categories.category_name', 'subcategories.subcategory_name')->where('status',1)->where('trend',1)->orderBy('id','DESC')->get();
        return view('pages.trends_product', compact('trands'));
    }
    public function bestratedshow(){
        $best_rated=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*','categories.category_name', 'subcategories.subcategory_name')->where('status',1)->where('best_rated',1)->orderBy('id','DESC')->get();
        return view('pages.best_rated', compact('best_rated'));
    }

    public function specialoffer(){
        $season_special=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*','categories.category_name', 'subcategories.subcategory_name')->where('status',1)->where('buyone_getone',1)->orderBy('id','DESC')->get();
        return view('pages.season_special', compact('season_special'));
    }
    public function flashoffer(){
        $flash_sale=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*','categories.category_name', 'subcategories.subcategory_name')->where('status',1)->where('hot_deal',1)->orderBy('id','DESC')->get();
        return view('pages.flash_sale', compact('flash_sale'));
    }

    public function searchproduct(Request $request){

        $query=$request->search_product;

        $products=DB::table('products')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->select('products.*','categories.category_name', 'subcategories.subcategory_name')
                ->where('product_name', 'like', '%'.$query.'%')
                ->orWhere('categories.category_name', 'like', '%'.$query.'%')
                ->orWhere('subcategories.subcategory_name', 'like', '%'.$query.'%')
                ->where('status',1)
                ->orderBy('id','ASC')
                ->get();

        return view('pages.search_results', compact('products'));
    }


    public function review(Request $request){
        $fullname=$request->fullname;
        $email=$request->email;
        $opinion=$request->opinion;

        return Redirect()->back();
    }
}
