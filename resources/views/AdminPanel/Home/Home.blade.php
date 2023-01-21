@extends('AdminPanel.Master')

@section('title')
    Home
@endsection

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><strong>Home</strong></h1>
                </div>

                @if(Session::get('message'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container " >

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title ">Home</h3>
{{--                            <a href="" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>--}}
                        </div>
                        <!-- /.card-header -->


                        <div class="card-body">
                            <form action="{{route('update.homes')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12">
                                        <input type="text" class="form-control @error('title1') is-invalid @enderror" value="{{$home->title_1}}" name="title1"  placeholder="Enter Title 1">
                                    </div>
                                    @error('title1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-12">
                                        <input type="text" class="form-control @error('title2') is-invalid @enderror" value="{{$home->title_2}}" name="title2"  placeholder="Enter Title 2">
                                    </div>
                                    @error('title2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>

                                <div class="form-row">
                                    <div class="col-12">
                                        <textarea id="editor" rows="4"cols="6" class="form-control @error('description') is-invalid @enderror"  name="description"  placeholder="Home Description">{{$home->description}}</textarea>
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>

                                <div class="form-row">
                                    <input type="file" name="image" id="" class="@error('image') is-invalid @enderror" placeholder="" onchange="previewFile(this);">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <img src="{{asset($home->image)}}" alt="" class="p-2"id="previewImg" height="200px" width="200px">
                                <hr>
                                <div class="form-row">
                                    <div class="col-12">
                                        <input type="text" class="form-control @error('footer') is-invalid @enderror" name="footer" value="{{$home->footer}}"  placeholder="Enter Home Footer">
                                    </div>
                                    @error('footer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>

{{--                                <div class="form-row">--}}

{{--                                    <select class="form-control @error('status') is-invalid @enderror" id="" name="status">--}}
{{--                                        <option selected>Publication Status</option>--}}
{{--                                        <option value="active">Active</option>--}}
{{--                                        <option value="inactive">Inactive</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                @error('status')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                                <hr>--}}
{{--                                <hr>--}}
                                <div class="col-2">
                                    <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Update Home">
                                </div>
                            </form>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
