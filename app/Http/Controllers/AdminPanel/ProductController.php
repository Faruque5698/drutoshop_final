<?php

namespace App\Http\Controllers\AdminPanel;

use Auth;
use Carbon\Carbon;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\TempData;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Models\ColorSizeQty;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Models\GalleryProduct;
use App\Http\Controllers\Controller;
use App\Models\ColorPerSize;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth as E;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('color_per_size')->orderBy('id','DESC')->get();

        //return $products;
        return view('AdminPanel.Product.product', compact('products'));
    }

    public function add()
    {


        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('AdminPanel.Product.add_product',[
            "categories" => $categories,
            "sizes" => $sizes,
            "colors" => $colors,
            "brands" => $brands,
        ]);



    }

    public function getSubId(Request $request)
    {

       $category_id = Subcategory::where('category_id', $request->cat_id)->get();
       $output =   '<option value="" selected>-----Select  Subategory------</option>';
       foreach ($category_id as $subcategory) {
        echo $output = '<option  value="'.$subcategory->id.'">'.$subcategory->title.'</option>';

       }


    }

    public function storeColorSize(Request $request)
    {

        $ext = TempData::where('size_id',$request->size_id)->first();

        if($ext){

        }else{
            $temp_data = new TempData();
            $temp_data->user_id = auth()->user()->id;
            $temp_data->size_id = $request->size_id;
            $temp_data->size_name = $request->size_text;
            $temp_data->quantity = $request->size_color_qty;
            $temp_data->save();
        }


        $datas = TempData::where('user_id', auth()->user()->id)->get();




        $row = "<div class='form-row mb-1 mt-1'><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-2'><input type='number' value='' class='form-control' disabled></div><div class='col-2 text-center'><button id='remove' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";


        foreach($datas as $data){
            echo $row = "<div class='form-row mb-1 mt-1'><div class='col-7'><input type='text' value='".$data->size_name."' class='form-control' disabled></div><div class='col-3'><input type='number' id='subQunatity' value='".$data->quantity."' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' value='".$data->id."' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";
        }





    }

    public function colorPerSize()
    {
        $datas = TempData::where('user_id', auth()->user()->id)->get();
        $row = "<div class='form-row mb-1 mt-1'><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-2'><input type='number' value='' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";


        foreach($datas as $data){
            echo $row = "<div class='form-row mb-1 mt-1'><div class='col-7'><input type='text' value='".$data->size_name."' class='form-control' disabled></div><div class='col-3'><input type='number' id='subQunatity' value='".$data->quantity."' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' value='".$data->id."' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";
        }
    }

    public function deleteColorSize($id)
    {

        $tem_data = TempData::find($id);

        $tem_data->delete();


        $datas = TempData::where('user_id', auth()->user()->id)->get();
        $row = "<div class='form-row mb-1 mt-1'><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-2'><input type='number' value='' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";


        foreach($datas as $data){
            echo $row = "<div class='form-row mb-1 mt-1'><div class='col-7'><input type='text' value='".$data->size_name."' class='form-control' disabled></div><div class='col-3'><input type='number' id='subQunatity' value='".$data->quantity."' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' value='".$data->id."' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";
        }


    }

    public function varientDelete()
    {
        Tempdata::truncate();

        $datas = TempData::get();
        $row = "<div class='form-row mb-1 mt-1'><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-4'><input type='text' value='' class='form-control' disabled></div><div class='col-2'><input type='number' value='' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";


        foreach($datas as $data){
            echo $row = "<div class='form-row mb-1 mt-1'><div class='col-4'><input type='text' value='".$data->size_name."' class='form-control' disabled></div><div class='col-4'><input type='text' value='".$data->color_name."' class='form-control' disabled></div><div class='col-2'><input type='number' id='subQunatity' value='".$data->quantity."' class='form-control' disabled></div><div class='col-2 text-center'><button type='button' id='remove' value='".$data->id."' class='ml-2 btn btn-danger w-100'>remove</button></div></div>";
        }

    }

    public function updateQunatity()
    {
        $total = TempData::sum('quantity');
        return $total;
    }







    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'discription' => 'required',
            'image' => 'required',
            'status' => 'required|in:active,inactive'
        ]);






        $total_qty = TempData::sum('quantity');
        $total_price = $request->discount_price * $total_qty;

        $slug_name =  Str::slug(Str::lower($request->product_name));
        $sku = "PRO"."-"."BD"."-".rand(11111,99999);
        if ($request->hasFile('image')){
            $galleryImages = [];
            $product_image = $request->file('image');
            $ext = $product_image->getClientOriginalExtension();
            $imageName = time().'-'.'.'.$ext;
            $directory = 'assets/images/product/';
            $imageUrl = $directory.$imageName;
            $product_image -> move($directory,$imageName);

            $galleryImages[]  = $imageUrl;


            if ($request->hasFile('image1')) {
                $product_image = $request->file('image1');
                $ext = $product_image->getClientOriginalExtension();
                $imageName1 = time().'-1'.'.'.$ext;
                $directory = 'assets/images/product/';
                $imageUrl1 = $directory.$imageName1;
                $product_image ->move($directory,$imageName1);



            $galleryImages[]  = $imageUrl1;
            }
            if ($request->hasFile('image2')) {
                $product_image = $request->file('image2');
                $ext = $product_image->getClientOriginalExtension();
                $imageName2 = time().'-2'.'.'.$ext;
                $directory = 'assets/images/product/';
                $imageUrl2 = $directory.$imageName2;
                $product_image ->move($directory,$imageName2);

                $galleryImages[]  = $imageUrl2;

            }
            if ($request->hasFile('image3')) {
                $product_image = $request->file('image3');
                $ext = $product_image->getClientOriginalExtension();
                $imageName3 = time().'-3'.'.'.$ext;
                $directory = 'assets/images/product/';
                $imageUrl3 = $directory.$imageName3;
                $product_image ->move($directory,$imageName3);


                $galleryImages[]  = $imageUrl3;

            }




            if ($product_image) {
               $product = Product::create([
                    'user_id' => auth()->user()->id,
                    'product_name' => $request->product_name,
                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'discount_rate' => $request->discount_rate,
                    'price' => $request->price,
                    'discount_price' => $request->discount_price,
                    'total_price'   => $total_price,
                    'quantity'   => $total_qty,
                    'discription' => $request->discription,
                    'image' => $imageUrl,
                    'images' =>$galleryImages,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'credit'=> "%",
                    'status' => $request->status,
                    'created_at' => Carbon::now(),
                ]);

                if ($product) {

                       $color_sizes = TempData::all();

                       if ($color_sizes) {
                            foreach($color_sizes as $color_size){
                                $color_size_qty = new ColorSizeQty();
                                $color_size_qty->product_id = $product->id;
                                $color_size_qty->size_id = $color_size['size_id'];
                                $color_size_qty->size_name = $color_size['size_name'];
                                $color_size_qty->size_color_qty = $color_size['quantity'];
                                $color_size_qty->save();
                            }

                            $stock_product = new StockProduct();
                            $stock_product->product_id = $product->id;
                            $stock_product->total_qty = $total_qty;
                            $stock_product->last_qty = $total_qty;
                            $stock_product->sale_qty = 0;
                            $stock_product->save();
                       }
                }
            }

        }

        // $temp_datas = TempData::all();

        // $s = [];
        // $m = [];
        // $l = [];
        // $xl = [];
        // $xxl = [];

        // foreach($temp_datas as $data){
        //     if($data->size_name == "S"){
        //         $s[] = $data->color_code;
        //     }

        //     if($data->size_name == "M"){
        //         $m[] = $data->color_code;
        //     }

        //     if($data->size_name == "L"){
        //         $l[] = $data->color_code;
        //     }

        //     if($data->size_name == "XL"){
        //         $xl[] = $data->color_code;
        //     }

        //     if($data->size_name == "XXL"){
        //         $xxl[] = $data->color_code;
        //     }
        // }

        // if(!empty($s)){
        //     $color_per_sizes = new ColorPerSize();
        //     $color_per_sizes->product_id = $product->id;
        //     $color_per_sizes->size_name  = "S";
        //     $color_per_sizes->color_code = $s;
        //     $color_per_sizes->save();

        // }

        // if(!empty($m)){
        //     $color_per_sizes = new ColorPerSize();
        //     $color_per_sizes->product_id = $product_id;
        //     $color_per_sizes->size_name  = "M";
        //     $color_per_sizes->color_code = $m;
        //     $color_per_sizes->save();

        // }

        // if(!empty($l)){
        //     $color_per_sizes = new ColorPerSize();
        //     $color_per_sizes->product_id = $product_id;
        //     $color_per_sizes->size_name  = "L";
        //     $color_per_sizes->color_code =$l;
        //     $color_per_sizes->save();

        // }

        // if(!empty($xl)){
        //     $color_per_sizes = new ColorPerSize();
        //     $color_per_sizes->product_id = $product_id;
        //     $color_per_sizes->size_name  = "XL";
        //     $color_per_sizes->color_code = $xl;
        //     $color_per_sizes->save();

        // }

        // if(!empty($xxl)){
        //     $color_per_sizes = new ColorPerSize();
        //     $color_per_sizes->product_id = $product_id;
        //     $color_per_sizes->size_name  = "XXL";
        //     $color_per_sizes->color_code = $xxl;
        //     $color_per_sizes->save();

        // }

        TempData::truncate();


        return redirect()->route('admin.product')->with('message', 'Product Uplopad Successfully');
    }



    public function show($id)
    {

        $single_product = Product::with('size_color_qty_product')->find($id);
        return view('AdminPanel.Product.single_view_product', compact('single_product'));
    }

    public function status($id)
    {
        $product_status = Product::find($id);

        if ($product_status->status == 'active') {
            Product::where('id',$product_status->id)->update([
                'status' => 'inactive',
            ]);
            return back()->with('message', 'Product Inactive Successfully');
        }else{
            Product::where('id',$product_status->id)->update([
                'status' => 'active',
            ]);
            return back()->with('message', 'Product Active Successfully');
        }

    }

    public function populer($id)
    {
        $populer = Product::find($id);

        if ($populer->feature_product == 0) {
            Product::where('id', $populer->id)->update([
                'feature_product' => 1,
            ]);
            return back()->with('message', 'Popular Product Add Successfully');
        }else{
            Product::where('id',$populer->id)->update([
               'feature_product' => 0,
            ]);
            return back()->with('message', 'Popular Product Remove Successfully');
        }

    }

    public function trands($id)
    {
       $trand = Product::find($id);

        if ($trand->trand_product == 0) {
            Product::where('id', $trand->id)->update([
                'trand_product' => 1,
            ]);
            return back()->with('message', 'Tranding Product Add Successfully');
        }else{
            Product::where('id',$trand->id)->update([
               'trand_product' => 0,
            ]);
            return back()->with('message', 'Tranding Product Remove Successfully');
        }

    }

    public function exclusive($id)
    {
        $exclusive = Product::find($id);

        if ($exclusive->exclusive_product == 0) {
            Product::where('id', $exclusive->id)->update([
                'exclusive_product' => 1,
            ]);
            return back()->with('message', 'Exclusive Product Add Successfully');
        }else{
            Product::where('id',$exclusive->id)->update([
               'exclusive_product' => 0,
            ]);
            return back()->with('message', 'Exclusive Product Remove Successfully');
        }

    }

    public function edit($id)
    {
        $product_edit = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('AdminPanel.Product.edit_product', compact('product_edit','categories','brands','sizes','colors'));
    }

    public function update(Request $request)
    {

        $slug_name =  Str::slug(Str::lower($request->product_name));
        $sku = Str::substr($request->product_name,0,3)."-".Str::random();
        $total_price = $request->quantity * $request->discount_price;

        if ($request->hasFile('image')) {
            $product_image = $request->file('image');
            $imageExt = $product_image->getClientOriginalExtension();
            $imageName = time().'.'.$imageExt;
            $directory = 'assets/images/product/';
            $imageUrl = $directory.$imageName;
            $product_image -> move($directory,$imageName);


            if ($product_image) {
                Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    // 'brand_id' => $request->brand_id,
                    // 'category_id' => $request->category_id,
                    // 'subcategory_id' => $request->subcategory_id,
                    // 'size_id' => $request->size_id,
                    // 'color_id' => $request->color_id,
                    // 'color_id' => $request->color_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'image' => $imageUrl,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_type'=> $request->discount_type,
                    'total_price' =>$total_price,
                    'status' => $request->status,
                    'updated_at' => Carbon::now(),
                ]);
            }
            return redirect()->route('admin.product')->with('message', 'Product Update Successfully');
        }else{

           Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    //'brand_id' => $request->brand_id,
                    // 'category_id' => $request->category_id,
                    // 'subcategory_id' => $request->subcategory_id,
                    // 'size_id' => $request->size_id,
                    // 'color_id' => $request->color_id,
                    // 'color_id' => $request->color_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_price' => $request->discount_price,
                    'total_price' =>$total_price,
                    'status' => $request->status,
                    'updated_at' => Carbon::now(),
                ]);
        }

        return redirect()->route('admin.product')->with('message', 'Product Update Successfully');


    }

    public function destroy($id)
    {
        $product_id = Product::find($id);

        $product_id->delete();

        return response()->json(['success'=>'Deleted Successfully!!']);

    }
}
