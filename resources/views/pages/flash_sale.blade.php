@extends('layouts.app')

@section('content')

    <div class="everysinglepage">
        <div class="container">
            <div class="row">
                
                @foreach($flash_sale as $row)
                <div class="col-md-3">
                    <div class="arrivals_single_mr clearfix">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <a href="{{ URL('product/details/'.$row->id.'/'.$row->product_slug) }}">
                            <div class="arrivals_single_image_mr"><img src="{{ asset($row->product_image_one) }}" alt=""></div></a>
                            <div class="arrivals_single_content_mr">
                                 <div class="arrivals_single_category_mr"><a style="text-shadow: rgba(0,0,0,.01) 0 0 1px;background-color: transparent;color: rgba(0,0,0,0.5);">{{ $row->subcategory_name }}</a></div>
                                <div class="arrivals_single_name_container_mr clearfix">
                                        <div class="arrivals_single_name_mr"><a href="{{ URL('product/details/'.$row->id.'/'.$row->product_slug) }}">{{ $row->product_name }}</a></div>
                                        <div class="arrivals_single_price_mr text-right">{{ $row->product_selling_price }} TK</div>
                                </div>
                                <button class="arrivals_single_button_mr addcart" data-id="{{ $row->id }}">Add to Cart</button>
                            </div>
                            <div class="arrivals_single_fav_mr product_fav_mr addwishlist" data-id="{{ $row->id }}"><i class="fas fa-heart"></i></div>
                                <ul class="arrivals_single_marks_mr product_marks_mr">
                                  @if($row->product_discount_price == NULL)
                                        {{-- <li class="arrivals_single_mark product_mark product_new" style="background:#0E8CE4;">new</li> --}}
                                  @else
                                      @php
                                        $amount=$row->product_selling_price - $row->product_discount_price;
                                        $discount=$amount/$row->product_selling_price*100;
                                      @endphp
                                        <li class="arrivals_single_mark_mr product_mark_mr product_new_mr" style="background:#DF3B3B;">-{{ intval($discount) }}%</li>
                                  @endif
                                </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="panel"></div>
        </div>
    </div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>





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
