@extends('AdminPanel.Master')

@section('title')
    Color
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Color List</strong></h1>
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
                                <h3 class="card-title">Color List</h3>
                                <a href="{{ route('add.color') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Color Box</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                     @foreach($datas as $data)

                                       <tr>
                                        <input type="hidden" class="color-id" value="{{ $data->id }}">
                                         <td>{{ $loop->index +1 }}</td>
                                         <td>{{ $data->color_name }}</td>
                                         <td>{{ $data->color_code }}</td>
                                         <td><div style="width: 50px; height:20px; background-color: {{ $data->color_code }};"></div></td>
                                         <td>{{ $data->status == "active" ? "Active" : "Inactive" }}</td>

                                         <td>   
                                                 <a href="{{ route('status.color', ["id"=>$data->id]) }}" class="btn btn-sm btn-{{ $data->status == "active" ? "info" : "warning" }}"><i class="fa fa-{{ $data->status == "active" ? "arrow-up" : "arrow-down" }}"></i></a>

                                                <a href="{{ route('color.edit', ["id"=>$data->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                <a href="" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#modal-color" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                       

                                     @endforeach
                                   

                                    </tbody>

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
        var delete_id = $(this).closest('tr').find('.color-id').val();
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
                    url     : '/admin/color-delete/'+delete_id,
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


