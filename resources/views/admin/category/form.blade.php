@extends('layouts.admin')

@section('content')
                        
                        <h2 class="title-1 m-b-25">New Category</h2>
                        <div class="row">
                            <div class="col-md-6 bg-white" style="padding-top: 20px; padding-bottom: 20px;">
                                <form action="{{ route('admin.category.insert') }}" method="post">
                                    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="nama" class=" form-control-label">Name</label>
                                        <input type="text" id="nama" name="nama" placeholder="Enter new category . . ." class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Finish</button>
                                    </div>

                                </form>
                            </div>
                        </div>
@endsection
