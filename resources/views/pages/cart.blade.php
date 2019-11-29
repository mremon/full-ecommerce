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
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                          <th scope="col">Subtotal</th>
                          <th scope="col">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cart as $row)
                        <tr>
                          <td>{{ $row->name }}</td>
                          <td><img src="{{ asset($row->options->image) }}" alt="" style="width:80px;height:80px;"></td>
                          <td>{{ $row->options->color }}</td>
                          <td>{{ $row->options->size }}</td>
                          <td>
                            <form action="{{ route('update.cartitem') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $row->rowId }}" name="productid">
                              <input class="form-control" type="number" pattern="[0-9]*" value="{{ $row->qty }}" name="qty" style="width:70px;height:32px;float:left;">
                              <button type="submit" class="btn btn-sm btn-success" style="float:left;"><i class="fa fa-check-square"></i></button>
                            </form>
                          </td>
                          <td>{{ $row->price }}</td>
                          <td>{{ $row->price * $row->qty }} TK</td>
                          <td scope="row"><a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger">X</a></td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="6"></td>
                          <td><h4>Total: {{ Cart::subtotal() }} TK</h4><a href="{{ route('user.checkout') }}" class="btn btn-block btn-sm btn-primary">Checkout</a></td>
                          <td><a href="{{ route('user.cart.allremove') }}" class="btn btn-block btn-sm btn-warning" style="margin-top:30px;">All Cancel</a></td>
                        </tr>
                      </tbody>
                        
                    </table>
                    
                  </div>
                </div>
            </div>
            <div class="panel"></div>
        </div>
    </div>

@endsection
