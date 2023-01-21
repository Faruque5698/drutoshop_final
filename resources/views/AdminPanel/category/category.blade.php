@extends('AdminPanel.Master')

@section('title')
    Category
@endsection

@php($categories = \App\Models\Category::all())

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Category List</strong></h1>
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}
                                <a href="{{route('add_category')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Title</th>
                                        <th>Category summary</th>
                                        <th>Category Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)

                                    @foreach($categories as $category)
                                        <tr>
                                            <input type="hidden" class="category-id" value="{{ $category->id }}">
                                            <td>{{$i++}}</td>
                                            <td>{{$category->title}}</td>
                                            <td>{{$category->summary}}</td>


                                            <td><img src="@if(isset($category->photo)){{asset($category->photo)}} @else {{asset('assets/images/noimage.jpeg')}} @endif" alt="{{$category->title}}" width="100px" height="100px"></td>
                                            <td>{{$category->status == 'active' ? 'Published':'Unpublished'}}</td>
                                            <td>

                                                @if($category->status == 'active')
                                                    <a href="{{route('category_unpublished',['id'=>$category->id])}}" class="btn btn-sm btn-info"
                                                    ><i class="fa fa-arrow-circle-up"></i></a>
                                                @else
                                                    <a href="{{route('category_published',['id'=>$category->id])}}" class="btn btn-sm btn-warning"
                                                    ><i class="fa fa-arrow-circle-down"></i></a>
                                                @endif

                                                <a href="{{route('category_edit',['id'=>$category->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                <a href="" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#modal-danger" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>


                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Title</th>
                                        <th>Category summary</th>
                                        <th>Category Image</th>

                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->


        <!-- /.modal -->
    </div>
@endsection



@section('js')

<script>

$(document).ready(function(){



    $('.delete').click(function(e){
        e.preventDefault();
        var delete_id = $(this).closest('tr').find('.category-id').val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {

                var data = {
                    "_token" : $('input[name="csrf-token"]').val(),
                    "id"     : delete_id,
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                $.ajax({
                    type    : 'DELETE',
                    url     : '/admin/category-delete/'+delete_id,
                    data    : data,
                    success : function(response){
                        Swal.fire(
                            response.success,
                            'success'
                        ).then((result) => {
                            location.reload();
                        })
                    }
                })

            }
          })

    })
})


</script>


@endsection

