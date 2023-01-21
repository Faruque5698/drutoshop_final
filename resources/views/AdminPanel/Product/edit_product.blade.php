@extends('AdminPanel.Master')

@section('title')
    Update Product
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Edit Product</strong></h1>
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
                <div class="card-header justify-content-end">
                    <h3 class="card-title">Edit Product</h3>
                   <a href="{{route('admin.product')}}" class="btn btn-primary float-right"><i class="fa fa-eye"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('product.update') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="hidden" name="id" value="{{ $product_edit->id }}">
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product_edit->product_name }}"  placeholder="Product Name">
                            </div>
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select disabled name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                    <option selected>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option {{ $brand->id == $product_edit->brand_id ? 'selected': '' }} value="{{ $brand->id }}">{{ $brand->brand_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select disabled name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="catId">
                                    <option selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option {{ $category->id == $product_edit->category_id ? 'selected': '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <select disabled class="form-control" name="subcategory_id" id="subCatId">
                                 <option value="">-----Select Sub Category------</option>
                            </select>
                            @error('subcategory_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        {{-- <hr> --}}
                       {{--  <div class="form-row">
                            <div class="col-6">
                                <select name="size_id" class="form-control @error('size_id') is-invalid @enderror" >
                                    <option selected>Select Size</option>
                                    @foreach($sizes as $size)
                                        <option {{ $size->id == $product_edit->size_id ? 'selected': '' }} value="{{ $size->id }}">{{ $size->size_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('size_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-6">
                                 <select name="color_id" class="form-control @error('color_id') is-invalid @enderror" >
                                    <option selected>Select Color</option>
                                    @foreach($colors as $color)
                                        <option {{ $color->id == $product_edit->color_id ? 'selected': '' }} value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('color_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                       
                        <hr>
                         <div class="form-row">
                            <div class="col-12">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product_edit->quantity }}" placeholder="Type quantity">
                            </div>
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                         <div class="form-row">
                            <div class="col-12">
                                <input type="number" name="price" id="priceValEdit" value="{{ $product_edit->price }}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                        </div>
                        <hr>

                         <div class="form-row">
                             <div class="col-12">
                               <input type="number"  id="discountPriceEdit"  class="form-control" placeholder="Discount Price">                  
                            </div>
        
                        </div>
                        <hr>
                        <div class="form-row">
                             <div class="col-12">
                                <select class="form-control" name="discount_type" id="discountEdit">
                                    <option selected>Select Discount Type</option>
                                    <option {{$product_edit -> discount_type == 'credit' ? 'Selected' : ''}} value="credit">TK</option>
                                    <option {{$product_edit -> discount_type == 'parcentage' ? 'Selected' : ''}} value="parcentage">Parcentage</option>
                                </select>    
                            </div>
                           
                        </div>

                        <hr>

                         <div class="form-row">
                             <div class="col-12" id="disCount">
                               <input type="number" name="discount_price" value="{{ $product_edit->discount_price }}" id="disResultedit" class="form-control @error('price') is-invalid @enderror" placeholder="Total">                  
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>

                         <div class="form-row">
                            <div class="col-12">
                                <textarea class="form-control @error('discription') is-invalid @enderror" name="discription" placeholder="Product description here....">{{ $product_edit->discription }}</textarea> 
                            </div>
                            @error('discription')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <hr>

                        <div class="form-row">
                            <div class="col-12">
                                <input type="file" class=" @error('image') is-invalid @enderror" name="image" id="productImgEdit" /> 
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>

                            <img src="{{asset($product_edit->image)}}" alt="" id="prevImgEdit" width="100px" height="100px">
                        </div>
                       
                        <hr>

                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option value="active" {{$product_edit -> status == 'active' ? 'Selected' : ''}}>Active</option>
                                <option value="inactive" {{$product_edit -> status == 'inactive' ? 'Selected' : ''}}>Inactive</option>

                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Update Product">
                        </div>
                    </form>
                </div>
                <!-- card-body -->
            </div>
        </section>
    </div>
@endsection

@section('js')
   

                
    <script>
            
        $(document).ready(function(){
                $('#discountEdit').change(function(){

               
                var discountType = $(this).val();
                // alert(discountType);
                var priceVal = $('#priceValEdit').val();
                var discountPrice = $('#discountPriceEdit').val();
               
                if (discountType == "credit") {
                    var result = (priceVal - discountPrice)
                   
                    $('#disResultedit').val(result);
                }else if(discountType == "parcentage"){
                    var result = ((priceVal * (100 - discountPrice)) / 100);
                    $('#disResultedit').val(Math.round(result));
                    
                }
            });
   
        });


        productImgEdit.onchange = evt => {
                const [file] = productImgEdit.files
                if (file) {
                    prevImgEdit.src = URL.createObjectURL(file)
            }
        };

    </script>

 

@endsection
