@extends('AdminPanel.Master')

@section('title')
    Product
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
                        <h1><strong>Product List</strong></h1>
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
                                <h3 class="card-title">Product List</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}
                                <a href="{{route('product.add')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Title</th>
                                        <th>Price</th>
                                        <th>Seling Price</th>
                                        <th>Popular</th>
                                        <th>Exclusive</th>
                                        <th>Tranding Deals</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>




                                    @php($i=1)

                                    @foreach($products as $product)
                                        <tr class="text-center">
                                           <input type="hidden" value="{{ $product->id }}" class="product-id" />
                                           <td>{{$i++}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{number_format($product->price)}}</td>
                                            <td>{{number_format($product->discount_price)}}</td>
                                            <td>
                                                <a href="{{ route('product.populer', ["id"=>$product->id]) }}" class="btn btn-{{$product->feature_product == 1 ? 'primary':'warning'}} btn-sm">{{$product->feature_product == 1 ? 'On':'Off'}}</a>

                                            </td>
                                            <td>
                                                 <a href="{{ route('product.exclusive', ["id"=>$product->id]) }}" class="btn btn-{{$product->exclusive_product == 1 ? 'primary':'warning'}} btn-sm">{{$product->exclusive_product == 1 ? 'On':'Off'}}</a>
                                            </td>
                                            <td>
                                                @php($check_deal = \App\Models\FlashDeal::where('product_id',$product->id)->first())
                                                @if ($check_deal)
                                                  <a href="{{ route('product.flash.deal.edit', ["id"=>$check_deal->id]) }}" class="btn btn-sm btn-warning mb-1"><i class="fa fa-bolt"></i></a>
                                                @else
                                                <a href="{{ route('product.flash.deal', ["id"=>$product->id]) }}" class="btn btn-sm btn-dark mb-1"><i class="fa fa-bolt"></i></a>
                                                @endif
                                            </td>
                                            <td>{{$product->status == 'active' ? 'Published':'Unpublished'}}</td>
                                            <td>
                                                <a href="{{ route('product.status', ["id"=>$product->id]) }}" class="btn btn-sm btn-{{$product->status == 'active' ? 'success':'warning'}} mb-1"><i class="fa fa-{{$product->status == 'active' ? 'arrow-up':'arrow-down'}}"></i></a>
                                                <a href="{{ route('product.edit', ["id"=>$product->id]) }}" class="btn btn-sm btn-info mb-1"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('product.single', ["id"=>$product->id]) }}" class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i></a>


                                                <a href="" class="btn btn-sm btn-danger mb-1 delete" data-toggle="modal" data-target="#modal-product" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr>
                                       <th>Sl</th>
                                        <th>Product Title</th>
                                        <th>Price</th>
                                         <th>Quantity</th>
                                        <th>Feature</th>
                                        <th>Tranding</th>
                                        <th>Status</th>
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
                    url     : 'product-delete/'+delete_id,
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



