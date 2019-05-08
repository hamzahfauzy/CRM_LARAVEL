@extends('layouts.admin')

@section('content')
                        
                        <h2 class="title-1 m-b-25">Product</h2>
                        <div class="row" style="min-height: 450px;">
                            <div class="col-md-12 bg-white" style="padding-top: 20px; padding-bottom: 20px;">
                                <button onclick="location.href='{{ route('admin.product.add') }}'" class="btn btn-primary" style="margin:12px 0;">CREATE</button>
                                @if(Session::has('msg'))
                                        <div class="sufee-alert alert with-close alert-{{ \Illuminate\Support\Facades\Session::get('status') }} alert-dismissible fade show">
                                {{ \Illuminate\Support\Facades\Session::get('message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endif                                
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAME</th>
                                            <th class="text-right">PRICE</th>
                                            <th class="text-right">STOK</th>
                                            <th class="text-right">UPDATE AT</th>
                                            <th class="text-right">ACTION</th>
                                        </tr>
                                    </thead>
                                    @foreach($product as $p)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $p->nama }}<br />
                                                <small>{{ $p->category->nama }}</small>
                                                <p>
                                                @foreach($p->images as $img)
                                                    <a href="{{ '/images/'.$img->file_url }}" target="_blank"><img src="{{ '/images/'.$img->file_url }}" style="width:40px; height: 40px; border:1px solid#444;"></a>
                                                @endforeach
                                                    <button onclick="location.href='{{ route('admin.product.upload',$p->id) }}'" title="Upload Images" class="btn btn-sm btn-secondary"><em class="fa fa-upload"></em></button>
                                                </p>
                                            </td>
                                            <td class="text-right">{{ $p->harga }}</td>
                                            <td class="text-right">{{ $p->stok }}</td>
                                            <td class="text-right">{{ $p->updated_at }}</td>
                                            <td class="text-right">
                            
                                            <form method="POST" action="{{ route('admin.product.delete', [$p->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('admin.product.edit',$p->id) }}" class="btn btn-sm btn-warning">UPDATE</a>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to remove?')">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
@endsection
