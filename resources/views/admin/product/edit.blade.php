@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="{{ route('all.product') }}">Product</a>
        <span class="breadcrumb-item active">Add Product</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product <a href="{{ url('admin/product/all') }}" class="btn btn-info pull-right">All Product</a></h6>
          <form action="{{ url('update/product/all/'.$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose Category">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php if($product->category_id == $row->id){ echo "selected"; } ?>>{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="subcategory_id" data-placeholder="Select Category First">
                    @foreach($subcategory as $row)
                    <option value="{{ $row->id }}" <?php if($product->subcategory_id == $row->id){ echo "selected"; } ?>>{{ $row->subcategory_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="brand_id" data-placeholder="Choose Brand">
                    <option label="Choose Brand"></option>
                    @foreach($brand as $row)
                    <option value="{{ $row->id }}" <?php if($product->brand_id == $row->id){ echo "selected"; } ?>>{{ $row->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control" type="text" name="product_size" id="size" value="{{ $product->product_size }}" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <input class="form-control lg-4" type="text" name="product_color" value="{{ $product->product_color }}" data-role="tagsinput" id="color" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_selling_price"  value="{{ $product->product_selling_price }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Discount Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_discount_price"  value="{{ $product->product_discount_price }}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="product_details">
                    {{ $product->product_details }}
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Short Details<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote6" name="product_short_details">
                    {{ $product->product_short_details }}
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                   <input class="form-control" placeholder="video link" name="product_video_link" value="{{ $product->product_video_link }}">
                </div>  
              </div>

              <div class="col-lg-4">
                  <lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="product_image_one" onchange="readURL(this);"  accept="image">

                    <input type="hidden" name="old_product_image_one" value="{{ $product->product_image_one }}">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one" >
                  </label>
                  <label>Old Image: <img src="{{ URL::to($product->product_image_one) }}" style="width:60px;height:60px;" alt=""> </label>
                </div>
                <div class="col-lg-4">
                  <lebel>Image Two <span class="tx-danger">*</span></lebel>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="product_image_two" onchange="readURL1(this);"  accept="image">

                    <input type="hidden" name="old_product_image_two" value="{{ $product->product_image_two }}">
                    <span class="custom-file-control"></span>
                    <img src="#" id="two" >
                  </label>
                  <label>Old Image: <img src="{{ URL::to($product->product_image_two) }}" style="width:60px;height:60px;" alt=""> </label>
                </div>
                <div class="col-lg-4">
                  <lebel>Image Three <span class="tx-danger">*</span></lebel>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="product_image_three" onchange="readURL2(this);"  accept="image">

                    <input type="hidden" name="old_product_image_three" value="{{ $product->product_image_three }}">
                    <span class="custom-file-control"></span>
                    <img src="#" id="three" >
                  </label>
                  <label>Old Image: <img src="{{ URL::to($product->product_image_three) }}" style="width:60px;height:60px;" alt=""> </label>
                </div>
            </div><!-- row -->
            <br><hr>
            <div class="row">
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1" <?php if($product->main_slider == 1){ echo "checked"; } ?>>
                  <span>Main Slider</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal" value="1" <?php if($product->hot_deal == 1){ echo "checked"; } ?>>
                  <span>Flash sale</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="best_rated" value="1" <?php if($product->best_rated == 1){ echo "checked"; } ?>>
                  <span>Best Rated</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="trend" value="1" <?php if($product->trend == 1){ echo "checked"; } ?>>
                  <span>Trend Product</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mid_slider_one" value="1" <?php if($product->mid_slider_one == 1){ echo "checked"; } ?>>
                  <span>Mid Slider</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal_new" value="1" <?php if($product->hot_deal_new == 1){ echo "checked"; } ?>>
                  <span>Hot New</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="buyone_getone" value="1" <?php if($product->buyone_getone == 1){ echo "checked"; } ?>>
                  <span>Season Special Offer</span>
                </label>
              </div>

             

            </div>

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>


    <script>
      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });

      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
           $('select[name="category_id"]').on('change', function(){
               var category_id = $(this).val();
               if(category_id) {
                   $.ajax({
                       url: "{{  url('/get/subcategory/') }}/"+category_id,
                       type:"GET",
                       dataType:"json",
                       success:function(data) {
                          var d =$('select[name="subcategory_id"]').empty();
                             $.each(data, function(key, value){

                                 $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                             });
    
                       },
                      
                   });
               } else {
                   alert('danger');
               }

           });
       });

  </script>

  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
     }
  </script>
  <script type="text/javascript">
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(150)
                  .height(150);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(150)
                  .height(150);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>


@endsection
