
    <!-- Banner -->
    @php
        $main_slider = DB::table('products')->join('brands', 'products.brand_id', 'brands.id')->select('products.*','brands.brand_name','brands.brand_logo')->where('products.main_slider',1)->orderBy('id', 'DESC')->first();
        $showtime=DB::table('front_top_banner_title')->first();
    @endphp

    <div class="banner">
        <div class="banner_background" style="background-image:url({{ url('public/frontend/images/banner_background.jpg') }})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{ url($main_slider->product_image_one) }}" alt=""></div>
                <div class="col-lg-5  fill_height">
                    <div class="banner_content">
                        <h2 class="banner_text"><!-- Biggest Offer and Quality Products-->{{ $showtime->front_page_offer_title }} </h2>
                        <div class="banner_price">
                            @if($main_slider->product_discount_price == NULL)
                                {{ $main_slider->product_selling_price }} TK
                            @else
                                <span>{{ $main_slider->product_selling_price }} TK</span>{{ $main_slider->product_discount_price }} TK
                            @endif
                            </div>
                        <div class="banner_product_name">{{ $main_slider->brand_name }}</div>
                        <div class="button banner_button"><a href="{{ URL('product/details/'.$main_slider->id.'/'.$main_slider->product_slug) }}">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>