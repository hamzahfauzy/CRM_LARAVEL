@extends('layouts.auth')

@section('content')
    <br />
    <br />
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        <li class="main-nav-list">
                            <a href="{{ route('product.all') }}"
                            @if($selected == 'all')
                            style="color:#aaa;font-weight:800"
                            @endif

                            >ALL CATEGORY</a>
                        </li>
                        @foreach($category as $c)
                        <li class="main-nav-list">
                            <a href="{{ route('product.category', $c->id) }}" 
                            @if($selected == $c->id)
                            style="color:#aaa;font-weight:800"
                            @endif
                            >{{ $c->nama }}<span class="number">{{ count($c->product) }}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list" style="margin-top: -30px">
                    <div class="row">
                    @foreach($products as $ps)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ url('images/'.$ps->image->file_url) }}" alt="">
                            <div class="product-details">
                            <form action="{{ route('customer.bag.add', $ps->id) }}" method="post">
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
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
<br />
<br />
<br />
<br />
@endsection
