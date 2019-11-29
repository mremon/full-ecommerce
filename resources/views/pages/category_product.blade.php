@extends('layouts.app')

@section('content')

    <div class="everysinglepage">
        <div class="container">
            <div class="row">
                
                @foreach($product as $row)
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
                                {{--<button class="arrivals_single_button_mr addcart" data-id="{{ $row->id }}">Add to Cart</button>--}}
                                <button class="arrivals_single_button_mr" id="{{ $row->id }}" data-toggle="modal" data-target="#cartmodel" onclick="productview(this.id)">Add to Cart</button>
                            </div>
                            <div class="arrivals_single_fav_mr product_fav_mr addwishlist" data-id="{{ $row->id }}"><i class="fas fa-heart"></i></div>
                                <ul class="arrivals_single_marks_mr product_marks_mr">
                                  @if($row->product_discount_price == NULL)
                                        {{-- <li class="arrivals_single_mark_mr product_mark_mr product_new_mr" style="background:#0E8CE4;">new</li> --}}
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
                  <div class="col-md-4 ml-auto" style="text-align:center"><img src="public/media/product/1650610191342872.jpg" alt="" id="pimage" style="width:150px;height:150px;"><br><br><br>
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
