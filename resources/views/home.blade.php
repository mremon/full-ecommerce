@extends('layouts.app')
@section('content')

<div class="everysinglepage">
    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('public/user_profile.png') }}" class="card-img-top" style="width: 40%;height:auto; margin:0 auto; border-radius: 50%;"  alt="...">
              <div class="card-body" style="text-align: center;">
                <h3 class="card-title">{{ Auth::user()->name }}</h3>
                <p class="card-text">{{ Auth::user()->phone }} <br> {{ Auth::user()->email }}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ route('password.change') }}">Change Password</a></li>
                <li class="list-group-item">Other setting</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>
              <div class="card-body" style="padding:0px;">
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Logout</a>
              </div>
            </div>
          </div>


          <div class="col-md-9">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
          
        </div>
    </div>
</div>            
@endsection
