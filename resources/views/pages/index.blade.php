@extends('layouts.app')
@section('content')
@include('layouts.menubar')


@php
$featured_product=DB::table('products')->where('status',1)->orderBy('id','DESC')->limit(16)->get();
$trend_product=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*','categories.category_name', 'subcategories.subcategory_name')->where('status',1)->where('trend',1)->orderBy('id','DESC')->limit(8)->get();
$best_rated_product=DB::table('products')->join('categories', 'products.category_id', 'categories.id')->join('subcategories', 'products.subcategory_id', 'subcategories.id')->select('products.*','categories.category_name', 'subcategories.subcategory_name')->where('status',1)->where('best_rated',1)->orderBy('id','DESC')->limit(8)->get();
$hot_deal=DB::table('products')->join('brands', 'products.brand_id', 'brands.id')->select('products.*','brands.brand_name')->where('products.status',1)->where('hot_deal_new',1)->orderBy('id','DESC')->limit(3)->first();
$showtime=DB::table('offer_time')->first();
$date=$showtime->date;
$h=$showtime->h;
$m=$showtime->m;
$s=$showtime->s;


$show_banner=DB::table('offer_banner')->first();

@endphp

   <!-- Characteristics -->

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ url('public/frontend/images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">24/7 Support</div>
                            <div class="char_subtitle">Online Consultations</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ url('public/frontend/images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">7-Day Return</div>
                            <div class="char_subtitle">Exchange Guarantee</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ url('public/frontend/images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Shipping</div>
                            <div class="char_subtitle">No Hidden Charge</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ url('public/frontend/images/char_4.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Quality Product</div>
                            <div class="char_subtitle">Product Guarantee</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Two Banner Offer -->

    <div class="adverts">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 advert_col">
                    
                    <!-- 1st Banner -->

                    <div class="advert">
                        <div class="ml-auto"><div class="advert_image_custom" ><a href="{{ route('seasonoffer.show') }}"><img src="{{ asset($show_banner->offer_banner_image_one) }}" alt=""></a></div></div>
                    </div>
                </div>

                <div class="col-lg-6 advert_col">
                    
                    <!-- 2nd Banner -->

                    <div class="advert">
                        <div class="ml-auto"><div class="advert_image_custom"><a href="{{ route('flashsale.show') }}"><img src="{{ asset($show_banner->offer_banner_image_two) }}" alt=""></a></div></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    
                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">{{ $showtime->hot_offer_title }}</div>
                        <div class="deals_slider_container">
                            
                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                              
                                <!-- Deals Item -->
                                <div class="owl-item deals_item">
                                    <a href="{{ URL('product/details/'.$hot_deal->id.'/'.$hot_deal->product_slug) }}">
                                    <div class="deals_image"><img src="{{ asset($hot_deal->product_image_one) }}" alt=""></div></a>

                                    <div class="deals_content">
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_category"><a style="text-shadow: rgba(0,0,0,.01) 0 0 1px;background-color: transparent;color: rgba(0,0,0,0.5);">{{ $hot_deal->brand_name }}</a></div>
                                            <div class="deals_item_price_a ml-auto" style="text-decoration:line-through">{{ $hot_deal->product_selling_price }} TK</div>
                                        </div>
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_name"><a href="{{ URL('product/details/'.$hot_deal->id.'/'.$hot_deal->product_slug) }}" style="color:#000;">{{ $hot_deal->product_name }} </a></div>

                                            @if($hot_deal->product_discount_price == NULL)
                                                <div class="deals_item_price ml-auto">{{ $hot_deal->product_selling_price }} TK</div>
                                            @else
                                                <div class="deals_item_price ml-auto">{{ $hot_deal->product_discount_price }} TK</div>
                                            @endif
                                        </div>
                                        <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                            <div class="deals_timer_title_container">
                                                <div class="deals_timer_title">Hurry Up</div>
                                                <div class="deals_timer_subtitle">Offer ends in:</div>
                                            </div>
                                            <div class="deals_timer_content ml-auto">
                                                <div class="deals_timer_box clearfix" data-target-time="">
                                                     <div id="demo" style="font-size:15px;font-weight: bold; line-height: 300%;text-align: center;color: rgba(0,0,0,0.7);"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            {{--<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>--}}
                        </div>
                    </div>
                    
                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container" appendTo>
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">New Arrival</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    
                                    @foreach($featured_product as $fpr)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <a href="{{ URL('product/details/'.$fpr->id.'/'.$fpr->product_slug) }}"><div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($fpr->product_image_one) }}"  alt=""></div></a>
                                            <div class="product_content">
                                                @if($fpr->product_discount_price == NULL)
                                                    <div class="product_price discount">{{ $fpr->product_selling_price }} TK</div>
                                                @else
                                                    <div class="product_price discount">{{ $fpr->product_discount_price }} TK<span style="text-decoration:line-through">{{ $fpr->product_selling_price }} TK</span></div>
                                                @endif
                                                <div class="product_name"><div><a href="{{ URL('product/details/'.$fpr->id.'/'.$fpr->product_slug) }}">{{ $fpr->product_name }}</a></div></div>
                                                {{--
                                                    <div class="product_extras">
                                                    <button class="product_cart_button addcart" data-id="{{ $fpr->id }}">Add to Cart</button>
                                                </div>
                                                --}}
                                                <div class="product_extras">
                                                    <button class="product_cart_button" id="{{ $fpr->id }}" data-toggle="modal" data-target="#cartmodel" onclick="productview(this.id)">Short View</button>
                                                </div>
                                            </div>
                                            {{-- URL::to('add/wishlist/'.$fpr->id) --}}
                                                <div class="product_fav addwishlist" data-id="{{ $fpr->id }}"><i class="fas fa-heart"></i></div>
                                            
                                            <ul class="product_marks">
                                                @if($fpr->product_discount_price == NULL)
                                                    {{-- <li class="product_mark product_discount" style="background:#0E8CE4;">new</li> --}}
                                                @else
                                                    @php
                                                        $amount=$fpr->product_selling_price - $fpr->product_discount_price;
                                                        $discount=$amount/$fpr->product_selling_price*100;
                                                    @endphp
                                                    <li class="product_mark product_discount">-{{ intval($discount) }}%</li>
                                                @endif
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Banner -->

    @php
        $mid_slide=DB::table('products')->join('categories', 'categories.id', 'products.category_id')->join('brands', 'brands.id', 'products.brand_id')->select('products.*', 'categories.category_name', 'categories.category_slug', 'brands.brand_name')->where('products.mid_slider_one',1)->orderBy('id','DESC')->limit(3)->get();
    @endphp

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url({{ url('public/frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">
                @foreach($mid_slide as $mso)
                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        
                                        <div class="banner_2_title">{{ $mso->category_name }}</div>
                                        <div class="banner_2_text">{{ $mso->brand_name }}</div>
                                        
                                        <div class="button banner_2_button"><a href="{{ URL('category/'.$mso->category_slug.'/'.$mso->category_id) }}">See More</a></div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset($mso->product_image_one) }}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    
   <!-- Trends -->

    <div class="trends">
        <div class="trends_background" ></div>
        <div class="trends_overlay" style=""></div>
        <div class="container">
            <div class="row">

                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Trends 2019</h2>
                        <div class="trends_text"><p><a href="{{ route('trends.show') }}">Show More</a></p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">
                            @foreach($trend_product as $tpr)
                            <!-- Trends Slider Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <a href="{{ URL('product/details/'.$tpr->id.'/'.$tpr->product_slug) }}"><div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($tpr->product_image_one) }}" alt=""></div></a>
                                    <div class="trends_content">
                                        <div class="trends_category"><a style="text-shadow: rgba(0,0,0,.01) 0 0 1px;background-color: transparent;color: rgba(0,0,0,0.5);">{{ $tpr->subcategory_name }}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{ URL('product/details/'.$tpr->id.'/'.$tpr->product_slug) }}">{{ $tpr->product_name }}</a></div>

                                            @if($tpr->product_discount_price == NULL)
                                                <div class="trends_price">{{ $tpr->product_selling_price }} TK</div>
                                            @else
                                                <div class="trends_price">{{-- $tpr->product_discount_price --}} {{ $tpr->product_selling_price }} TK</div>
                                            @endif
                                        </div>
                                        <button class="arrivals_single_button" id="{{ $tpr->id }}" data-toggle="modal" data-target="#cartmodel" onclick="productview(this.id)">Short View</button>
                                    </div>
                                    <ul class="trends_marks">
                                        @if($tpr->product_discount_price == NULL)
                                            {{-- <li class="trends_mark trends_new" style="background:#0E8CE4;">new</li> --}}
                                        @else
                                            @php
                                                $amount=$tpr->product_selling_price - $tpr->product_discount_price;
                                                $discount=$amount/$tpr->product_selling_price*100;
                                            @endphp
                                            <li class="trends_mark trends_new" style="background:#DF3B3B;">-{{ intval($discount) }}%</li>
                                        @endif
                                    </ul>
                                    <div class="trends_fav addwishlist" data-id="{{ $tpr->id }}"><i class="fas fa-heart"></i></div>
                                    {{-- URL::to('add/wishlist/'.$tpr->id) --}}
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


     <!-- Best Rated -->

    <div class="trends">
        <div class="trends_background" ></div>
        <div class="trends_overlay" style="background: rgba(203, 225, 238, 0.3);"></div>
        <div class="container">
            <div class="row">

                <!-- Best rated Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Best Rated</h2>
                        <div class="trends_text"><p> <a href="{{ route('bestrated.show') }}" >Show More</a> </p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">
                            
                            @foreach($best_rated_product as $brpr)
                            <!-- Trends Slider Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <a href="{{ URL('product/details/'.$brpr->id.'/'.$brpr->product_slug) }}"><div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($brpr->product_image_one) }}" alt=""></div></a>
                                    <div class="trends_content">
                                        <div class="trends_category"><a style="text-shadow: rgba(0,0,0,.01) 0 0 1px;background-color: transparent;color: rgba(0,0,0,0.5);">{{ $brpr->subcategory_name }}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{ URL('product/details/'.$brpr->id.'/'.$brpr->product_slug) }}">{{ $brpr->product_name }}</a></div>
                                            @if($brpr->product_discount_price == NULL)
                                                <div class="trends_price">{{ $brpr->product_selling_price }} TK</div>
                                            @else
                                                <div class="trends_price">{{-- $brpr->product_discount_price --}} {{ $brpr->product_selling_price }} TK</div>
                                            @endif
                                        </div>
                                        {{-- <button class="arrivals_single_button addcart" data-id="{{ $brpr->id }}">Add to Cart</button> --}}

                                        <button class="arrivals_single_button" id="{{ $brpr->id }}" data-toggle="modal" data-target="#cartmodel" onclick="productview(this.id)">Short View</button>
                                    </div>
                                    <ul class="trends_marks">
                                        @if($brpr->product_discount_price == NULL)
                                            {{--<li class="trends_mark trends_new" >new</li>--}}
                                        @else
                                            @php
                                                $amount=$brpr->product_selling_price - $brpr->product_discount_price;
                                                $discount=$amount/$brpr->product_selling_price*100;
                                            @endphp
                                            <li class="trends_mark trends_new" style="background:#DF3B3B;">-{{ intval($discount) }}%</li>
                                        @endif
                                    </ul>
                                    
                                    
                                        <div class="trends_fav addwishlist" data-id="{{ $brpr->id }}"><i class="fas fa-heart"></i></div>
                                   
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Reviews -->

    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Latest Reviews</h3>
                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                    </div>

                    <div class="reviews_slider_container">
                        
                        <!-- Reviews Slider -->
                        <div class="owl-carousel owl-theme reviews_slider">
                            
                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ url('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ url('public/frontend/images/review_2.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ url('public/frontend/images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ url('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ url('public/frontend/images/review_2.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ url('public/frontend/images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    {{-- Model Start --}}

    <div class="modal fade bd-example-modal-lg" id="cartmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Product Short Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4 ml-auto" style="text-align:center"><img src="" alt="" id="pimage" style="width:150px;height:150px;"><br><br><br>
                    <h4 id="pname"></h4>
                  </div>
                  <div class="col-md-5 ml-auto">
                    <ul class="list-group">
                      <li class="list-group-item"><b>Product Code : </b> <span id="pcode"></span></li>
                      <li class="list-group-item"><b>Category : </b> <span id="pcat"></span></li>
                      <li class="list-group-item"><b>Subcategory : </b> <span id="psubcat"></span></li>
                      <li class="list-group-item"><b>Brand : </b> <span id="pbrand"></span></li>
                      <li class="list-group-item"><b>Stock : </b> <span class="badge" style="background-color: green;color: white;">Avaliable</span></li>
                    </ul>
                  </div>
                  <div class="col-md-3 ml-auto">
                      <form action="{{ route('insert.into.cart') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                          <div class="form-group">
                            <label for="">Color</label>
                            <select class="form-control" name="color" >
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="">Size</label>
                            <select class="form-control" name="size" >
                            </select>
                            
                          </div>
                          <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" value="1" id="" name="qty">
                          </div>
                          <button type="submit" class="btn btn-primary">Add To Cart</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    {{-- Model End --}}




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    {{-- Time count --}}
    <script>
     var countDownDate = <?php 
    echo strtotime("$date $h:$m:$s" ) ?> * 1000;
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {
    now = now + 1000;
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d | " + hours + "h | " +
    minutes + "m | " + seconds + "s ";
    // If the count down is over, write some text 
    if (distance < 0) {
    clearInterval(x);
     document.getElementById("demo").innerHTML = "Offer EXPIRED";
    }
        
    }, 1000);

    </script>

    {{-- addcart using model --}}

    <script>
        function productview(id){
        $.ajax({
            url: "{{ url('/cart/product/view/') }}/"+id,
            type:"GET",
            datatype:"json",
            success:function(data){
                $('#pname').text(data.product.product_name);       
                $('#pcode').text(data.product.product_code);       
                $('#pimage').attr('src', data.product.product_image_one);
                $('#pcat').text(data.product.category_name);
                $('#psubcat').text(data.product.subcategory_name);
                $('#pbrand').text(data.product.brand_name);
                $('#product_id').val(data.product.id);

                var d =$('select[name="size"]').empty();
                    $.each(data.size, function(key, value){
                        $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                            if (data.size == "") {
                                $('#sizediv').hide();   
                            }else{
                                $('#sizediv').show();
                        } 
                    });

                var d =$('select[name="color"]').empty();
                    $.each(data.color, function(key, value){
                        $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                        if (data.color == "") {
                            $('#colordiv').hide();
                        } else{
                            $('#colordiv').show();
                        }
                    });   
            },
        });
        }
    </script>
    
     {{-- addcart --}}
    
    <script>
        $(document).ready(function(){
            $('.addcart').on('click', function(){
                var id = $(this).data('id');
                if(id){
                    $.ajax({
                        url: "{{ url('/add/to/cart/') }}/"+id,
                        type:"GET",
                        datatype:"json",
                        success:function(data){
                            const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                            })

                            if($.isEmptyObject(data.error)){
                                Toast.fire({
                                  icon: 'success',
                                  title: data.success
                                })
                            }else{
                                Toast.fire({
                                  icon: 'error',
                                  title: data.error
                                })

                            }

                            
                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>

    {{-- wishlist --}}


    <script>
        $(document).ready(function(){
            $('.addwishlist').on('click', function(){
                var id = $(this).data('id');
                if(id){
                    $.ajax({
                        url: "{{ url('/add/wishlist/') }}/"+id,
                        type:"GET",
                        datatype:"json",
                        success:function(data){
                            const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                            })

                            if($.isEmptyObject(data.error)){
                                Toast.fire({
                                  icon: 'success',
                                  title: data.success
                                })
                            }else{
                                Toast.fire({
                                  icon: 'error',
                                  title: data.error
                                })

                            }

                            
                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>

@endsection