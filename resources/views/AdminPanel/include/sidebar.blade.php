<aside class="main-sidebar sidebar-light-lightblue text-dark elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">

        <a href="" class="brand-link">
            <img src="{{ asset('Admin/image/genarel/632e9190ec088.png') }}" width="150PX" height="30PX;" class="" alt="User Image">
            {{-- <span class="brand-text font-weight-light">DishNet</span> --}}
          </a>
        <!-- Sidebar user (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="brand-link">
                <img src="{{ asset('Admin/image/genarel/632e9190ec088.png') }}"  class=" alt="User Image">
                <h3 class="text-warning">DrutoSoft</h3>
            </div>
        </div> --}}



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
{{--                            <span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
 <!--                </li>
               <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            <i class="right fas fa-angle-left"></i>
                       </p>
                    </a>
                   <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                               <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                    </li>
 -->
                <li class="nav-header">Sections</li>
               {{--  <li class="nav-item">
                    <a href="{{route('admin.homes')}}" class="nav-link">
                        <i class="nav-icon fa fa-home text-danger"></i>
                        <p class="text">Home</p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-globe text-primary"></i>
                      <p class="text-{{ (request()->is('admin/order*')) ? 'warning' : '' }}">
                        Order
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.order') }}" class="nav-link pl-3">
                            <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                            <p class="text-{{ (request()->is('admin/order/list')) ? 'warning' : '' }}">Order List</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('panding.order-list') }}" class="nav-link pl-3">
                            <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                            <p class="text-{{ (request()->is('admin/order/pending-order-list')) ? 'warning' : '' }}">Pending Order List</p>
                        </a>
                        <a href="{{ route('confirm.order-list') }}" class="nav-link pl-3">
                            <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                            <p class="text-{{ (request()->is('admin/order/confirm-order-list')) ? 'warning' : '' }}">Confiram Order List</p>
                        </a>

                        <a href="{{ route('success.order-list') }}" class="nav-link pl-3">
                          <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                          <p class="text-{{ (request()->is('admin/order/success-order-list')) ? 'warning' : '' }}">Success Order List</p>
                        </a>
                        <a href="{{ route('cancel.order-list') }}" class="nav-link pl-3">
                          <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                          <p class="text-{{ (request()->is('admin/order/cancel-order-list')) ? 'warning' : '' }}">Cancel Order List</p>
                        </a>
                      </li>
                    </ul>
                </li>




                <li class="nav-item">
                    <a href="{{route('admin.adsBanner.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt text-primary"></i>
                        <p class="text-{{ (request()->is('admin/ads-banner/index*')) ? 'warning' : '' }}"> Ads Banner</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('banner.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt text-primary"></i>
                        <p class="text-{{ (request()->is('admin/banner*')) ? 'warning' : '' }}">Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt text-primary"></i>
                        <p class="text-{{ (request()->is('admin/category*')) ? 'warning' : '' }}">category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.subcategory')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt text-success"></i>
                        <p class="text-{{ (request()->is('admin/subcategory*')) ? 'warning' : '' }}">Sub category</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="{{ route('admin.brand') }}" class="nav-link">
                        <i class="nav-icon fa fa-star text-warning"></i>
                        <p class="text-{{ (request()->is('admin/brand*')) ? 'warning' : '' }}">Brand</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.color') }}" class="nav-link ">
                        <i class="nav-icon fa fa-globe text-primary"></i>
                        <p class="text-{{ (request()->is('admin/color*')) ? 'warning' : '' }}">Color</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.size') }}" class="nav-link">
                        <i class="nav-icon fa fa-th-large text-danger"></i>
                        <p class="text-{{ (request()->is('admin/size*')) ? 'warning' : '' }}">Size</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.product') }}" class="nav-link">
                        <i class="nav-icon fa fa-tasks text-success"></i>
                        <p class="text-{{ (request()->is('admin/product*')) ? 'warning' : '' }}">Product list</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product.flash.deal.all') }}" class="nav-link">
                        <i class="nav-icon fa fa-tasks text-success"></i>
                        <p class="text-{{ (request()->is('product/flash-deal/all')) ? 'warning' : '' }}">Flash Deal</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('admin.notification.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tasks text-success"></i>
                        <p class="text-{{ (request()->is('admin/notification/index')) ? 'warning' : '' }}">Notification</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fas fa-database"></i>
                      <p class="text-{{ (request()->is('admin/stock*')) ? 'warning' : '' }}">
                        Stock Management
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('stock.index') }}" class="nav-link pl-3">
                            <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                            <p class="text-{{ (request()->is('admin/stock')) ? 'warning' : '' }}">Stock Products</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('stock.details.product') }}" class="nav-link pl-3">
                          <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                          <p class="text-{{ (request()->is('admin/stock/details/product')) ? 'warning' : '' }}">Size & Color Stock</p>
                        </a>
                      </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fas fa-cog"></i>
                      <p>
                      Settings
                      </p>
                      <i class="right fas fa-angle-left"></i>
                    </a>
                     <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('setting.genarel') }}" class="nav-link pl-3">
                          <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                          <p class="text-{{ (request()->is('admin/setting/genarel')) ? 'warning' : '' }}">Genarel Settings</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('setting.email') }}" class="nav-link pl-3">
                          <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                          <p class="text-{{ (request()->is('admin/setting/email')) ? 'warning' : '' }}">Email Settings</p>
                        </a>
                      </li>
                         <li class="nav-item">
                        <a href="{{ route('setting.pusher') }}" class="nav-link pl-3">
                            <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                            <p>Pusher Settings</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link pl-3">
                            <i class="nav-icon fas fa-long-arrow-alt-right"></i>
                            <p class="text-{{ (request()->is('admin/banner')) ? 'warning' : '' }}">Payment Settings</p>
                             <i class="right fas fa-angle-left"></i>
                        </a>

                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('setting.payment.stripe') }}" class="nav-link pl-3">
                                <i class="fab fa-cc-stripe pr-2"></i>
                                <p class="text-{{ (request()->is('admin/setting/payment/stripe')) ? 'warning' : '' }}">Stripe</p>
                            </a>
                          </li>


{{--                          <li class="nav-item">--}}
{{--                            <a href="{{ route('setting.payment.paypal') }}" class="nav-link pl-5">--}}
{{--                                <i class="fab fa-cc-paypal pr-2"></i>--}}
{{--                                <p>Paypal</p>--}}
{{--                            </a>--}}
{{--                          </li>--}}

                           <li class="nav-item">
                            <a href="{{ route('setting.payment.sslcommerz') }}" class="nav-link pl-3">
                                 <i class="fab fa-expeditedssl pr-2"></i>
                                <p class="text-{{ (request()->is('admin/setting/payment/sslcommerz')) ? 'warning' : '' }}">SSLCommerz</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
