@extends('layouts.auth')

@section('content')
    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon3.png" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- start product Area -->
    <section class="section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>PRODUCT</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $ps)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ url('images/'.$ps->image->file_url) }}" alt="">
                            <div class="product-details">
                            <form id="form{{$ps->id}}" action="{{ route('customer.bag.add', $ps->id) }}" method="post">
                                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                                <input type = "hidden" name = "jumlah" value = "1">
                                <h6>{{ $ps->nama }}</h6>
                                <div class="price">
                                    <h6>Rp. {{ number_format($ps->harga) }}</h6>
                                    <h6 class="l-through">Rp. {{ number_format($ps->harga+20000) }}</h6>
                                </div>
                                <div class="prd-bottom">
                                    @if($ps->stok>0)
                                    <a onclick="$(this).closest('form').submit()" class="social-info" style="cursor: pointer;">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    @endif

                                    <a href="{{ route('product.view',$ps->id) }}" class="social-info">
                                        <span class="fa fa-search"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- END single product -->
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <!-- end product Area -->

@endsection
