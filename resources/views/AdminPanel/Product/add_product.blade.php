@extends('AdminPanel.Master')
@section('title')
Add Product
@endsection
@section('style')
<style type="text/css">
    .show-color{
      display: none;
    }
    .show-size{
      display: none;
    }
    input[type="file"]{
        position: relative;
        width: 50%;
        background: red;
        display: none;
    }
    .lable-custom{
        position: relative;
        width: 100%;
        left: 0;
        top: 0;
        box-sizing: border-box;
        border: 1px solid rgb(224, 72, 118);
        border-radius: 20px;
        padding: 10px 10px;
        text-align: left;
        color: #000;
        font-size: 15px;
        font-weight: 300;
    }
    .lable-custom:hover{
        background-color: rgb(172, 70, 101);
        border-color: #ffff;
        color: #ffff;
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
                    <h1><strong>Add Product</strong></h1>
                </div>
                @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Successfully</h5>
                    {{Session::get('message')}}
                </div>
                @endif
            </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                    <a href="{{route('admin.product')}}" class="btn btn-primary float-right"><i class="fa fa-eye text-white"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="productForm" action="{{ route('product.add') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="productName"  placeholder="Product Name">
                            </div>
                            <span id="productNameError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select name="brand_id" id="brandId" class="form-control @error('brand_id') is-invalid @enderror">
                                    <option selected>Select Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <span id="brandError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select name="category_id" class="category-id form-control @error('category_id') is-invalid @enderror" id="catId">
                                    <option selected>Select Category</option>
                                    @foreach($categories as $category)
                                    <option  value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <span id="categoryError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>
                        <div class="form-row">
                            <select class="form-control" name="subcategory_id" id="subCatId">
                                <option value="">-----Select Sub Category------</option>
                            </select>

                            <span id="subCatError" class="pl-2" style="color: red;"></span>
                        </div>

                        <hr>
                        <div class="form-row">

                            <div class="col-6">
                                <input type="number" name="price" id="priceVal" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                            </div>


                            <div class="col-6">
                                <input type="number" name="discount_rate" class="form-control discount-price" id="discountPrice" placeholder="Discount Rate (1-100%)">
                                <span id="disCountPriceError" class="pl-2" style="color: red;"></span>
                            </div>

                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="col-12" id="disCount">
                                <input  type="number" name="discount_price" id="disResult"  class="form-control @error('price') is-invalid @enderror" placeholder="Total">
                            </div>
                            <span id="priDisError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>


                        <div class="form-row">
                            <div class="col-7">
                                <select  id="sizeId" class="select-size form-control mb-1" >
                                    <option value="0">Select Size</option>
                                    @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                    @endforeach
                                </select>
                                <span id="sizeError" class="pl-2" style="color: red;"></span>
                            </div>

                            <div class="col-3">
                                <input type="number" id="sizeColorQty" class="form-control"  placeholder="Quantity">
                            </div>
                            <div class="col-2 text-center">
                                <button type="button" id="addRow" class="ml-2 btn btn-primary w-100">Add</button>
                            </div>
                        </div>


                        <div id="myTable">

                        </div>

                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <textarea id="discription" class="form-control @error('discription') is-invalid @enderror" name="discription" placeholder="Product description here...."></textarea>
                            </div>
                            <span id="discriptionError" class="pl-2" style="color: red;"></span>
                        </div>

                        <hr>
                        <div class="form-row">
                            <div class="col-3">
                                <input type="file" id="mainImg" class="@error('image') is-invalid @enderror" name="image" onchange="checkFiles()" />
                                <label for="mainImg" class="lable-custom"><i class="fas fa-upload mr-2"></i>Upload Image (Compulsery)</label>
                                <div class="text-center prev">
                                    <img src="{{ asset('assets/images/noimage.jpeg') }}" id="mainPreview"/ width="100px" height="100px">
                                </div>
                            </div>
                            <div class="col-3">
                                <input type="file" id="optionImg1" class="@error('image') is-invalid @enderror" name="image1" onchange="checkImage();" />
                                <label for="optionImg1" class="lable-custom"><i class="fas fa-upload mr-2"></i>Upload Image (Optional)</label>
                                <div class="text-center prev">
                                    <img src="{{ asset('assets/images/noimage.jpeg') }}" id="option1Preview"/ width="100px" height="100px">
                                </div>

                            </div>
                            <div class="col-3">
                                <input type="file" id="optionImg2" class="@error('image') is-invalid @enderror" name="image2" onchange="checkImage();" />
                                <label for="optionImg2" class="lable-custom"><i class="fas fa-upload mr-2"></i>Upload Image (Optional)</label>
                                <div class="text-center prev">
                                    <img src="{{ asset('assets/images/noimage.jpeg') }}" id="option2Preview"/ width="100px" height="100px">
                                </div>
                            </div>
                            <div class="col-3">
                                <input type="file" id="optionImg3" class="@error('image') is-invalid @enderror" name="image3" onchange="checkImage();" />
                                <label for="optionImg3" class="lable-custom"><i class="fas fa-upload mr-2"></i>Upload Image (Optional)</label>
                                <div class="text-center prev">
                                    <img src="{{ asset('assets/images/noimage.jpeg') }}" id="option3Preview"/ width="100px" height="100px">
                                </div>
                            </div>
                            <span id="imgError" class="pl-2" style="color: red;"></span>
                        </div>

                        <hr>
                        <div class="form-row">
                            <select id="status" class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option value="0">Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <span id="statusError" class="pl-2" style="color: red;"></span>
                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary"  id="btn" value="Add Product">
                        </div>
                    </form>
                </div>
                <!-- card-body -->
            </div>
        </section>
    </div>
    @endsection
    @section('js')

    <script type="text/javascript">


        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            $.ajax({

                type   : 'GET',
                url: "{{ route('product.colorPerSize') }}",
                success: function(data){
                    $('#myTable').html(data);
                }
            });
        });




        $(document).on("click","#remove", function(){
          var temData =  $(this).val();

                var data = {
                    "_token" : $('input[name="csrf-token"]').val(),
                    "id"     : temData,
                }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type    : 'GET',
                url     : 'color-per-size/'+temData,
                data    : temData,
                success: function(data){
                    $('#myTable').html(data);
                }

            });
        });

        $(document).ready(function(){
            $('.variant').hide();
            $('#catId').change(function(){
                var catId = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            type   : 'POST',
            url: "{{ route('product.subcatid') }}",
            data   : {cat_id:catId},
            success: function(data){
                    $('#subCatId').html(data);

                }
            })
        });


        // auto genarate row

        $('#addRow').click(function(){

            var sizeId = $('#sizeId').val();
            var sizeText = $('#sizeId option:selected').text();
            var colorCode = $('#colorId').val();
            var colorText = $('#colorId option:selected').text();
            var sizeColorQty = $('#sizeColorQty').val();

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            $.ajax({
                type   : 'POST',
                url: "{{ route('product.store-size-color-qty') }}",
                data   : {
                    size_id:sizeId,
                    size_text:sizeText,
                    color_code:colorCode,
                    color_text:colorText,
                    size_color_qty:sizeColorQty,
                },
                success: function(data){
                         $('#myTable').html(data);
                         updateQunatity();

                         $('#sizeId option:first').prop('selected',true);
                         $('#colorId option:first').prop('selected',true);
                         $('#sizeColorQty').val(' ');

                }
            });

        });





        function updateQunatity(){
             $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            $.ajax({

                type   : 'GET',
                url: "{{ route('update.quantity') }}",
                success: function(data){
                        $("#updateQuantity").val(data);

                        // console.log(data);
                }
            });
        }




        $('#discountPrice').keyup(function(){

            var priceVal = $('#priceVal').val();
            var discountPrice = $('#discountPrice').val();
            var result = ((priceVal * (100 - discountPrice)) / 100);
            $('#disResult').val(result);


        });

        $('#priceVal').keyup(function(){

            var priceVal = $('#priceVal').val();
            var discountPrice = $('#discountPrice').val();
            var result = ((priceVal * (100 - discountPrice)) / 100);
            $('#disResult').val(result);


        });

        priceVal






        function checkCategory() {
        var categoryId = $('#catId').val();
            if (categoryId == '0') {
                $('#categoryError').text('Please select your Category');
                return false;
            } else {
                $('#categoryError').text(' ');
                return true;
            }
        };



        function checkSubCatId() {
            var subCatId = $('#subCatId').val();
            if (subCatId == '0') {
                $('#subCatError').text('Please select your Subcategory');
                return false;
            } else {
                $('#subCatError').text(' ');
                return true;
            }
        };








       // form validation

        $('#productForm').submit(function() {
            if (checkCategory() == true && checkSubCatId() == true &&  checkStatus() == true) {
            return true;
            } else {
            return false;
            }
        });
    });


    // main image preview
    mainImg.onchange = evt => {
        const [file] = mainImg.files
        if (file) {
        mainPreview.src = URL.createObjectURL(file)
        }
    }


    // optinal image 1



    optionImg1.onchange = evt => {
        const [file] = optionImg1.files
        if (file) {
        option1Preview.src = URL.createObjectURL(file)
        }
    }



     // optinal image 2
    optionImg2.onchange = evt => {
        const [file] = optionImg2.files
        if (file) {
        option2Preview.src = URL.createObjectURL(file)
        }
    }



     // optinal image 3
    optionImg3.onchange = evt => {
        const [file] = optionImg3.files
        if (file) {
        option3Preview.src = URL.createObjectURL(file)
        }
    }



        function checkFiles(){
            var userFileImg = document.getElementById('mainImg');
            var destOrignalFile = userFileImg.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if(!allowedExtensions.exec(destOrignalFile)){
                alert('Please you can upload file having extensions .jpeg/.jpg/.png/.gif only.');
                userFileImg.value = '';
                return false;
            }else{
                //Image displaying
            }
        }


    </script>

    @endsection
