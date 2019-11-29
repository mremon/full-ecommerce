<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class BlogController extends Controller
{
    public function blog(){
    	$post=DB::table('posts')->join('post_categories', 'posts.post_category_id', 'post_categories.id')->select('posts.*', 'post_categories.category_name_en', 'post_categories.category_name_en_slug', 'post_categories.category_name_bn', 'post_categories.category_name_bn_slug')->get();
        return view('pages.blog', compact('post'));
    }

    public function bangla(){
    	Session::get('lang');
    	Session()->forget('lang');
    	Session::put('lang','bangla');
    	return Redirect()->back();
    }
    public function english(){
    	Session::get('lang');
    	Session()->forget('lang');
    	Session::put('lang','english');
    	return Redirect()->back();
    }

    public function singleposten($id, $post_title_en_slug){

    	$single_post=DB::table('posts')->join('post_categories', 'posts.post_category_id', 'post_categories.id')->select('posts.*', 'post_categories.category_name_en', 'post_categories.category_name_en_slug', 'post_categories.category_name_bn', 'post_categories.category_name_bn_slug')->where('posts.id', $id)->first();

    	$post=DB::table('posts')->join('post_categories', 'posts.post_category_id', 'post_categories.id')->select('posts.*', 'post_categories.category_name_en', 'post_categories.category_name_en_slug', 'post_categories.category_name_bn', 'post_categories.category_name_bn_slug')->get();

    	return view('pages.blog_post', compact('single_post','post'));
    }

    public function singlepostbn($id, $post_title_bn_slug){

    	$single_post=DB::table('posts')->join('post_categories', 'posts.post_category_id', 'post_categories.id')->select('posts.*', 'post_categories.category_name_en', 'post_categories.category_name_en_slug', 'post_categories.category_name_bn', 'post_categories.category_name_bn_slug')->where('posts.id', $id)->first();

    	$post=DB::table('posts')->join('post_categories', 'posts.post_category_id', 'post_categories.id')->select('posts.*', 'post_categories.category_name_en', 'post_categories.category_name_en_slug', 'post_categories.category_name_bn', 'post_categories.category_name_bn_slug')->get();

    	return view('pages.blog_post', compact('single_post','post'));
    }
}
