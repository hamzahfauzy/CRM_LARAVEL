@extends('layouts.auth')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <h2><em class="ti-bag"></em> My Bag</h2>
                    <form method="post" action="{{ route('customer.transaction.add') }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $total = 0; 
                            @endphp
                            @foreach($mybag as $bag)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ url('images/'.$bag->product->image->file_url) }}" alt="" width="50" height="50">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $bag->product->nama }}</p>
                                            <a href="{{ route('customer.bag.delete', $bag->id) }}" class="btn-danger" style="padding:2px 5px;">Cancel</a>
                                        </div>
                                    </div>
                                </td>
                                <td><h5>Rp. {{ number_format($bag->product->harga) }}</h5></td>
                                <td>
                                    <div class="product_count">
                                    @if($bag->product->stok > 0)
                                        <input type="hidden" name="bag_id[]" value="{{ $bag->id }}">
                                        <input type="hidden" name="product_id[]" value="{{ $bag->product->id }}">
                                        <input type="number" name="jumlah[]" min="1" max="{{ $bag->product->stok }}" value="@if($bag->product->stok < $bag->jumlah){{ $bag->product->stok }}@else{{ $bag->jumlah }}@endif" class="input-text qty">
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            @php
                                $total += $bag->jumlah*$bag->product->harga;
                            @endphp
                            @endforeach
                            @if(count($mybag)>0)
                            <tr>
                                <td> </td>
                                <td><h5>Subtotal</h5></td>
                                <td><h5>

                                    Rp. {{ number_format($total) }}
                                </h5></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" align="center"><h4>Empty</h4></td>
                            </tr>
                            @endif
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>


                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="{{ route('product.all') }}">Continue Shopping</a>
                                        @if(count($mybag)>0)
                                        <button class="btn btn-sm primary-btn">Proceed to checkout</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

<br />
<br />
<br />
<br />
@endsection
