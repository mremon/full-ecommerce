@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <span class="breadcrumb-item active">Offer Setting</span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">

          <div class="row">

            <div class="col-md-12" style="margin-bottom:40px;">
              <div class="card bg-gray-200">
                <div class="card-body">
                  <h5 class="card-title">Front Page Offer Title</h5>
                  <p class="card-subtitle"><h5>{{ $edit_f_p_o_t->front_page_offer_title }}</h5></p>
                  <form action="{{ url('update/front/page/offer/title/'.$edit_f_p_o_t->id) }}" method="post">
                      @csrf
                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="front_page_offer_title" value="{{ $edit_f_p_o_t->front_page_offer_title }}">
                            <label class="form-control-label">Heading Offer Title: <span class="tx-danger">*</span></label>
                          </div>
                        </div>

                      </div>
                      <button tyle="submit" class="btn btn-sm btn-info">Update</button>
                    </form>
                </div>
              </div><!-- card -->
            </div>

            <div class="col-md-12" style="margin-bottom:40px;">
              <div class="card bg-gray-200">
                <div class="card-body">
                  <h5 class="card-title">CountDown Offer</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <td>Dates</td>
                          <td>Hours</td>
                          <td>Minutes</td>
                          <td>Seconds</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $editofferdate->date }}</td>
                          <td>{{ $editofferdate->h }}</td>
                          <td>{{ $editofferdate->m }}</td>
                          <td>{{ $editofferdate->s }}</td>
                        </tr>
                      </tbody>
                    </table>
                    <form action="{{ url('update/date/'.$editofferdate->id) }}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group">

                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" name="date" value="{{ $editofferdate->date }}" class="form-control" placeholder="YYYY/MM/DDn">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input class="form-control" type="text" name="h" value="{{ $editofferdate->h }}">
                            <label class="form-control-label">Hours: <span class="tx-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input class="form-control" type="text" name="m" value="{{ $editofferdate->m }}">
                            <label class="form-control-label">Minutes: <span class="tx-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input class="form-control" type="text" name="s" value="{{ $editofferdate->s }}">
                            <label class="form-control-label">Seconds: <span class="tx-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <h5>{{ $editofferdate->hot_offer_title }}</h5>
                            <input class="form-control" type="text" name="hot_offer_title" value="{{ $editofferdate->hot_offer_title }}">
                            <label class="form-control-label">Offer Title: <span class="tx-danger">*</span></label>
                          </div>
                        </div>
                      </div>
                      <button tyle="submit" class="btn btn-sm btn-info">Update</button>
                    </form>

                </div>
              </div><!-- card -->
            </div>

            


            <div class="col-md-12" style="margin-bottom:40px;">
              <div class="card bg-gray-200">
                <div class="card-body">
                  
                  <form action="{{ url('update/offer/banner/'.$offer_banner->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="col-lg-6">

                    <h5 class="card-title">First Offer Banner</h5>
                       <lebel>Update Image  <span class="tx-danger">*</span></lebel>
                      <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="offer_banner_image_one" onchange="readURL(this);"  accept="image">

                        <input type="hidden" name="old_image_one" value="{{ $offer_banner->offer_banner_image_one }}">
                        <span class="custom-file-control"></span>
                        <img src="#" id="one" style="margin-top:50px;">
                      </label>
                      <label>Old Image here: <img src="{{ URL::to($offer_banner->offer_banner_image_one) }}" style="width:140px;height:50px; margin-top:10px;" alt=""> </label>

                    <h5 class="card-title">Second Offer Banner</h5>
                        <lebel>Update Image  <span class="tx-danger">*</span></lebel>
                      <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="offer_banner_image_two" onchange="readURL1(this);"  accept="image">

                        <input type="hidden" name="old_image_two" value="{{ $offer_banner->offer_banner_image_two }}">
                        <span class="custom-file-control"></span>
                        <img src="#" id="two" style="margin-top:50px;">
                      </label>
                      <label>Old Image here: <img src="{{ URL::to($offer_banner->offer_banner_image_two) }}" style="width:140px;height:50px; margin-top:10px;" alt=""> </label>

                      <br><br>
                      <button tyle="submit" class="btn btn-sm btn-info">Update</button>
                    </div>
                  </form>
                </div>
              </div><!-- card -->
            </div>

            

            </div>

        </div>
      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(50);
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
                  .width(140)
                  .height(50);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection