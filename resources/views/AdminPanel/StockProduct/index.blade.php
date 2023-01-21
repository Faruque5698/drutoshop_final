@extends('AdminPanel.Master')


@section('title')

Stock Product
@endsection


@section('content')

	  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Stock List</strong></h1>
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
                                <h3 class="card-title">Stock List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Name</th>
                                        <th>Total Stock</th>
                                        <th>Current Stock</th>
                                        <th>Total Selling</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                     @foreach($datas as $data)

                                       <tr>
	                                         <input type="hidden" value="" class="size-id"/>
	                                         <td>{{ $loop->index +1 }}</td>
	                                         <td>{{ $data->product_name }}</td>
	                                         <td>{{ $data->product_stock->total_qty }}</td>
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