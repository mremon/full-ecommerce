<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name');
            $table->string('product_slug')->nullable();
            $table->string('product_code');
            $table->string('product_quantity');
            $table->text('product_details');
            $table->text('product_short_details');
            $table->string('product_color');
            $table->string('product_size');
            $table->string('product_selling_price');
            $table->string('product_discount_price')->nullable();
            $table->string('product_video_link')->nullable();
            $table->integer('main_slider')->nullable();
            $table->integer('hot_deal')->nullable();
            $table->integer('buyone_getone')->nullable();
            $table->integer('best_rated')->nullable();
            $table->integer('mid_slider_one')->nullable();
            $table->integer('mid_slider_two')->nullable();
            $table->integer('mid_slider_three')->nullable();
            $table->integer('mid_slider_four')->nullable();
            $table->integer('hot_deal_new')->nullable();
            $table->integer('trend')->nullable();
            $table->string('product_image_one');
            $table->string('product_image_two');
            $table->string('product_image_three');
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
