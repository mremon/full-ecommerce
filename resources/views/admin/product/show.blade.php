@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="{{ route('all.product') }}">Product</a>
        <span class="breadcrumb-item active">Product Details</span>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details
            <a href="{{ route('all.product') }}" class="btn btn-info" style="float:right;" >All Product</a>
          </h6>
      
          <div class="table-wrapper">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td><strong>Product Name</strong></td>
                  <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                  <td><strong>Product Code</strong></td>
                  <td>{{ $product->product_code }}</td>
                </tr>
                <tr>
                  <td><strong>Product Quantity</strong></td>
                  <td>{{ $product->product_quantity }}</td>
                </tr>
                <tr>
                  <td><strong>Product Category</strong></td>
                  <td>{{ $product->category_name }}</td>
                </tr>
                <tr>
                  <td><strong>Product Subcategory</strong></td>
                  <td>{{ $product->subcategory_name }}</td>
                </tr>
                <tr>
                  <td><strong>Product Brand</strong></td>
                  <td>{{ $product->brand_name }}</td>
                </tr>
                <tr>
                  <td><strong>Product Size</strong></td>
                  <td>{{ $product->product_size }}</td>
                </tr>
                <tr>
                  <td><strong>Product Color</strong></td>
                  <td>{{ $product->product_color }}</td>
                </tr>
                <tr>
                  <td><strong>Product Price</strong></td>
                  <td>{{ $product->product_selling_price }}</td>
                </tr>
                <tr>
                  <td><strong>Product Details</strong></td>
                  <td>{!! $product->product_details !!}</td>
                </tr>
                <tr>
                  <td><strong>Product Details</strong></td>
                  <td>{!! $product->product_short_details !!}</td>
                </tr>
                <tr>
                  <td><strong>Product Video link</strong></td>
                  <td>{{ $product->product_video_link }}</td>
                </tr>
                <tr>
                  <td><strong>Product Image One (Main Thumbnail)</strong></td>
                  <td><img src="{{ URL::to($product->product_image_one) }}" style="width:150px; height:150px;" alt=""></td>
                </tr>
                <tr>
                  <td><strong>Product Image Two</strong></td>
                  <td><img src="{{ URL::to($product->product_image_two) }}" style="width:150px; height:150px;" alt=""></td>
                </tr>
                <tr>
                  <td><strong>Product Image Three</strong></td>
                  <td><img src="{{ URL::to($product->product_image_three) }}" style="width:150px; height:150px;" alt=""></td>
                </tr>
                <tr>
                  <td><strong>Main Slider</strong></td>
                  <td>
                    @if($product->main_slider == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Flash</strong></td>
                  <td>
                    @if($product->hot_deal == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Best Rated</strong></td>
                  <td>
                    @if($product->best_rated == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Trend Product</strong></td>
                  <td>
                    @if($product->trend == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Mid Slider</strong></td>
                  <td>
                    @if($product->mid_slider_one == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Hot New</strong></td>
                  <td>
                    @if($product->hot_deal_new == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Season Special offer</strong></td>
                  <td>
                    @if($product->buyone_getone == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Status</strong></td>
                  <td>
                    @if($product->status == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td><strong>Created At</strong></td>
                  <td>{{ $product->created_at }}</td>
                </tr>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
