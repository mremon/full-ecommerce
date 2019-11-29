@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="{{ route('all.blogpost') }}">Posts</a>
        <span class="breadcrumb-item active">Update Post</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Blog Post <a href="{{ route('all.blogpost') }}" class="btn btn-info pull-right">All Post</a></h6>
          <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en" value="{{ $post->post_title_en }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (Bengali): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  value="{{ $post->post_title_bn }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="post_category_id" data-placeholder="Choose Category" required="">
                    <option label="Choose Category"></option>
                    @foreach($post_category as $row)
                    <option value="{{ $row->id }}" <?php if($row->id == $post->post_category_id){ echo "selected"; } ?>>{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (English)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="post_details_en">
                    {{ $post->post_details_en }}
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (Bengali)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote1" name="post_details_bn">
                    {{ $post->post_details_bn }}
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-4">
                <lebel>Post Image  <span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);"  accept="image">

                  <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                  <span class="custom-file-control"></span>
                  <img src="#" id="one" >
                </label>
                <label>Old Image: <img src="{{ URL::to($post->post_image) }}" style="width:60px;height:60px;" alt=""> </label>
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


@endsection
