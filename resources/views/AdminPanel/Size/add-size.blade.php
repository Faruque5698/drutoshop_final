@extends('AdminPanel.Master')

@section('title')
    Add Size
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Add Size</strong></h1>
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
                    <h3 class="card-title">Add Size</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('add.size') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="text" class="form-control @error('size_name') is-invalid @enderror" name="size_name"  placeholder="Size Name">
                            </div>
                            @error('size_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>

                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Add Size">
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
