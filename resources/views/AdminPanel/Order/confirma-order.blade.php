@extends('AdminPanel.Master')

@section('title')
   Confiram Orders
@endsection



@section('content')

  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Confiram Orders</strong></h1>
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
                                <h3 class="card-title">Confiram Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Order Id</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Payment Type</th>
                                        <th>Order Status</th>
                                        <th>Details</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                      @foreach($orders as $order)

                                       <tr>
	                                         <td>{{ $loop->index +1 }}</td>
	                                         <td>{{ $order->order_id }}</td>
                                             <td>
                                                @foreach ($order->order_to_product as $product_name)
                                                    {{ $product_name->product->product_name }}
                                                @endforeach
                                            </td>
	                                         <td>{{ $order->total_price }}</td>
	                                         <td>{{ $order->payment_type == null ? "COD" : " " }}</td>
	                                        <!--  <td>{{ $order->status == 0? "Pending" : "Success"}}</td> -->
	                                         <td>
	                                         	@if($order->status == 0)
	                                         		<span>Pending</span>
	                                         	@elseif($order->status == 1)
	                                         		<span>Approve</span>
	                                         	@elseif($order->status == 2)
	                                         		<span>Success</span>

	                                         	@elseif($order->status == 3)
	                                         		<span>Cancel</span>
	                                         	@endif
	                                         </td>
	                                         <td>
	                                         	  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#orderInfo-{{ $order->id }}"><i class="fa fa-info"></i></button>
	                                         </td>
	                                         <td>
	                                             @if($order->status == 0)
										        <a href="{{ route('order.cancel', ['order_id'=>$order->id]) }}" class="btn btn-danger">Order Cancel</a>
										        <a href="{{ route('order.approve', ['order_id'=>$order->id]) }}" class="btn btn-warning">Confiram</a>
										        @endif
										       <!--  order.success -->
										        @if($order->status == 1)
										        <!--  <button type="button" class="btn btn-success">Success</button> -->
										       <!-- <a href="{{ route('order.cancel', ['order_id'=>$order->id]) }}" class="btn btn-danger">Order Cancel</a> -->
										        <a href="{{ route('order.success', ['order_id'=>$order->id]) }}" class="btn btn-success">Success</a>
										        @endif
										        <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
										        @if($order->status == 2)
										        {{-- <a href="" class="btn btn-info">View Details</a> --}}
										        @endif
	                                          </td>
                                        </tr>


										<!-- Modal Start -->
									 <!-- Modal Start -->
                                     <div class="modal fade" id="orderInfo-{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card p-2 bg-light">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card p-3">
                                                                <p><strong style="width:300px">Customer Name: </strong> {{ $order->order_to_user->name }}</p>
                                                                <p><strong style="width:500px">Email</strong>: {{ $order->order_to_user->email }}</p>
                                                                <p><strong style="width:300px">Address</strong>: {{ $order->address }}</p>
                                                                <p><strong style="width:300px">City</strong>: {{ $order->city }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        @foreach ($order->order_to_product as $product_list)
                                                        <div class="col-4">


                                                            <div class="card shadow">
                                                                <img src="{{ asset($product_list->product->image) }}" width="100%" height="200px">
                                                            </div>
                                                            <div class="customer-info">
                                                                {{-- <p><strong style="width:300px">Order ID</strong>: {{ $product_list->order_id }}</p> --}}
                                                                <p><strong style="width:300px">Product Name</strong>: {{ $product_list->product->product_name }}</p>
                                                                {{-- <p><strong style="width:300px">Order Status</strong>:
                                                                        @if($product_list->status == 0)
                                                                            <span>Pending</span>
                                                                        @elseif($product_list->status == 1)
                                                                            <span>Confirm</span>
                                                                        @elseif($product_list->status == 2)
                                                                            <span>Success</span>

                                                                        @elseif($product_list->status == 3)
                                                                            <span>Cancel</span>
                                                                        @endif
                                                                </p> --}}
                                                                {{-- <p><strong style="width:300px">Payment Type</strong>: {{ $product_list->payment_type == null ? "COD" : " "}}</p> --}}
                                                                <p><strong style="width:300px">Payment Status</strong>: {{ $order->isPaid == 0? "Pending" : "Success"}}</p>
                                                                <!-- //customer info -->

                                                            </div>

                                                            <div class="product-info">
                                                                <p><strong style="width:300px">SKU</strong>: {{ $product_list->product->sku }}</p>
                                                                <p><strong style="width:300px">Size</strong>: {{ $product_list->size }}</p>
                                                                <p><strong style="width:300px">Color</strong>: <span class="pills bg-{{ $product_list->color_code }}">{{ $product_list->color_code }}</span></p>
                                                                <p><strong style="width:300px">Quantity</strong>:  {{ $product_list->quantity }}</p>
                                                                <p><strong style="width:300px">Price</strong>:  {{ $product_list->total_price }} Tk.</p>
                                                            </div>




                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">

                                                @if($order->status == 0)
                                                <a href="{{ route('order.cancel', ['order_id'=>$order->id]) }}" class="btn btn-danger">Order Cancel</a>
                                                <a href="{{ route('order.approve', ['order_id'=>$order->id]) }}" class="btn btn-warning">Confiram</a>
                                                @endif
                                            <!--  order.success -->
                                                @if($order->status == 1)
                                                <!--  <button type="button" class="btn btn-success">Success</button> -->
                                            {{-- <!-- <a href="{{ route('order.cancel', ['order_id'=>$product]) }}" class="btn btn-danger">Order Cancel</a> --> --}}
                                                <a href="{{ route('order.success', ['order_id'=>$order->id]) }}" class="btn btn-success">Success</a>
                                                @endif
                                                <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                @if($order->status == 2)
                                                {{-- <a href="" class="btn btn-info">View Details</a> --}}
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                        </div>

										<!-- Modal End -->

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
