<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view ('AdminPanel.Brand.brand', compact('brands'));
    }

    public function add(){
        return view('AdminPanel.Brand.add_brand');
    }


    public function store(Request $request){
        $request->validate([
            'brand_title' => 'required',
            'photo' => ' image|nullable',
            'status' => 'required|in:active,inactive'
        ]);

        $brand_image = $request->file('photo');
        if ($brand_image){
            $imageExt = $brand_image->getClientOriginalExtension();
            $newImageName = $request->title.'-'.time().'.'.$imageExt;
            $directory = 'assets/images/brand/';
            $imageUrl = $directory.$newImageName;
            $brand_image -> move($directory,$newImageName);

            $brands = new Brand();
            $brands->brand_title = $request->brand_title;
            $brands->summary = $request->summary;
            $brands->status = $request->status;
            $brands->photo = $imageUrl;
            $brands->save();
        }else{
            $brands = new Brand();
            $brands->brand_title = $request->brand_title;
            $brands->summary = $request->summary;
            $brands->status = $request->status;
            $brands->save();
        }

        return redirect()->route('admin.brand')->with('message','New Brand added');
    }


    public function edit($id)
    {
        $brand_edit = Brand::find($id);
        return view('AdminPanel.Brand.brand_edit' , compact('brand_edit'));
    }

    public function update(Request $request){
        $brands = Brand::find($request->id);
        $brand_image = $request->file('photo');
        if ($brand_image){
            $imageExt = $brand_image->getClientOriginalExtension();
            $newImageName = $request->brand_title.'-'.time().'.'.$imageExt;
            $directory = 'assets/images/brand/';
            $imageUrl = $directory.$newImageName;
            $brand_image -> move($directory,$newImageName);

            if (file_exists($brands->photo)) {
                 unlink($brands->photo);
            }

            $brands->brand_title = $request->brand_title;
            $brands->summary = $request->summary;
            $brands->status = $request->status;
            $brands->photo = $imageUrl;
            $brands->save();
        }else{
            $brands->brand_title = $request->brand_title;
            $brands->summary = $request->summary;
            $brands->status = $request->status;
            $brands->save();
        }

        return redirect()->route('admin.brand')->with('message','Brand Updated');
    }


    public function unpublished($id){
        $brands = Brand::find($id);
        $brands -> status = 'inactive';
        $brands->save();
        return back()->with('message',' Barnds Inactive');
    }
    public function published($id){
        $brands = Brand::find($id);
        $brands -> status = 'active';
        $brands->save();
        return back()->with('message',' Brands Active');
    }

    public function destroy($id){
        $brands = Brand::find($id);
        // unlink($brands->photo);
        $brands->delete();

        return response()->json(['success'=>'Brand Delete Successfully!!']);
    }
}
