@extends('layouts.app')

@section('content')

    <div class="everysinglepage">
        <div class="container">
            <div class="row">
                    <div class="col-md-5 offset-lg-1" style="">
                        <div class="form-custom-mr">
                        <div class="contact_form_container form-container-custom-mr">
                            <div class="contact_form_title"><h3>Sign In</h3></div>

                            <form form action="{{route('login')}}" method="post" id="contact_form">
                                @csrf
                                <div class="form-group">
                                <label for="email">Email Or Phone</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" style="font-size:12px;" placeholder="Email or Phone" required="">
                                    
                                     @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </div>

                                <div class="form-group">
                                <label for="forpassword">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" style="font-size:12px;" id="forpassword" placeholder="Password" required="">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                
                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-info">LogIn</button>
                                </div>
                            </form> <br>
                            <a href="{{ route('password.request') }}" class="text-black">I forgot my password</a>
                            <br><br>
                            <a href="#" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"> &nbsp</i>  LogIn with Facebook</a>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google-plus-square"> &nbsp</i>LogIn With Google</a>

                        </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-custom-mr">

                        <div class="contact_form_container">
                            <div class="contact_form_title"><h3>Sign Up</h3></div>

                            <form action="{{route('register')}}" method="post" id="contact_form">
                                @csrf
                                <div class="form-group">
                                <label for="forname">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="forname" style="font-size:12px;" placeholder="Enter your Full Name" required="">
                                </div>
                                <div class="form-group">
                                <label for="foremail">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="foremail" style="font-size:12px;" placeholder="Enter your Email" required="">
                                </div>
                                <div class="form-group">
                                <label for="forphone">Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="forphone" style="font-size:12px;" placeholder="Enter your Phone" required="">
                                </div>

                                <div class="form-group">
                                <label for="forpassword">Password</label>
                                    <input type="password" class="form-control" name="password" id="forpassword" style="font-size:12px;" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                <label for="forpasswordtwo">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="forpasswordtwo" style="font-size:12px;" placeholder="Retype Password" required="">
                                </div>

                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-info">Register</button>
                                </div>
                            </form>

                        </div>
                        </div>
                    </div>
            </div>
            <div class="panel"></div>
        </div>
    </div>

@endsection
