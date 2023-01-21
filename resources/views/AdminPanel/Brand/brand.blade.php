@extends('AdminPanel.Master')

@section('title')
    Brand
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Brand List</strong></h1>
                       </i></a>
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
                                <h3 class="card-title">Brand List</h3>
                                <a href="{{ route('add.brand') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Brand Name</th>
                                        <th>Brand Description</th>
                                        <th>Brand Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                     @foreach($brands as $brand)

                                       <tr>
                                        <input type="hidden" class="brand-id" value="{{ $brand->id }}">
                                         <td>{{ $loop->index +1 }}</td>
                                         <td>{{$brand->brand_title}}</td>
                                            <td>{{$brand->summary}}</td>


                                            <td><img src="@if(isset($brand->photo)) {{ asset($brand->photo) }} @else {{asset('assets/images/noimage.jpeg')}} @endif" alt="{{ $brand->brand_title }}" width="100px" height="100px"/></td>
                                            <td>{{$brand->status == 'active' ? 'Published':'Unpublished'}}</td>
                                            <td>

                                                @if($brand->status == 'active')
                                                    <a href="{{route('brand_unpublished',['id'=>$brand->id])}}" class="btn btn-sm btn-info"
                                                    ><i class="fa fa-arrow-circle-up"></i></a>
                                                @else
                                                    <a href="{{route('brand_published',['id'=>$brand->id])}}" class="btn btn-sm btn-warning"
                                                    ><i class="fa fa-arrow-circle-down"></i></a>
                                                @endif

                                                <a href="{{route('brnad.edit',['id'=>$brand->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                <a href="" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#modal-brnad" ><i class="fa fa-trash"></i></a>
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
        var delete_id = $(this).closest('tr').find('.brand-id').val();
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
                    url     : '/admin/brand-delete/'+delete_id,
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


