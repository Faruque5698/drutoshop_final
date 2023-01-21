@extends('AdminPanel.Master')

@section('title')
    Edit Size
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Edit Size</strong></h1>
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
                    <h3 class="card-title">Edit Size</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('size.update') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="hidden" name="id" value="{{ $size_edit->id }}">
                                <input type="text" class="form-control @error('size_name') is-invalid @enderror" name="size_name" value="{{ $size_edit->size_name }}">
                            </div>
                            @error('color_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                       
                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option value="active" {{$size_edit -> status == 'active' ? 'Selected' : ''}}>Active</option>
                                <option value="inactive" {{$size_edit -> status == 'inactive' ? 'Selected' : ''}}>Inactive</option>

                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Update Size">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
@endsection

@section('js')

    <script>
        brand_image.onchange = evt => {
            const [file] = brand_image.files
            if (file) {
                brand_image_preview.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
