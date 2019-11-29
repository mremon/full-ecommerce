@php
$front_setting=DB::table('front_setting')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<title>Decent Footwear</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/d-icon.jpg') }}" />
<meta name="csrf" value="{{ csrf_token() }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">




<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/responsive.css') }}">



<link rel="stylesheet" href="sweetalert2.min.css">



<script src="https://kit.fontawesome.com/6d56728a67.js" crossorigin="anonymous"></script>

</head>

<body>

<div class="super_container">
    
    <!-- Header -->
    
    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ url('public/frontend/images/phone.png') }}" alt=""></div>+{{ $front_setting->phone }}</div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ url('public/frontend/images/mail.png') }}" alt=""></div><a href="mailto:decentfootwearltd@hotmail.com">{{ $front_setting->email }}</a></div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="{{ route('wholesale') }}"> For Wholesale<i class="fas fa-chevron-down"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="top_bar_user">
                                
                                @guest
                                <div><a href="{{ route('login') }}"> <div class="user_icon"><img src="{{ url('public/frontend/images/user.svg') }}" alt=""></div>Login / Register</a></div>
                                @else
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>

                                        <a href="{{ route('home') }}"><div class="user_icon"><img src="{{ url('public/frontend/images/user.svg') }}" alt=""></div> Profile<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="{{ route('home') }}">My Account</a></li>
                                            <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                            <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                            <li><a href="{{ route('user.logout') }}" style="padding-bottom:10px;">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-3 col-sm-4 col-12 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset($front_setting->site_logo) }}" alt=""></a></div>
                        </div>
                    </div>

                    @php
                        $category = DB::table('categories')->get();
                    @endphp

                    <!-- Search -->
                    <div class="col-lg-6 col-sm-12 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="{{ route('search.product') }}" method="post" class="header_search_form clearfix">
                                        @csrf
                                        <input type="search" name="search_product" required="required" class="header_search_input" placeholder="Search for products..." >
                                        <div class="custom_dropdown" d>
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                   
                                                    @foreach($category as $row)
                                                    <li><a class="clc" href="">{{ $row->category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ url('public/frontend/images/search.png') }}" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-3 col-sm-12 col-12 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            @guest
                            @else
                            @php
                                $wishlist=DB::table('wishlists')->where('user_id', Auth::id())->get();
                            @endphp
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="{{ url('public/frontend/images/heart.png') }}" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="{{ route('user.wishlist') }}">Wishlist</a></div>
                                    <div class="wishlist_count">{{ count($wishlist) }}</div>
                                </div>
                            </div>
                            @endguest
                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{ url('public/frontend/images/cart.png') }}" alt="">
                                        <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ route('show.cart')}}">Cart</a></div>
                                        <div class="cart_price"><a href="{{ route('show.cart')}}" style="text-decoration: none;color: #a3a3a3;">{{ Cart::subtotal() }} TK</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="main_nav_content text-center">

                            <!-- Categories Menu -->

                            
                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{ url('/') }}">Home<i class="fas fa-chevron-down"></i></a></li>
                                    
                                    @foreach($category as $row)
                                    <li class="hassubs">
                                        <a href="{{ URL('category/'.$row->category_slug.'/'.$row->id) }}">{{ $row->category_name }}<i class="fas fa-chevron-down"></i></a>

                                        @php
                                            $subcategory=DB::table('subcategories')->where('category_id', $row->id)->get();
                                        @endphp
                                        <ul>
                                            @foreach($subcategory as $sub)
                                            <li><a href="{{ URL('category/'.$row->category_slug.'/'.$sub->subcategory_slug.'/'.$sub->category_id.'/'.$sub->id) }}">{{ $sub->subcategory_name }}<i class="fas fa-chevron-down"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach

                                    <li><a href="{{ route('blog') }}">Blog<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('contact') }}">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page_menu_content">
                            
                            <div class="page_menu_search">
                                <form action="{{ route('search.product') }}" method="post">
                                    @csrf
                                    <input type="search" name="search_product" required="required" class="page_menu_search_input" placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                @guest
                                <li class="page_menu_item">
                                    <a href="{{ route('login') }}">Login / Register<i class="fa fa-angle-down"></i></a>
                                </li>
                                @else
                                <li class="page_menu_item">
                                    <a href="{{ route('home') }}">Profile<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="">Wishlist<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="">Checkout<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="{{ route('user.logout') }}">Logout<i class="fa fa-angle-down"></i></a>
                                </li>
                                @endguest
                                
                                <li class="page_menu_item">
                                    <a href="{{ url('/') }}">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                @foreach($category as $row)
                                <li class="page_menu_item has-children">
                                    <a href="{{ URL('category/'.$row->category_slug.'/'.$row->id) }}">{{ $row->category_name }}<i class="fa fa-angle-down"></i></a>
                                    @php
                                            $subcategory_responsive=DB::table('subcategories')->where('category_id', $row->id)->get();
                                    @endphp
                                    <ul class="page_menu_selection">
                                        @foreach($subcategory_responsive as $sub)
                                        <li><a href="{{ URL('category/'.$row->category_slug.'/'.$sub->subcategory_slug.'/'.$sub->category_id.'/'.$sub->id) }}">{{ $sub->subcategory_name }}<i class="fa fa-angle-down"></i></a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li class="page_menu_item"><a href="{{ route('blog') }}">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="{{ route('contact') }}">contact<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="{{ route('wholesale') }}">For Wholesale<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                            
                            <div class="menu_contact">
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ url('public/frontend/images/phone_white.png') }}" alt=""></div>+01303-459442</div>
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ url('public/frontend/images/mail_white.png') }}" alt=""></div><a href="mailto:decentfootwearltd@hotmail.com">decentfootwearltd@hotmail.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
        <!-- Main Navigation -->

        @yield('content')

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset($front_setting->site_logo) }}" alt=""></a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">+{{ $front_setting->phone }}</div>
                        <div class="footer_contact_text">
                            <p>{{ $front_setting->address }}</p>
                            , 
                        </div>
                            {{-- Newsletter area in footer section --}}
                        <div class="newsletter_content clearfix">
                             <form action="{{ route('store.newslater') }}" class="newsletter_form" method="post">
                                    @csrf
                                <input type="email" class="newsletter_input" name="email" required placeholder="Enter Your Email">
                                <button type="submit" class="newsletter_button">Subscribe</button>
                            </form>
                        </div>

                        <div class="footer_social">
                            <ul>
                                <li><a href="{{ $front_setting->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $front_setting->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $front_setting->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $front_setting->google }}" target="_blank"><i class="fab fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer_column">
                        <div class="footer_title">About US</div>
                        <div class="footer_contact_text">
                            <p>{{ $front_setting->about }}</p>
                            , 
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Decent Footwear</div>
                        <ul class="footer_list">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @foreach($category as $row)
                            <li><a href="{{ URL('category/'.$row->category_slug.'/'.$row->id) }}">{{ $row->category_name }}</a></li>
                            @endforeach
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('wholesale') }}">For Wholesale</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Service</div>
                        <ul class="footer_list">
                            <li><a href="#">About US</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">Corporate Sale</a></li>
                            <li><a href="#">How to buy Product</a></li>
                            <li><a href="#">How To use Coupon</a></li>
                            
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Account</div>
                        <ul class="footer_list">
                            @guest
                                <li><a href="{{ route('login') }}">Login / Register</a></li>
                            @else
                                <li><a href="{{ route('home') }}">Profile</a></li>
                                <li><a href="">Wishlist</a></li>
                                <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                <li><a href="{{ route('user.logout') }}" style="padding-bottom:10px;">Logout</a></li>
                            @endguest

                            @if(Session()->get('lang')=='bangla')
                            <li><a href="{{ route('language.english') }}">English</a></li>
                            @else
                            <li><a href="{{ route('language.bangla') }}">Bangla</a></li>
                            @endif
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Decent Footwear All Rights Reserved | Developed By <a href="https://www.yesssoft.com/" target="_blank">Yess Soft</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ url('public/frontend/images/logos_1.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ url('public/frontend/images/logos_2.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ url('public/frontend/images/logos_3.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ url('public/frontend/images/logos_4.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<a href="#" class="scrolltotop"><i class="fa fa-angle-double-up"></i></a>

<script src="{{ asset('public/frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/easing/easing.js') }}"></script>

<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
  



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


 <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script> 
</body>

</html>