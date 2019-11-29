@extends('layouts.app')

@section('content')
@php
$setting=DB::table('settings')->first();
$charge=$setting->shipping_charge;
$subtotal =str_replace( ',', '', Cart::subtotal() );
@endphp

    <div class="everysinglepage">
        <div class="container">
            <div class="row" >
                    <div class="col-md-7 form-custom-mr" style="">
                        <div class="">
                        <div class="contact_form_container form-container-custom-mr">
                            <div class="contact_form_title"><h3>Cart Products Overview</h3><hr></div>
                            <div class="row">
                            <div class="col-md-12">
                              <div style="overflow-x:auto;">
                                <table class="table table-bordered text-center">
                                  <thead class="thead" style="background:#ccc;">
                                    <tr>
                                      
                                      <th scope="col">Product</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Subtotal</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($cart as $row)
                                    <tr>
                                      <td>{{ $row->name }}</td>
                                      <td>{{ $row->qty }}</td>
                                      <td>{{ $row->price }}</td>
                                      <td>{{ $row->price * $row->qty }} TK</td>
                                    </tr>
                                    
                                    @endforeach
                                  </tbody> 
                                </table>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
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
                                  </div>

                              </div>

                            </div>
                        </div>

                        </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 form-custom-mr">
                        <div class="">

                        <div class="contact_form_container">
                            <div class="contact_form_title"><h3>Shipping Address</h3><hr></div>

                            <form action="{{ route('payment.process') }}" method="post" id="contact_form">
                                @csrf
                                <div class="form-group">
                                <label for="forname">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="forname" style="font-size:12px;" placeholder="Enter your Full Name" required="">
                                </div>
                                <div class="form-group">
                                <label for="foremail">Email Address</label>
                                    <input type="email" class="form-control" name="email" value="" id="foremail" style="font-size:12px;" placeholder="Enter your Email" required="">
                                </div>
                                <div class="form-group">
                                <label for="forphone">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" value="" id="forphone" style="font-size:12px;" placeholder="Enter your Phone" required="">
                                </div>

                                <div class="form-group">
                                <label for="forpassword">Address</label>
                                    <input type="text" class="form-control" name="address" id="forpassword" style="font-size:12px;" placeholder="Address" required="">
                                </div>
                                <div class="form-group">
                                <label for="forpasswordtwo">City</label>
                                    <input type="text" class="form-control" name="city" id="forpasswordtwo" style="font-size:12px;" placeholder="City / District" required="">
                                </div>
                                <div class="text-center"><b>Select payment method</b>
                                    <ul class="logos_list" style="margin-top:10px;margin-bottom:20px;">
                                        <li><input type="radio" name="payment" value="stripe"><img src="{{ url('public/frontend/images/logos_1.png') }}" alt=""></a></li>
                                        <li><input type="radio" name="payment" value="paypal"><img src="{{ url('public/frontend/images/logos_3.png') }}" alt=""></a></li>
                                        <li><input type="radio" name="payment" value="ideal"><img src="{{ url('public/frontend/images/ideal.webp') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
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
