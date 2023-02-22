@php
    $prefix =Request::route()->getPrefix();
    $route =Route::current()->getname();
@endphp


<aside class="main-sidebar sidebar-light-lightblue text-dark elevation-4" >


    <!-- Sidebar -->
    <div class="sidebar">

        <a href="" class="brand-link">
            <img src="{{ asset('Admin/image/genarel/632e9190ec088.png') }}" width="150PX" height="30PX;" class="" alt="User Image">

        </a>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                <li class="nav-header">Sections</li>


                <li class="nav-item

                    {{($route == 'admin.order')?'menu-open': ''}}
                    {{($route == 'cancel.order-list')?'menu-open': ''}}
                    {{($route == 'confirm.order-list')?'menu-open': ''}}
                    {{($route == 'success.order-list')?'menu-open': ''}}
                    {{($route == 'panding.order-list')?'menu-open': ''}}
                    {{($route == 'order.approve')?'menu-open': ''}}
                    {{($route == 'order.success')?'menu-open': ''}}
                    {{($route == 'order.cancel')?'menu-open': ''}}
                ">
                    <a href="#" class="nav-link
                    {{($route == 'admin.order')?'active': ''}}
                    {{($route == 'cancel.order-list')?'active': ''}}
                    {{($route == 'confirm.order-list')?'active': ''}}
                    {{($route == 'success.order-list')?'active': ''}}
                    {{($route == 'panding.order-list')?'active': ''}}
                    {{($route == 'order.approve')?'active': ''}}
                    {{($route == 'order.success')?'active': ''}}
                    {{($route == 'order.cancel')?'active': ''}}
                    ">
                      <i class="nav-icon fa fa-shopping-cart text-warning"></i>
                      <p class="text-{{ (request()->is('admin/order*')) ? 'warning' : '' }}">
                        Order
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.order') }}" class="nav-link pl-3 {{($route == 'admin.order')?'active': ''}}">
                            <i class="nav-icon fas fa-caret-right"></i>
                            <p class="text-{{ (request()->is('admin/order/list')) ? 'warning' : '' }}">Order List</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('panding.order-list') }}" class="nav-link pl-3 {{($route == 'panding.order-list')?'active': ''}}">
                            <i class="nav-icon fas fa-caret-right"></i>
                            <p class="text-{{ (request()->is('admin/order/pending-order-list')) ? 'warning' : '' }}">Pending Order List</p>
                        </a>
                        <a href="{{ route('confirm.order-list') }}" class="nav-link pl-3 {{($route == 'confirm.order-list')?'active': ''}}">
                            <i class="nav-icon fas fa-caret-right"></i>
                            <p class="text-{{ (request()->is('admin/order/confirm-order-list')) ? 'warning' : '' }}">Confiram Order List</p>
                        </a>

                        <a href="{{ route('success.order-list') }}" class="nav-link pl-3 {{($route == 'success.order-list')?'active': ''}}">
                          <i class="nav-icon fas fa-caret-right"></i>
                          <p class="text-{{ (request()->is('admin/order/success-order-list')) ? 'warning' : '' }}">Success Order List</p>
                        </a>
                        <a href="{{ route('cancel.order-list') }}" class="nav-link pl-3 {{($route == 'cancel.order-list')?'active': ''}}">
                          <i class="nav-icon fas fa-caret-right"></i>
                          <p class="text-{{ (request()->is('admin/order/cancel-order-list')) ? 'warning' : '' }}">Cancel Order List</p>
                        </a>
                      </li>
                    </ul>
                </li>

                <li class="nav-item
                    {{($route == 'admin.category')?'menu-open': ''}}
                    {{($route == 'admin.subcategory')?'menu-open': ''}}
                    {{($route == 'admin.brand')?'menu-open': ''}}
                    {{($route == 'admin.color')?'menu-open': ''}}
                    {{($route == 'admin.size')?'menu-open': ''}}
                    {{($route == 'admin.product')?'menu-open': ''}}
                    {{($route == 'product.add')?'menu-open': ''}}
                    {{($route == 'product.single')?'menu-open': ''}}
                    {{($route == 'product.flash.deal.all')?'menu-open': ''}}
                    {{($route == 'product.flash.deal')?'menu-open': ''}}
                    {{($route == 'product.edit')?'menu-open': ''}}
                ">
                      <a href="#" class="nav-link
                      {{($route == 'admin.category')?'active': ''}}
                      {{($route == 'admin.subcategory')?'active': ''}}
                      {{($route == 'admin.brand')?'active': ''}}
                      {{($route == 'admin.color')?'active': ''}}
                      {{($route == 'admin.size')?'active': ''}}
                      {{($route == 'admin.product')?'active': ''}}
                      {{($route == 'product.add')?'active': ''}}
                      {{($route == 'product.single')?'active': ''}}
                      {{($route == 'product.flash.deal.all')?'active': ''}}
                      {{($route == 'product.flash.deal')?'active': ''}}
                      {{($route == 'product.edit')?'active': ''}}

                  ">
                  <i class="fas fa-folder nav-icon text-warning"></i>               <p>
                            Product
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right"></span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview ">

                        <li class="nav-item">
                            <a href="{{route('admin.category')}}" class="nav-link pl-3 {{($route == 'admin.category')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('admin/category*')) ? 'warning' : '' }}">category</p>
                            </a>
                        </li>
                        <li class="nav-itemnav-item">
                            <a href="{{route('admin.subcategory')}}" class="nav-link pl-3 {{($route == 'admin.subcategory')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('admin/subcategory*')) ? 'warning' : '' }}">Sub category</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('admin.brand') }}" class="nav-link pl-3  {{($route == 'admin.brand')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('admin/brand*')) ? 'warning' : '' }}">Brand</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.color') }}" class="nav-link pl-3 {{($route == 'admin.color')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('admin/color*')) ? 'warning' : '' }}">Color</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.size') }}" class="nav-link pl-3 {{($route == 'admin.size')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('admin/size*')) ? 'warning' : '' }}">Size</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.product') }}" class="nav-link pl-3 {{($route == 'admin.product')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('admin/product*')) ? 'warning' : '' }}">Product list</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('product.flash.deal.all') }}" class="nav-link pl-3 {{($route == 'product.flash.deal.all')?'active': ''}}">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p class="text-{{ (request()->is('product/flash-deal/all')) ? 'warning' : '' }}">Flash Deal</p>
                            </a>
                        </li>

                      </ul>
                  </li>



            <li class="nav-item
            {{($route == 'banner.index')?'menu-open': ''}}
            {{($route == 'admin.adsBanner.index')?'menu-open': ''}}
          ">
            <a href="#" class="nav-link
            {{($route == 'banner.index')?'active': ''}}
            {{($route == 'admin.adsBanner.index')?'active': ''}}
            ">
                <i class="nav-icon fas fa-map" style="color:orange"></i>
              <p>
              Banner
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('banner.index')}}" class="nav-link pl-3 {{($route == 'banner.index')?'active': ''}}">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.adsBanner.index')}}" class="nav-link pl-3 {{($route == 'admin.adsBanner.index')?'active': ''}}">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Ads</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item
          {{($route == 'admin.notification.index')?'menu-open': ''}}
        ">
          <a href="#" class="nav-link
          {{($route == 'admin.notification.index')?'active': ''}}
          ">
              <i class="fas fa-bell nav-icon" style="color:orange"></i>
            <p>
            Send Notification
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.notification.index') }}" class="nav-link pl-3 {{($route == 'admin.notification.index')?'active': ''}}">
                    <i class="fas fa-caret-right nav-icon"></i>
                    <p class="text-{{ (request()->is('admin/notification/index')) ? 'warning' : '' }}">All user Notification</p>
                </a>
            </li>
            {{-- <li class="nav-item">
              <a href="" class="nav-link pl-3">
                <i class="fas fa-caret-right nav-icon"></i>
                <p>Single Notification</p>
              </a>
            </li> --}}

          </ul>
        </li>



                <li class="nav-item
                {{($route == 'stock.index')?'menu-open': ''}}
                {{($route == 'stock.details.product')?'menu-open': ''}}
                ">
                    <a href="#" class="nav-link
                    {{($route == 'stock.index')?'active': ''}}
                    {{($route == 'stock.details.product')?'active': ''}}
                    ">
                      <i class="nav-icon fa fas fa-database text-warning"></i>
                      <p class="text-{{ (request()->is('admin/stock*')) ? 'warning' : '' }}">
                        Stock Management
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('stock.index') }}" class="nav-link pl-3 {{($route == 'stock.index')?'active': ''}}">
                            <i class="nav-icon fas fa-caret-right nav-icon"></i>
                            <p class="text-{{ (request()->is('admin/stock')) ? 'warning' : '' }}">Stock Products</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('stock.details.product') }}" class="nav-link pl-3 {{($route == 'stock.details.product')?'active': ''}}">
                          <i class="nav-icon fas fa-caret-right nav-icon"></i>
                          <p class="text-{{ (request()->is('admin/stock/details/product')) ? 'warning' : '' }}">Size & Color Stock</p>
                        </a>
                      </li>
                    </ul>
                </li>

                <li class="nav-item
                {{($route == 'setting.genarel')?'menu-open': ''}}
                {{($route == 'setting.email')?'menu-open': ''}}
                {{($route == 'setting.pusher')?'menu-open': ''}}
                {{($route == 'setting.payment.stripe')?'menu-open': ''}}
                {{($route == 'setting.payment.sslcommerz')?'menu-open': ''}}

                ">
                    <a href="#" class="nav-link
                    {{($route == 'setting.genarel')?'active': ''}}
                    {{($route == 'setting.email')?'active': ''}}
                    {{($route == 'setting.pusher')?'active': ''}}
                    {{($route == 'setting.payment.stripe')?'active': ''}}
                    {{($route == 'setting.payment.sslcommerz')?'active': ''}}
                    ">
                      <i class="nav-icon fa fas fa-cog text-warning"></i>
                      <p>
                      Settings
                      </p>
                      <i class="right fas fa-angle-left"></i>
                    </a>
                     <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('setting.genarel') }}" class="nav-link pl-3 {{($route == 'setting.genarel')?'active': ''}}">
                          <i class="fas fa-caret-right nav-icon"></i>
                          <p class="text-{{ (request()->is('admin/setting/genarel')) ? 'warning' : '' }}">Genarel Settings</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('setting.email') }}" class="nav-link pl-3 {{($route == 'setting.email')?'active': ''}}">
                          <i class="fas fa-caret-right nav-icon"></i>
                          <p class="text-{{ (request()->is('admin/setting/email')) ? 'warning' : '' }}">Email Settings</p>
                        </a>
                      </li>
                         <li class="nav-item">
                        <a href="{{ route('setting.pusher') }}" class="nav-link pl-3 {{($route == 'setting.pusher')?'active': ''}}">
                            <i class="fas fa-caret-right nav-icon"></i>
                            <p>Pusher Settings</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="{{ route('setting.payment.stripe') }}" class="nav-link pl-3 {{($route == 'setting.payment.stripe')?'active': ''}}">
                            <i class="fas fa-caret-right nav-icon"></i>
                            <p class="text-{{ (request()->is('admin/setting/payment/stripe')) ? 'warning' : '' }}">Stripe</p>
                        </a>
                      </li>
                       <li class="nav-item">
                        <a href="{{ route('setting.payment.sslcommerz') }}" class="nav-link pl-3 {{($route == 'setting.payment.sslcommerz')?'active': ''}}">
                             <i class="fas fa-caret-right nav-icon"></i>
                            <p class="text-{{ (request()->is('admin/setting/payment/sslcommerz')) ? 'warning' : '' }}">SSLCommerz</p>
                        </a>
                      </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
