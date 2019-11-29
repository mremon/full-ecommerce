@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Admin change Password</h6>
              <p class="mg-b-20 mg-sm-b-30">If there have a problem with current admin password change from here.<br><br></p>
               
              <form method="POST" action="{{ Route('admin.password.update') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                  <div class="row">
                    <label for="oldpass" class="col-md-4 col-form-label ">{{ __('Old Password') }}: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>
                      @if ($errors->has('oldpass'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('oldpass') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div><!-- row -->

                  <div class="row mg-t-20">
                    <label for="password" class="col-md-4 col-form-label ">{{ __('New Password') }}: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                                


                  <div class="row mg-t-20">
                    <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>


                  <div class="form-layout-footer mg-t-30">
                    <button type="submit" class="btn btn-info mg-r-5">{{ __('Reset Password') }}</button>
                  </div><!-- form-layout-footer -->
              </form>

            </div><!-- card -->
          </div><!-- col-12 -->
        </div><!-- row -->


      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
