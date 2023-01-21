@extends('AdminPanel.Master')

@section('title')
    Sub Category
@endsection

{{-- @php($subcategories = \App\Models\Subcategory::all()) --}}

{{-- {{ $subcategories }} --}}

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Sub Category List</strong></h1>
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
                                <h3 class="card-title">Sub Category List</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}
                                <a href="{{route('add_subcategory')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Sub Category Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                       @foreach($subcategories as $subcategory)
                                        <tr>
                                            <input type="hidden" class="subcategory-id" value="{{ $subcategory->id }}">
                                            <td>{{$i++}}</td>
                                            <td>{{$subcategory->subcategoryTocategory->title}}</td>
                                            <td>{{$subcategory->title}}</td>


                                            <td><img src="@if(isset($subcategory->photo)) {{ asset($subcategory->photo) }} @else {{asset('assets/images/noimage.jpeg')}} @endif" alt="{{$subcategory->title}}" width="100px" height="100px"/></td>
                                            <td>{{$subcategory->status == 'active' ? 'Published':'Unpublished'}}</td>
                                            <td>

                                                @if($subcategory->status == 'active')
                                                    <a href="{{route('subcategory_unpublished',['id'=>$subcategory->id])}}" class="btn btn-sm btn-info"
                                                    ><i class="fa fa-arrow-circle-up"></i></a>
                                                @else
                                                    <a href="{{ route('sub-category.published', ['id'=>$subcategory->id]) }}" class="btn btn-sm btn-warning"
                                                    ><i class="fa fa-arrow-circle-down"></i></a>
                                                @endif
                                              

                                                <a href="{{ route('subcategory.edit', ['id'=>$subcategory->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                <a href="" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#modal-subcat" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                   

                                      @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Image</th>
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
        var delete_id = $(this).closest('tr').find('.subcategory-id').val();
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
                    url     : '/admin/subcategory-delete/'+delete_id,
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


