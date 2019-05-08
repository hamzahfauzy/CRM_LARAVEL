@extends('layouts.admin')

@section('content')
                        
                        <h2 class="title-1 m-b-25">Upload Image</h2>
                        <div class="row">
                            <div class="col-md-6 bg-white" style="padding-top: 20px; padding-bottom: 20px;">
                                @if (count($errors) > 0)
                                  <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                  </div>
                                @endif
                                <form action="{{ route('admin.product.uploading', $id_product) }}" method="post" enctype="multipart/form-data">
                                    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="file" id="filename" name="filename">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Finish</button>
                                    </div>

                                </form>
                            </div>
                        </div>
@endsection
