@extends('AdminPanel.Master')

@section('title')
    Profile
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Profile</strong></h1>
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
            	<form action="{{ route('profile.update') }}" method="POST" class="mb-4" enctype="multipart/form-data">
            		@csrf
                    <div class="row">


	                    <div class="col-4">
	                        <div class="card p-2">
	                          <div class="card-body text-center">
					            <img src="@if(isset($profile->image)) {{ asset($profile->image) }} @endif" alt="avatar"
					              class="rounded-circle img-fluid" style="width: 150px;">

					               <input type="hidden" name="id" value="{{ $profile->id }}">
					             <input type="file" name="image" class="btn btn-info w-50 btn-sm">
					            <h5 class="my-3">{{ $profile->name }}</h5>
					            <p class="text-muted mb-1">{{ $profile->role == 1 ? "Drutoshop Admin" : " " }}</p>
					            <p class="text-muted mb-4">Drutoshop</p>
					            <div class="d-flex justify-content-center mb-2">
					    
					            </div>
					            
					      
					          </div>
	                        </div>
	                    </div>
	                    <div class="col-8">
	                    	<div class="card">
					          <div class="card-body">
					            <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0">Full Name</p>
					              </div>
					              <div class="col-sm-7">
					             <!--    <p class="text-muted mb-0">{{ $profile->name }}</p> -->
					                <input type="text" name="name" value="{{ $profile->name }}" class="text-muted mb-0">
					              </div>
					            </div>
					            <hr>
					   
					            <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0">Address Name</p>
					              </div>
					              <div class="col-sm-7">
					                 <input type="text" name="address_name" value="@if(isset($profile->user->address_name)) {{ $profile->user->address_name }} @endif" class="text-muted mb-0">
					              </div>
					            </div>
					             <hr>
					             <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0">Address</p>
					              </div>
					              <div class="col-sm-7">
					                 <input type="text" name="address" value="@if(isset($profile->user->address)) {{ $profile->user->address }} @endif" class="text-muted mb-0">
					              </div>
					            </div>
					             <hr>
					             <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0">Zip Code</p>
					              </div>
					              <div class="col-sm-7">
					                 <input type="text" name="zipcode" value="@if(isset($profile->user->zipcode)) {{ $profile->user->zipcode }} @endif" class="text-muted mb-0">
					              </div>
					            </div>
					             <hr>
					            <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0">City</p>
					              </div>
					              <div class="col-sm-7">
					                 <input type="text" name="city" value="@if(isset($profile->user->city)) {{ $profile->user->city }} @endif" class="text-muted mb-0">
					              </div>
					            </div>
					            <hr>
					             <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0 text-left">New Password</p>
					              </div>
					              <div class="col-sm-7">
					             <!--    <p class="text-muted mb-0">{{ $profile->name }}</p> -->
					                <input type="password" name="password"  class="text-muted mb-0" placeholder="12345678">
					              </div>
					            </div>
					            <hr>
					            <div class="row">
					              <div class="col-sm-5">
					                <p class="mb-0 text-left">Password Confirmation</p>
					              </div>
					              <div class="col-sm-7">
					             <!--    <p class="text-muted mb-0">example@example.com</p> -->
					                 <input type="password" name="password_confiramtion"  class="text-muted mb-0" placeholder="12345678">
					              </div>
					            </div>
					          </div>
					        </div>
					       
					      </div>
	                    </div>
	                  
                    </div>
                    <div class="row">
                    	<div class="col-4 offset-4">
                    		<input type="submit" value="Update" class="btn btn-warning m-auto w-25">
                    	</div>
                    </div>
                </form>  
            </div>

        </section>
        <!-- /.content -->


        <!-- /.modal -->



    </div>
@endsection