<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Carbon\Carbon;

class ColorController extends Controller
{
    public function index()
    {
        $datas = Color::all();
        return view('AdminPanel.Color.color', compact('datas'));
    }

    public function add()
    {
        return view('AdminPanel.Color.add-color');
    }

    public function store(Request $request)
    {
       $request->validate([
            'color_name' => 'required',
            'color_code' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

       Color::insert([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'status'     => $request->status,
            'created_at' =>Carbon::now(),
       ]);
       return redirect()->route('admin.color')->with('message','New Color added');
    }

    public function status($id)
    {
        $color_status = Color::find($id);

        if ($color_status->status == "active") {
            Color::where('id',$color_status->id)->update([
                 'status' =>  'inactive',
            ]);
            return back()->with('message','Color Inactive Successfully');

        }else{
            Color::where('id',$color_status->id)->update([
                 'status' =>  'active',
            ]);
            return back()->with('message','Color Active Successfully');
        }
    }

    public function edit($id){
       $color_edit = Color::find($id);
       return view('AdminPanel.Color.color-edit', compact('color_edit'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'color_name' => 'required',
            'color_code' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        Color::where('id', $request->id)->update([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'status'     => $request->status,
            'updated_at' =>Carbon::now(),
        ]);
        return redirect()->route('admin.color')->with('message','Update Color added');
    }


    public function destroy($id)
    {
        $color_id = Color::find($id);
        $color_id->delete();
        return response()->json(['success'=>'Color Delete Successfully!!']);
    }
}
