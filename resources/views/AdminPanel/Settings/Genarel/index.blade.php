@extends('AdminPanel.Master')

@section('title')
    Genarel Settings
@endsection



@section('style')

   <style type="text/css">
     
       input[type="file"]{
          position: relative;
          background: red;
          display: none;
      }
      .lable-custom{
          position: relative;
          width: 50%;
          left: 0;
          top: 0;
          background-color: green;
          box-sizing: border-box;
          border: 1px solid purple;
          border-radius: 5px;
          padding: 7px 7px;
          text-align: center;
          color: #fff;
          font-size: 15px;
          font-weight: 300;
      }
      .lable-custom:hover{
          border-color: #ffff;
          color: yellow;
      }
      .prev{
          margin-top: 10px;
          box-sizing: border-box;
          box-shadow: 0px 0px 3px gray;
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
                        <h1 class="text-warning"><strong> Genarel Settings</strong></h1>
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
                              <form action="{{ route('setting.save.genarel') }}" method="POST" enctype="multipart/form-data">
                                  @csrf 
                                    <div class="row mb-3">
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Wesite Name</p>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="text" name="website_name" value="{{ isset($genarel->website_name) ?  $genarel->website_name : ' '}}" class="text-muted form-control mb-0" placeholder="Drutoshop">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                         <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Company Email</p>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="email" name="company_email" value="{{ isset($genarel->company_email) ?  $genarel->company_email : ' '}}" class="text-muted form-control mb-0" placeholder="info@drutoshop.com">
                                            </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Contact Number</p>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="text" name="contact_no" value="{{ isset($genarel->contact_no) ?  $genarel->contact_no : ' '}}" class="text-muted form-control mb-0" placeholder="+11 0548544571">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                         <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Fax Number</p>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="text" name="fax_no" value="{{ isset($genarel->fax_no) ?  $genarel->fax_no : ' '}}" class="text-muted form-control mb-0" placeholder="12345678">
                                            </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Footer Text</p>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="text" name="footer_text" value="{{ isset($genarel->footer_text) ?  $genarel->footer_text : ' '}}" class="text-muted form-control mb-0" placeholder="Drutoshop © Drutoshop 2022">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                         <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Address</p>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="text" name="address" value="{{ isset($genarel->address) ?  $genarel->address : ' '}}" class="text-muted form-control mb-0" placeholder="Dhaka1200">
                                            </div>
                                          </div>
                                       </div>
                                    </div>


                                     <div class="row mb-4">
                                       <div class="col-sm-3 offset-sm-2">
                                          <div class="row">
                                          <div class="text-center prev">
                                            <img src="{{ isset($genarel->fav_icon) ? asset($genarel->fav_icon) : asset('assets/images/noimage.jpeg')}}" id="favIconPreview" width="150px" height="150px">
                                          </div>
                                           
                                          </div>
                                       </div>
                                       <div class="col-sm-3 offset-sm-2">
                                         <div class="row">
                                            <div class="text-center prev">
                                                <img src="{{ isset($genarel->logo) ? asset($genarel->logo) : asset('assets/images/noimage.jpeg')}}" id="logoPreview" width="150px" height="150px">
                                            </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <div class="col-sm-3 offset-sm-2">
                                          <div class="row">
                                            <div class="col-sm-12">
                                               <label for="favIcon" class="lable-custom">Fav Icon</label>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="file" id="favIcon" name="fav_icon" class="text-muted form-control mb-0">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-3 offset-sm-2">
                                         <div class="row">
                                            <div class="col-sm-12">
                                              <label for="logo" class="lable-custom">Logo</label>
                                            </div>
                                            <div class="col-sm-12">
                                               <input type="file" id="logo" name="logo" class="text-muted form-control mb-0">
                                            </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row mt-4">
                                      <div class="col-sm-4 offset-sm-4">
                                        <input type="submit" value="Save Changes" class="btn btn-warning w-50">
                                      </div>
                                    </div>
           
                              </form>
                          </div>
                    </div>  
                </div>                      
            </div>

        </section>
    </div>
@endsection




@section('js')


<script type="text/javascript">
  
  logo.onchange = evt => {
        const [file] = logo.files
        if (file) {
           logoPreview.src = URL.createObjectURL(file)
        }
    }



     // optinal image 2
    favIcon.onchange = evt => {
        const [file] = favIcon.files
        if (file) {
           favIconPreview.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
        








