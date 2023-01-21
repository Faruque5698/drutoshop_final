@extends('AdminPanel.Master')

@section('title')
    Update Subcategory
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Update Subcategory</strong></h1>
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
                    <h3 class="card-title">Update subcategory</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                     <form action="{{ route('subcategory.update') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $subcategory->title }}"  placeholder="Sub Category Title">
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <select class="form-control @error('category_id') is-invalid @enderror" id="" name="category_id">
                                <option selected>--Select Category--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == $category->id ? 'Selected' : ''}}>{{$category->title}}</option>
                                @endforeach

                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <textarea id="editor" class="form-control @error('description') is-invalid @enderror" name="summary" rows="5" cols="5"   placeholder="Sub Category Summary">{{ $subcategory->summary }}</textarea>
                            </div>
                            @error('summary')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>

                        <div class="form-row">
                            <input type="file" name="photo" id="sub_cat_image" class="@error('photo') is-invalid @enderror" placeholder="">
                        </div>
                        @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <img src="{{asset($subcategory->photo)}}" alt="" id="sub_cat_image_preview" width="100px" height="100px" class="mt-2">
                        <hr>

                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option value="active" {{$subcategory -> status == 'active' ? 'Selected' : ''}}>Active</option>
                                <option value="inactive" {{$subcategory -> status == 'inactive' ? 'Selected' : ''}}>Inactive</option>


                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Update Sub Category">
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
        sub_cat_image.onchange = evt => {
            const [file] = sub_cat_image.files
            if (file) {
                sub_cat_image_preview.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
