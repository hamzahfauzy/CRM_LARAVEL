@extends('layouts.admin')

@section('content')
                        
                        <h2 class="title-1 m-b-25">Category</h2>
                        <div class="row" style="min-height: 450px;">
                            <div class="col-md-12 bg-white" style="padding-top: 20px; padding-bottom: 20px;">
                                <button onclick="location.href='{{ route('admin.category.add') }}'" class="btn btn-primary" style="margin:12px 0;">CREATE</button>
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
                                            <th class="text-right">CREATED AT</th>
                                            <th class="text-right">UPDATED AT</th>
                                            <th class="text-right">ACTION</th>
                                        </tr>
                                    </thead>
                                    @foreach($category as $c)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $c->nama }}</td>
                                            <td class="text-right">{{ $c->created_at }}</td>
                                            <td class="text-right">{{ $c->updated_at }}</td>
                                            <td class="text-right">
                            
                                            <form method="POST" action="{{ route('admin.category.delete', [$c->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('admin.category.edit',$c->id) }}" class="btn btn-sm btn-warning">UPDATE</a>
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
