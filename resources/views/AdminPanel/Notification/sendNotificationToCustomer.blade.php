@extends('AdminPanel.Master')

@section('title')
    Send Notification To Customer
@endsection



@section('style')


@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-warning"><strong>Send Notification</strong></h1>
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
                      <div class="col-12">
                              <form action="{{ route('admin.notification.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="row mb-3">
                                       <div class="col-8 offset-2">
                                          <div class="row mb-3">
                                            <div class="col-sm-3">
                                               <label for="favIcon" class="lable-custom">Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                               <input type="text" id="favIcon" name="title" class="text-muted form-control mb-0" placeholder="notification title">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <div class="col-sm-3">
                                               <label for="favIcon" class="lable-custom">Message</label>
                                            </div>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" name="body" placeholder="Write your message......"></textarea>
                                            </div>
                                          </div>
                                          <div class="row mt-4">
                                            <div class="col-sm-3">
                                                <label for="logo" class="lable-custom"></label>
                                              </div>
                                            <div class="col-sm-5">
                                              <input type="submit" value="Send Notification" class="btn btn-warning w-50">
                                            </div>
                                          </div>
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









