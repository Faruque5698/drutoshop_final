@extends('AdminPanel.Master')

@section('title')
   Banner
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Banners List</strong></h1>
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
                                <h3 class="card-title">Banner List</h3>
                               <!--  {{--                            <p>total category : {{$total_category}}</p>--}} -->
                                <a href="{{route('banner.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Banner Image</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Text</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach($banners as $banner)
                                        <tr>
                                            <input type="hidden" class="banner-id" value="{{ $banner->id }}">
                                            <td>{{ $loop->index +1 }}</td>
                                            <td><img src="{{ asset($banner->photo) }}" alt="" width="100px" height="100px"></td>
                                            <td>{{ $banner->title }}</td>
                                            <td>{{ $banner->sub_title }}</td>
                                            <td>{{ $banner->text }}</td>
                                            <td>

                                                <a href="{{ route('banner.status', ['id'=>$banner->id]) }}" class="mb-2 btn btn-sm {{ $banner->status == 'active' ? 'btn-info' : 'btn-warning'  }}"
                                                ><i class="fa fa-{{ $banner->status == 'active' ? 'arrow-circle-up' : 'arrow-circle-down'  }}"></i></a>
                            
                                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-sm btn-success mb-2"><i class="fa fa-edit"></i></a>

                                                <a href="" class="btn btn-sm btn-danger delete mb-2" data-toggle="modal" data-target="#modal-danger" ><i class="fa fa-trash"></i></a>
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
        var delete_id = $(this).closest('tr').find('.banner-id').val();
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
                    url     : '/admin/banner/'+delete_id,
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

