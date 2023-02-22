@extends('AdminPanel.Master')

@section('title')
    Flash Deal Product Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Edit Flash Deal</strong></h1>
                    </div>
                    @if(Session::get('message'))

                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Successfully</h5>
                            {{Session::get('message')}}
                        </div>
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Flash Deal Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('product.flash.deal.update') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <label>Product Name</label>
                            <input type="hidden" name="id" value="{{ $edit->id }}">
                            <input type="hidden" name="product_id" value="{{ $edit->product_id }}">
                            <input type="text" class="form-control" disabled value="{{ $edit->product_id }}">
                        </div>
                        <hr>
                        <div class="form-row">
                            <label>Flash Deal Type</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="flash_deal">
                                <option selected>Flash Deal (%)</option>
                                <option {{ $edit->flash_deal == "20" ? "selected" : " " }} value="20">20%</option>
                                <option {{ $edit->flash_deal == "25" ? "selected" : " " }} value="25">25%</option>
                                <option {{ $edit->flash_deal == "30" ? "selected" : " " }} value="30">30%</option>
                                <option {{ $edit->flash_deal == "35" ? "selected" : " " }} value="35">35%</option>
                                <option {{ $edit->flash_deal == "40" ? "selected" : " " }} value="40">40%</option>
                                <option {{ $edit->flash_deal == "45" ? "selected" : " " }} value="45">45%</option>
                                <option {{ $edit->flash_deal == "50" ? "selected" : " " }} value="50">50%</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-row">
                            <label>Stating Date</label>
                            <input type="datetime-local" class="form-control" value="{{ $edit->starting_date }}" name="starting_date">
                        </div>
                        <hr>

                        <div class="form-row">
                            <label>Ending Date</label>
                            <input type="datetime-local" class="form-control" value="{{ $edit->end_date }}" name="end_date">
                        </div>

                        <hr>
                        <div class="form-row">
                            <label>Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option selected>Status</option>
                                <option {{ $edit->status == 'active' ? "selected" : " " }} value="active">Active</option>
                                <option {{ $edit->status == 'inactive' ? "selected" : " " }} value="inactive">Inactive</option>
                            </select>
                        </div>
                        @error('status')
                        <div class="alert alert-danger"></div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" id="btn" value="Update Flash Deal">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
@endsection

@section('js')


@endsection
