@extends('layouts.admin')

@section('content')
                        
                        <h2 class="title-1 m-b-25">Customer</h2>
                        <div class="row" style="min-height: 450px;">
                            <div class="col-md-12 bg-white" style="padding-top: 20px; padding-bottom: 20px;">
                                <table class="table table-border table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th class="text-right">GENDER</th>
                                            <th class="text-right">E-MAIL/NUMBER PHONE</th>
                                            <th class="text-right">ACTION</th>
                                        </tr>
                                    </thead>
                                    @foreach($customer as $c)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $c->nama }}
                                            </td>
                                            <td>{{ $c->alamat }}</td>
                                            <td class="text-right">{{ $c->jenis_kelamin }}</td>
                                            <td class="text-right">
                                                {{ $c->email }}<br />
                                                {{ $c->telepon }}
                                            </td>
                                            <td class="text-right">
                            
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
@endsection
