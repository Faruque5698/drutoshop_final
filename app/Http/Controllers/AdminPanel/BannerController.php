<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('AdminPanel.Banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation banner

        $request->validate([
            "title" => "required",
            "photo" => "required",
        ]);

        // store database banner info

        if ($request->file('photo')) {
            $file      = $request->file('photo');
            $file_ext  = $file->getClientOriginalExtension();
            $file_name = uniqid()."-".$file_ext;
            $url = "Admin/image/banner/";
            $dbUrl = $url.$file_name;
            $file->move($url,$file_name);

            Banner::create([
                "title"       => $request->title,
                "sub_title"   => $request->sub_title,
                "text"        => $request->text,
                "photo"       => $dbUrl,
                "status"      => $request->status,
                "created_at"  =>  Carbon::now(),
            ]);

        }else{

            Banner::create([
                "title" => $request->title,
                "sub_title" => $request->sub_title,
                "text" => $request->text,
                "status"      => $request->status,
                "created_at"  =>  Carbon::now(),
            ]);
        }

        return back()->with("message", "Banner ADD");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Banner::find($id);
        return view("AdminPanel.Banner.edit", compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update = Banner::find($id);
         if ($request->file('photo')) {
            $file      = $request->file('photo');
            $file_ext  = $file->getClientOriginalExtension();
            $file_name = uniqid()."-".$file_ext;
            $url = "Admin/image/banner/";
            $dbUrl = $url.$file_name;
            $file->move($url,$file_name);

            Banner::where('id', $update->id)->update([
                "title"       => $request->title,
                "sub_title"   => $request->sub_title,
                "text"        => $request->text,
                "photo"       => $dbUrl,
                "status"      => $request->status,
                "updated_at"  =>  Carbon::now(),
            ]);

        }else{

            Banner::where('id', $update->id)->update([
                "title"      => $request->title,
                "sub_title"  => $request->sub_title,
                "text"       => $request->text,
                "status"     => $request->status,
                "updated_at" =>  Carbon::now(),
            ]);
        }

        return back()->with("message", "Banner Update");
    }




    // status methode

    public function status($id)
    {
        $banner_status = Banner::find($id);

        if ($banner_status->status == "active") {
           Banner::where('status', $banner_status->status)->update([
                "status" => "inactive",
           ]);
           return back()->with('message','status inactive');
        }else{
            Banner::where('status', $banner_status->status)->update([
                "status" => "active",
           ]);
            return back()->with('message','status active');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();

        return response()->json(['success'=>'Deleted Successfully!!']);
    }
}
