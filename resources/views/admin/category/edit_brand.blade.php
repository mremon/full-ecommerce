@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="{{ route('brands') }}">Brand</a>
        <span class="breadcrumb-item active">Update</span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand Update</h6>
          <div class="table-wrapper">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            
            <form action="{{ url('update/brand/'.$brand->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-35">
                  <div class="row">
                    <label class="col-sm-12 form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                      <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}">
                    </div>
                  </div><!-- row <--><br>
                  <div class="row">
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                      <label class="custom-file">    
                        <input type="file" name="brand_logo" id="file" class="custom-file-input">
                        <span class="custom-file-control">Brand logo</span>
                      </label>
                    </div>
                  </div><!-- row <--><br>
                  <div class="row">
                    <label class="col-sm-12 form-control-label">Old Brand Logo:</label>
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                      <img src="{{ URL::to($brand->brand_logo) }}" alt="" style="width:200px; height:auto;">
                      <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                    </div>
                  </div><!-- row -->
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Update</button>
                </div>
          </form>
          </div><!-- table-wrapper -->
        </div>

      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    

@endsection