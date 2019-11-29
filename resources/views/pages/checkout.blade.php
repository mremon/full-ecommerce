@extends('layouts.app')

@section('content')
@php
$setting=DB::table('settings')->first();
$charge=$setting->shipping_charge;
$subtotal =str_replace( ',', '', Cart::subtotal() );
@endphp

    <div class="everysinglepage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div style="overflow-x:auto;">
                    <table class="table table-bordered text-center">
                      <thead class="thead" style="background:#ccc;">
                        <tr>
                          
                          <th scope="col">Product</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Color</th>
                          <th scope="col">size</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                          <th scope="col">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cart as $row)
                        <tr>
                          <td>{{ $row->name }}</td>
                          <td><img src="{{ asset($row->options->image) }}" alt="" style="width:80px;height:80px;"></td>
                          <td>{{ $row->options->color }}</td>
                          <td>{{ $row->options->size }}</td>
                          <td>{{ $row->qty }}</td>
                          <td>{{ $row->price }}</td>
                          <td>{{ $row->price * $row->qty }} TK</td>
                        </tr>
                        
                        @endforeach
                      </tbody> 
                    </table>
                  </div>

                  <div class="row">
                    <div class="col-md-9">
                     @if(Session::has('coupon'))
                      @else
                      <form action="{{ route('apply.coupon') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Apply Coupon</label>
                          <input type="text" name="coupon" class="form-control" placeholder="Coupon Code" style="max-width: 150px;" required="">
                        </div>
                        <button type="submit" class="btn btn-default btn-sm">Apply</button>
                      </form>
                      @endif
                      
                    </div>
                      <div class="col-md-3">
                        <table class="table">
                          <tr>
                            <th style="padding:2px;">Order Total</th>
                            <td style="padding:2px;">:</td>
                            <td style="padding:2px;">
                              @if(Session::has('coupon'))
                              {{ Session::get('coupon')['balance'] }} TK
                              @else
                              {{ Cart::subtotal() }} TK
                              @endif
                            </td>
                          </tr>
                          @if(Session::has('coupon'))
                          <tr style="color:#888;">
                            <th style="padding:2px;">Coupon {{ Session::get('coupon')['name'] }} <a href="{{ route('coupon.remove') }}" style="background:#ccc; color:#990000;padding-left:5px;padding-right:5px;">X</a></th>
                            <td style="padding:2px;">:</td>
                            <td style="padding:2px;">
                              {{ Session::get('coupon')['discount'] }} TK

                            </td>
                          </tr>
                          @else
                          @endif

                          <tr>
                            <th style="padding:2px;">Vat</th>
                            <td style="padding:2px;">:</td>
                            <td style="padding:2px;">0 TK</td>
                          </tr>
                          <tr>
                            <th style="padding:2px;">Shipping Charge</th>
                            <td style="padding:2px;">:</td>
                            <td style="padding:2px;">{{ $charge }} TK</td>
                          </tr>
                          <tr>
                            <th style="padding:2px;"><h4>Total</h4></th>
                            <td style="padding:2px;">:</td>
                            <th style="padding:2px;">@if(Session::has('coupon'))
                              {{ Session::get('coupon')['balance'] + $charge }} TK
                              @else
                              {{ $subtotal + $charge }} TK
                              @endif
                            </th>
                          </tr>
                        </table>
                        <a href="{{ route('payment.step') }}" class="btn btn-sm btn-primary btn-block">Next</a>
                        <a href="{{ route('show.cart') }}" class="btn btn-sm btn-warning btn-block">Back to cart</a>
                      </div>

                  </div>

                </div>
            </div>

            <div class="panel"></div>
        </div>
    </div>


@endsection

            