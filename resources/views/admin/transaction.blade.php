@extends('layouts.admin')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area bg-white">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <h2><em class="ti-bag"></em> Transactions</h2>
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
                                    <h3>{{ $tr->user->nama }} - {{ strtoupper(substr(md5($tr->id),1,12)) }}</h3>
                                    e-mail : {{ $tr->user->email }}<br />
                                    phone : {{ $tr->user->telepon }}
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
                                    @if($tr->status==1 && isset($tr->verify))
                                        <button onclick="if(confirm('Are you sure accept it?')){ location.href='{{ url('admin/transaction/status/'.$tr->id.'/2') }}' }" class="btn btn-sm btn-success">Accept</button>
                                        <button onclick="if(confirm('Are you sure accept it?')){ location.href='{{ url('admin/transaction/status/'.$tr->id.'/0') }}' }" class="btn btn-sm btn-danger">Reject</button>
                                        <br />
                                        <a href="{{ url('/bukti/'.$tr->verify->file_url) }}" target="_blank">Payment Verify</a>
                                    @endif
                                    <br />
                                    @if($tr->status==2)
                                    <span class="text-success">Success</span>
                                    @elseif($tr->status==1)
                                    <span class="text-warning">Pending</span>
                                    @else
                                    <span class="text-danger">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
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
