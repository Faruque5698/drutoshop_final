<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Str;
use Carbon\Carbon;

class SizeController extends Controller
{
    public function index(){
        $datas = Size::all();
        return view('AdminPanel.Size.size', compact('datas'));
    }

    public function add(){
        return view('AdminPanel.Size.add-size');
    }

    public function store(Request $request){
        $this->validate($request, [
            'size_name' => 'required',
            'status' => 'required|in:active,inactive'
        ]);
        $size_name = Str::upper($request->size_name);
        Size::insert([
            'size_name' => $size_name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.size')->with('message', 'New Size Added');
    }

    public function edit($id)
    {
       $size_edit = Size::find($id);
       return view('AdminPanel.Size.size-edit', compact('size_edit'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'size_name' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $size_name = Str::upper($request->size_name);
        Size::where('id', $request->id)->update([
            'size_name' => $size_name,
            'status'     => $request->status,
            'updated_at' =>Carbon::now(),
        ]);
        return redirect()->route('admin.size')->with('message','Update Size added');
    }

    public function status($id)
    {
        $size_status = Size::find($id);

        if ($size_status->status == "active") {
            Size::where('id',$size_status->id)->update([
                 'status' =>  'inactive',
            ]);
            return back()->with('message','Size Inactive Successfully');

        }else{
            Size::where('id',$size_status->id)->update([
                 'status' =>  'active',
            ]);
            return back()->with('message','Size Active Successfully');
        }
    }

    public function destroy($id)
    {
        $size_id = Size::find($id);
        $size_id->delete();
        return response()->json(['success'=>'Product Delete Successfully!!']);
    }
}
