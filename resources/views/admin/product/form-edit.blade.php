@extends('layouts.admin')

@section('content')
                        
                        <h2 class="title-1 m-b-25">Edit Product</h2>
                        <div class="row">
                            <div class="col-md-6 bg-white" style="padding-top: 20px; padding-bottom: 20px;">
                                <form action="{{ route('admin.product.update', $product->id) }}" method="post">
                                    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Name</label>
                                        <input type="text" id="nama" name="nama" placeholder="Enter new Product . . ." class="form-control" value="{{ $product->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Rupiah's Price</label>
                                        <input type="text" id="harga" name="harga" placeholder="Enter Price" class="form-control" value="{{ $product->harga }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok" class="form-control-label">STOK</label>
                                        <input type="number" min="1" id="stok" name="stok" placeholder="Number of STOK" class="form-control" value="{{ $product->stok }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-control-label">STOK</label>
                                        <select name="category" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach($category as $c)
                                            <option value="{{ $c->id }}" 
                                                @if($product->category_id==$c->id)
                                                    {{ 'selected' }}
                                                @endif
                                            >{{ $c->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">Finish</button>
                                    </div>

                                </form>
                            </div>
                        </div>
@endsection
