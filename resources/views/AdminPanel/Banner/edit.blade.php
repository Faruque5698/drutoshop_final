
@extends('AdminPanel.Master')

@section('title')
    Edit Banner
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Edit Banner</strong></h1>
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
                    <h3 class="card-title">Edit Banner</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('banner.update', $edit->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-12">
                                 <input type="hidden" class="form-control" name="id" value="{{ $edit->id }}">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $edit->title }}">
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         <hr>
                          <div class="form-row">
                            <div class="col-12">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="sub_title"  value="{{ $edit->sub_title }}">
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <textarea id="editor" class="form-control @error('description') is-invalid @enderror" name="text" rows="5" cols="5"   placeholder="Text">{{ $edit->text }}</textarea>
                            </div>
                            @error('summary')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>

                        <div class="form-row">
                            <input type="file" name="photo" id="cat_image" class="@error('photo') is-invalid @enderror" placeholder="">
                        </div>
                        @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <img src="{{ asset($edit->photo) }}" alt="" id="cat_image_preview" width="100px" height="100px" class="mt-2">
                        <hr>

                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option {{ $edit->status == 'active' ? 'selected' : ' ' }} value="active">Active</option>
                                <option {{ $edit->status == 'inactive' ? 'selected' : ' ' }} value="inactive">Inactive</option>

                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror




                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Add Banner">
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
        cat_image.onchange = evt => {
            const [file] = cat_image.files
            if (file) {
                cat_image_preview.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection