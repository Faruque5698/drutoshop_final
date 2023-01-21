@extends('AdminPanel.Master')

@section('title')
    SSLcommerz Payment Setting
@endsection


@section('style')

  <style type="text/css">
     .carv-image img{
        position: relative;
     }

     .carv-icon i{
         position: absolute;
         top: 103px;
         right: 40px;
         width: 30px;
         height: 30px;
         border: 5px solid #fff;
         border-radius: 50%;
         text-align: center;
         font-size: 15px;
         background: black;
         color: #2b2f;
     }

     #upImage{
       display: none;
     }

  </style>

@endsection




@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-warning"><strong> SSLcommerz Payment Setting</strong></h1>
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
              <div class="card partials-card-border p-3">
                  <div class="row">
                      <div class="col-sm-12">
                        <form action="{{ route('gateway.payment.sslcommerz') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row mb-4">
                                <div class="col-sm-2">
                                   <div class="carv-image">
                                    <img src="{{ asset($ssl_page->images)  }}" width="120px" height="120px">
                                  </div>
                                  <div class="carv-icon">
                                    <label for="upImage"><i class="fas fa-upload"></i></label>
                                    <input type="file" id="upImage"  name="image">
                                    <input type="hidden" name="code" value="{{ $ssl_page->code }}">
                                  </div>
                                </div>
                                <div class="col-sm-10">
                                  <h3>{{ $ssl_page->name }}</h3>
                                  <p> {{ $ssl_page->description }}</p>
                                </div>
                              </div>
                              <div class="row mb-2">
                                <div class="col-sm-12">
                                  <h5>Global Setting for SSLcommerz</h5>
                                </div>
                              </div>
                              <form>
                                 <div class="row">
                                   <div class="col-sm-6">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <p class="mb-2">STORE ID</p>
                                       </div>
                                      <div class="col-sm-12">
                                         <input type="text" name="client_id" value="{{ $ssl_page->client_id }}" class="text-muted form-control mb-0">
                                      </div>
                                      </div>
                                   </div>
                                   <div class="col-sm-6">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <p class="mb-2">STORE PASSWORD</p>
                                       </div>
                                      <div class="col-sm-12">
                                         <input type="text" name="screet_key" value="{{ $ssl_page->screet_key }}" class="text-muted form-control mb-0">
                                      </div>
                                      </div>
                                   </div>
                                </div>
                                
                                <div class="row mt-4">
                                  <div class="col-sm-4 offset-sm-4">
                                    <input type="submit" value="Update Save" class="btn btn-warning w-50">
                                  </div>
                                </div>
                              </form>
                          </div>
                         </form> 
                    </div>  
                </div>                      
            </div>

        </section>
    </div>
@endsection
        

