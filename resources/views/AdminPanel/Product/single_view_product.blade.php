@extends('AdminPanel.Master')

@section('title')
    Product Single View
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Product Single View</strong></h1>
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
                                <h3 class="card-title">Product View</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}
                                <a href="{{route('admin.product')}}" class="btn btn-primary float-right"><i class="fa fa-eye"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               <table class="table table-bordered">
                                   <tr>
                                       <th>Product Name</th>
                                       <td>{{ $single_product->product_name }}</td>
                                   </tr>
                                   <tr>
                                       <th>Brand Name</th>
                                       <td>{{$single_product->productToBrand->brand_title}}</td>
                                   </tr>
                                   <tr>
                                       <th>Category Name</th>
                                       <td>{{$single_product->productToCategory->title}}</td>
                                   </tr>
                                   <tr>
                                       <th>Subcategory Name</th>
                                       <td>{{$single_product->productToSubcategory->title}}</td>
                                   </tr>
                                   <tr>
                                       <th>Sizw wish Qty</th>
                                        <td>

                                            @foreach($single_product->size_color_qty_product as $details)

                                            <div class="d-flex">
                                                 <div>{{ $details->size_name }}</div>-<div>{{ $details->size_color_qty }}</div><br>
                                            </div>

                                          @endforeach
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>Price</th>
                                       <td>Tk {{  number_format($single_product->price)  }}</td>
                                   </tr>
                                   <tr>
                                       <th>Discount Price</th>
                                       <td>Tk {{ number_format($single_product->discount_price) }}</td>
                                   </tr>
                                   <tr>
                                       <th>Discount Type</th>
                                       <td>{{ $single_product->credit }}</td>
                                   </tr>
                                   <tr>
                                       <th>Total Price</th>
                                       <td>{{ number_format($single_product->total_price) }}</td>
                                   </tr>
                                   <tr>
                                       <th>Qunatity</th>
                                       <td>{{ number_format($single_product->quantity) }}</td>
                                   </tr>
                                   <tr>
                                       <th>Total Sale</th>
                                       <td>{{ number_format($single_product->product_stock->sale_qty) }}</td>
                                   </tr>
                                   <tr>
                                       <th>Current Qunatity</th>
                                       <td>{{ $single_product->quantity - ( $single_product->quantity - $single_product->product_stock->last_qty) }}</td>
                                   </tr>
                                   <tr>
                                       <th>Product Image</th>
                                       <td><img src="{{asset($single_product->image)}}" alt="{{$single_product->product_name}}" width="150px" height="150px"></td>
                                   </tr>



                                   <tr>
                                       <th>Product Status</th>
                                       <td>{{$single_product->status == 'active' ? 'Active':'Inactive'}}</td>
                                   </tr>
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
