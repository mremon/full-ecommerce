@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <span class="breadcrumb-item active">Others</span>
        <span class="breadcrumb-item active">Front Setting</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <form action="{{ url('update/front/setting/'.$front_all->id) }}" method="post" enctype="multipart/form-data">
            @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone" value="{{ $front_all->phone }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" value="{{ $front_all->email }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Address<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="address">
                    {{ $front_all->address }}
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">About<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote1" name="about">
                    {{ $front_all->about }}
                   </textarea>
                </div>  
              </div>

              

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="facebook" value="{{ $front_all->facebook }}" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Twitter: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="twitter" value="{{ $front_all->twitter }}" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Youtube: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="youtube" value="{{ $front_all->youtube }}" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Google Plus: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="google" value="{{ $front_all->google }}" >
                </div>
              </div><!-- col-4 -->
            </div>

            <div class="col-lg-4">
                <lebel>Site Logo  <span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="site_logo" onchange="readURL(this);"  accept="image">

                  <input type="hidden" name="old_site_logo" value="{{ $front_all->site_logo }}">
                  <span class="custom-file-control"></span>
                  <img src="#" id="one" >
                </label>
                <label>Old Logo: <img src="{{ URL::to($front_all->site_logo) }}" style="width:260px;height:60px;" alt=""> </label>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(260)
                    .height(60);
            };
            reader.readAsDataURL(input.files[0]);
        }
     }
  </script>


@endsection
