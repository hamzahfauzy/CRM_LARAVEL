@extends('layouts.admin')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area bg-white">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <h2><em class="ti-bag"></em> Payments</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $TOTAL = 0;
                            @endphp
                            @foreach($transaction as $tr)
                            <tr>
                                <td style="vertical-align: top"><h3>{{ ++$i }}</h3></td>
                                <td>
                                    <h3>{{ $tr->user->nama }} - {{ strtoupper(substr(md5($tr->id),1,12)) }}</h3>
                                    e-mail : {{ $tr->user->email }}<br />
                                    phone : {{ $tr->user->telepon }}
                                    <table class="tabel table-borderless">
                                        @php
                                            $j=0;
                                        @endphp
                                        @foreach($tr->items as $item)
                                        <tr>
                                            <td>{{ ++$j }}</td>
                                            <td><img src="{{ url('images/'.$item->product->image->file_url) }}" width="50" height="50"></td>
                                            <td>
                                                <h4>
                                                    {{ $item->product->nama }}<br />
                                                    <small>
                                                        <a href="{{ route('product.category',$item->product->category->id) }}">{{ $item->product->category->nama }}</a>
                                                    </small>
                                                </h4>
                                            </td>
                                            <td>Price : Rp. {{ number_format($item->product->harga) }}</td>
                                            <td>Quantity : {{ $item->jumlah }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <h4>Rp. {{number_format($tr->total)}}</h4>
                                </td>
                            </tr>
                            @php
                                $TOTAL += $tr->total; 
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="2">TOTAL : </td>
                                <td><h4>Rp. {{number_format($TOTAL)}}</h4></td>
                            </tr>
                        </tbody>
                    </table>
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
