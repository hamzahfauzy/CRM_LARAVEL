@extends('layouts.auth')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="col-md-6 cart_inner">
                <div class="table-responsive">
                        <h2 class="title-1 m-b-25">Payment Verify For {{ strtoupper(substr(md5($transaction->id),1,12)) }}</h2>
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
                                <form action="{{ route('customer.transaction.doverify', $transaction->id) }}" method="post" enctype="multipart/form-data">
                                    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label for="description" class="form-control-label">Description</label>
                                        <textarea id="description" name="description" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="file" id="filename" name="filename">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Finish</button>
                                    </div>

                                </form>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

<br />
<br />
<br />

@endsection
