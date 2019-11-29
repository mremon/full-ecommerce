<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use DB;
use Response;
use Auth;


class CartController extends Controller
{
    public function addcart($id)
    {
    	  $product=DB::table('products')->where('id',$id)->first();
    	  $data=array();
    	  if ($product->product_discount_price == NULL) {
    	  	            $data['id']=$product->id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=1;
    	                $data['price']= $product->product_selling_price;          
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->product_image_one;
                        $data['options']['color']='';
                        $data['options']['size']='';
    	               Cart::add($data);
    	               return response()->json(['success' => 'Successfully Added on your Cart']);
    	   }else{
    	               $data['id']=$product->id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=1;
    	                $data['price']= $product->product_discount_price;          
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->product_image_one;  
                        $data['options']['color']='';
                        $data['options']['size']=''; 
    	                //return response()->json($data);  
    	                Cart::add($data);  
    	              return response()->json(['success' => 'Successfully Added on your Cart']);   
    	 }
    }

    public function check(){
    	$content=Cart::content();
    	return response()->json($content);
    }

    public function showCart(){
        $cart=Cart::content();
        return view('pages.cart', compact('cart'));
    }
    public function removeCart($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function cartallremove(){
        Cart::destroy();
        return redirect()->back();
    }
    public function updateCart(request $request){
        $rowId=$request->productid;
        $qty=$request->qty;
        Cart::update($rowId, $qty);

        return redirect()->back();

    }
    public function detailscartadd(request $request,$id){
        $product=DB::table('products')->where('id',$id)->first();
          $data=array();
          if ($product->product_discount_price == NULL) {
                        $data['id']=$id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;
                        $data['price']= $product->product_selling_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->product_image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                       Cart::add($data);

                       $notification=array(
                                'messege'=>'Successfully Added on your cart',
                                'alert-type'=>'success'
                        );
                        return Redirect()->back()->with($notification); 
           }else{
                        $data['id']=$id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;
                        $data['price']= $product->product_discount_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->product_image_one;  
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                        //return response()->json($data);  
                        Cart::add($data);

                        $notification=array(
                                'messege'=>'Successfully Added on your cart',
                                'alert-type'=>'success'
                        );
                        return Redirect()->back()->with($notification); 
         }
    }



    public function productcartview($id){
        $product=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->join('brands', 'products.brand_id', 'brands.id')->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')->where('products.id', $id)->first();

        $color=$product->product_color;
        $product_color=explode(',',$color);

        $size=$product->product_size;
        $product_size=explode(',',$size);

       // return view('pages.product_details', compact('product','product_color','product_size'));

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function insertproductcart(Request $request){
        $id=$request->product_id;
        $product=DB::table('products')->where('id',$id)->first();
          $data=array();
          if ($product->product_discount_price == NULL) {
                $data['id']=$product->id;
                $data['name']=$product->product_name;
                $data['qty']=$request->qty;
                $data['price']= $product->product_selling_price;          
                $data['weight']=1;
                $data['options']['image']=$product->product_image_one;
                $data['options']['color']=$request->color;
                $data['options']['size']=$request->size;

                Cart::add($data);
                $notification=array(
                    'messege'=>'Successfully Added on your cart',
                    'alert-type'=>'success'
                );
                return Redirect()->route('show.cart')->with($notification); 
           }else{
                $data['id']=$product->id;
                $data['name']=$product->product_name;
                $data['qty']=$request->qty;
                $data['price']= $product->product_discount_price;          
                $data['weight']=1;
                $data['options']['image']=$product->product_image_one;  
                $data['options']['color']=$request->color;
                $data['options']['size']=$request->size; 
                //return response()->json($data);  
                Cart::add($data);  
                $notification=array(
                    'messege'=>'Successfully Added on your cart',
                    'alert-type'=>'success'
                );
                return Redirect()->route('show.cart')->with($notification);   
         }
    }

    public function checkout(){
        if(Auth::check()){
            $cart=Cart::content();
        return view('pages.checkout', compact('cart'));

        }else{
            $notification=array(
                    'messege'=>'Please Login first',
                    'alert-type'=>'warning'
                );
            return redirect()->route('login')->with($notification);
        }
    }


    public function wishlistshow(){
        $userid=Auth::id();
        $product=DB::table('wishlists')
                ->join('products', 'wishlists.product_id', 'products.id')
                ->select('products.*', 'wishlists.user_id')
                ->where('wishlists.user_id', $userid)
                ->get();
        return view('pages.wishlist', compact('product'));
    }

    public function applycoupon(Request $request){
        $coupon=$request->coupon;
        $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if($check){
            $subtotal =str_replace( ',', '', Cart::subtotal() );
             Session::put('coupon',[
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => $subtotal - $check->discount,
            ]);
            $notification=array(
                'messege'=>'Successfully Coupon Applied',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);  
        }else{
            $notification=array(
                'messege'=>'Invalid Coupon',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification); 
        }
    }


    public function couponremove(){
        Session::forget('coupon');

        $notification=array(
            'messege'=>'Coupon Removed',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function paymentpage(){
        $cart=Cart::content();
        return view('pages.payment', compact('cart'));
    }

}
