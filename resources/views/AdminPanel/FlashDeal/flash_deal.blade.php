@extends('AdminPanel.Master')

@section('title')
    Flash Deal Product
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Add Flash Deal</strong></h1>
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
                    <h3 class="card-title">Add Flash Deal Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('product.flash.deal.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="text" class="form-control" disabled value="{{ $product->product_name }}">
                        </div>
                        <hr>
                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" name="flash_deal">
                                <option selected>Flash Deal (%)</option>
                                <option value="20">20%</option>
                                <option value="25">25%</option>
                                <option value="30">30%</option>
                                <option value="35">35%</option>
                                <option value="40">40%</option>
                                <option value="45">45%</option>
                                <option value="50">50%</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-row">
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <hr>
                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option selected>Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        @error('status')
                        <div class="alert alert-danger"></div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" id="btn" value="Add Flash Deal">
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
