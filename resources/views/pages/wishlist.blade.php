@extends('layouts.app')

@section('content')

    <div class="everysinglepage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div style="overflow-x:auto;">
                    <table class="table table-bordered table-hover text-center">
                      <thead class="thead" style="background:#ccc;">
                        <tr>
                          
                          <th scope="col">Product</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Color</th>
                          <th scope="col">size</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($product as $row)
                        <tr>
                          <td>{{ $row->product_name }}</td>
                          <td><img src="{{ asset($row->product_image_one) }}" alt="" style="width:80px;height:80px;"></td>
                          <td>{{ $row->product_color }}</td>
                          <td>{{ $row->product_size}}</td>
                          <td scope="row"><a href="" class="btn btn-sm btn-primary">Add To cart</a>
                          <a href="" class="btn btn-sm btn-danger">X</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                        
                    </table>
                    
                  </div>
                </div>
            </div>
            <div class="panel"></div>
        </div>
    </div>

@endsection
