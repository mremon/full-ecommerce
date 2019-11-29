<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
            'post_category_id', 'post_title_en', 'post_title_en_slug', 'post_title_bn', 'post_title_bn_slug', 'post_image', 'post_details_en', 'post_details_bn'
        ];
}
