<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
            'category_id', 'subcategory_id', 'brand_id', 'product_name', 'product_slug', 'product_code', 'product_quantity', 'product_details', 'product_short_details', 'product_color', 'product_size', 'product_selling_price', 'product_discount_price', 'product_video_link', 'main_slider', 'hot_deal', 'best_rated', 'mid_slider_one', 'mid_slider_two', 'mid_slider_three', 'mid_slider_four', 'hot_deal_new', 'buyone_getone', 'trend', 'product_image_one', 'product_image_two', 'product_image_three', 'status'
        ];
}
