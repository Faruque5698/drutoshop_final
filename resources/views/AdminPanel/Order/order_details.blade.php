@extends('AdminPanel.Master')

@section('title')
    Order List
@endsection



@section('content')

  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Order List</strong></h1>
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
                                <h3 class="card-title">Order Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <tr>
                                        <th>Customer Name :</th>
                                        <td>{{ $order_details->order_to_user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>City :</th>
                                        <td>{{ $order_details->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{ $order_details->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Cell Number :</th>
                                        <td>{{ $order_details->phone_no }}</td>
                                    </tr>

                                    <tr>
                                        <th> Cell Number :</th>
                                        <td>{{ $order_details->order_to_user->phone_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td>{{ $order_details->order_to_user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Order No :</th>
                                        <td>#{{ $order_details->order_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Item :</th>
                                        <td>#{{ $order_details->order_to_product->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Price :</th>
                                        <td> @php
                                            $total_price = 0;

                                        @endphp

                                            @foreach($order_details->order_to_product as $product_price)
                                               <?php $total_price = $total_price + $product_price->total_price ?>
                                            @endforeach
                                            {{ $total_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Type :</th>
                                        <td>{{ $order_details->payment_type  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Status :</th>
                                        <td>{{ $order_details->isPaid == 1 ? "Paid" : "Unpaid" }}</td>
                                    </tr>
                                </table>

                                <div class="row mt-3">
                                    @foreach ($order_details->order_to_product as $list)
                                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                                        <div class="card">
                                          <img class="card-img" src="{{ asset($list->products->image) }}" width="100%" height="250px" alt="Vans">
                                          <div class="card-img-overlay d-flex justify-content-end">

                                          </div>
                                          <div class="card-body text-center">
                                            <h3 class="text-center align-items-center fs-3">{{ $list->products->product_name }}</h3>
                                            <div class="options d-flex justify-content-between">
                                                <h5>Color: {{ $list->color_code }}</h5>
                                               <h5>Size: {{ $list->size }}</h5>
                                             </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                              <div class="price text-success"><h5 class="mt-4">$125</h5></div>
                                              <div class="price text-success"><h5 class="mt-4">Quantity: {{ $list->quantity }}</h5></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
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
