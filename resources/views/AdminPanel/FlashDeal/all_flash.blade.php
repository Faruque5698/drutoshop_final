@extends('AdminPanel.Master')

@section('title')
   Flash Deal Product
@endsection



@section('style')

    <style type="text/css">



    </style>

@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Flash Deal List</strong></h1>
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
                                <h3 class="card-title">Flase=h Deal List</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Title</th>
                                        <th>Flash Deal (100%)</th>
                                        <th>Flash Deal Price</th>
                                        <th>Ending Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)

                                    @foreach($flash_daels as $f_deal)
                                        <tr>
                                           {{-- <input type="hidden" value="{{ $product->id }}" class="product-id" /> --}}
                                           <td>{{$i++}}</td>
                                            <td>{{$f_deal->product->product_name}}</td>
                                            <td>{{$f_deal->flash_deal}}</td>
                                            <td>{{number_format($f_deal->flash_price)}}</td>
                                            <td>{{$f_deal->end_date->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{ route('product.status', ["id"=>$f_deal->id]) }}" class="btn btn-sm btn-{{$f_deal->status == 'active' ? 'success':'warning'}} mb-1"><i class="fa fa-{{$f_deal->status == 'active' ? 'arrow-up':'arrow-down'}}"></i></a>
                                                <a href="{{ route('product.edit', ["id"=>$f_deal->id]) }}" class="btn btn-sm btn-info mb-1"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('product.single', ["id"=>$f_deal->product_id]) }}" class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i></a>
                                                <a href="" class="btn btn-sm btn-danger mb-1 delete" data-toggle="modal" data-target="#modal-product" ><i class="fa fa-trash"></i></a>
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
        var delete_id = $(this).closest('tr').find('.product-id').val();
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
                    url     : '/admin/product-delete/'+delete_id,
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



