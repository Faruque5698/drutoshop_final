@extends('AdminPanel.Master')


@section('title')

Stock Details Product
@endsection


@section('content')

	  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Stock Product Details List</strong></h1>
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
                                <h3 class="card-title">Stock Product Details List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Name</th>
                                        <th>Size&Color</th>
                                        <th>Total Quantity</th>
                                        <th>Last Qantity</th>
                                        <th>Total Sell</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                     @foreach($product as $data)

                                       <tr>
	                                         <input type="hidden" value="" class="size-id"/>
	                                         <td>{{ $loop->index +1 }}</td>
	                                         <td>{{ $data->product_name }}</td>
	                                         <td>
	                                         	@foreach($data->size_color_qty_product as $details)

                                                <div class="d-flex mb-2 text-center">
                                                  <div style="width:30px" class="mr-2">{{ $details->size_name }}</div><div style="width:50px; height: 20px; background-color: {{ $details->color_code }};"></div><div class="ml-2" style="width:30px">{{ $details->size_color_qty }}</div><br>
                                                </div>

                                                @endforeach
                                            </td>
	                                         <td>{{ $data->quantity }}</td>
                                             <td>{{ $data->product_stock->last_qty }}</td>
                                             <td>{{ $data->product_stock->sale_qty }}</td>
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


     



    </div>
@endsection