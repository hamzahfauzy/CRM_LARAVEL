@extends('layouts.auth')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <h2><em class="ti-bag"></em> Transactions</h2>
                    <form method="post" action="{{ route('customer.transaction.add') }}">
                    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction as $tr)
                            <tr>
                                <td style="vertical-align: top"><h3>{{ ++$i }}</h3></td>
                                <td>
                                    <h3>{{ strtoupper(substr(md5($tr->id),1,12)) }}</h3>
                                    <table class="tabel table-borderless">
                                        @php
                                            $j=0;
                                            $totalPrice = 0;
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
                                        @php
                                            $totalPrice += $item->sub_total;
                                        @endphp
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <h4>Rp. {{number_format($totalPrice)}}</h4>
                                </td>
                                <td>
                                    @if($tr->status==1 && !isset($tr->verify))
                                        <a href="{{ route('customer.transaction.verify', $tr->id) }}">Send Payment Verify</a><br />
                                    @else
                                        @if($tr->status==2)
                                        <span class="text-success">Success</span>
                                        @elseif($tr->status==1)
                                        <span class="text-warning">Pending</span>
                                        @else
                                        <span class="text-danger">Rejected</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
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
