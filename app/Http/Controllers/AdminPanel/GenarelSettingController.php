<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GenarelSetting;

class GenarelSettingController extends Controller
{

   public function genarelStore(Request $request)
   {
   		$request->validate([
   			"company_email"    => "email",
   			"fav_icon" => "image",
   			"logo" => "image",
   		]);


   		// fav icon save

   		if ($request->file('fav_icon') && $request->file('logo')) {
   			$fav_file          = $request->file('fav_icon');
            $fav_file_ext      = $fav_file->getClientOriginalExtension();
            $fav_file_name     = uniqid().".".$fav_file_ext;
            $fav_url           = "Admin/image/genarel/";
            $fav_dbUrl         = $fav_url.$fav_file_name;
            $fav_file->move($fav_url,$fav_file_name);

            $logo_file          = $request->file('logo');
            $logo_file_ext      = $logo_file->getClientOriginalExtension();
            $logo_file_name     = uniqid().".".$logo_file_ext;
            $logo_url           = "Admin/image/genarel/";
            $logo_dbUrl         = $logo_url.$logo_file_name;
            $logo_file->move($logo_url,$logo_file_name);

            GenarelSetting::where('id', 1)->update([
	   			"website_name"  => $request->website_name,
	   			"company_email" => $request->company_email,
	   			"contact_no"    => $request->contact_no,
	   			"fax_no"        => $request->fax_no,
	   			"footer_text"   => $request->footer_text,
	   			"address"       => $request->address,
	   			"fav_icon"       => $fav_dbUrl,
	   			"logo"          => $logo_dbUrl,
	   		]);

	   		return back()->with('message', 'Genarel Settings Updated Successfully!!');


   			
   		}elseif ($request->file('fav_icon') || $request->file('logo')) {
   			if ($request->file('fav_icon')) {
   				$fav_file          = $request->file('fav_icon');
	            $fav_file_ext      = $fav_file->getClientOriginalExtension();
	            $fav_file_name     = uniqid().".".$fav_file_ext;
	            $fav_url           = "Admin/image/genarel/";
	            $fav_dbUrl         = $fav_url.$fav_file_name;
	            $fav_file->move($fav_url,$fav_file_name);

	            GenarelSetting::where('id', 1)->update([
		   			"website_name" => $request->website_name,
		   			"company_email" => $request->company_email,
		   			"contact_no"  => $request->contact_no,
		   			"fax_no"      => $request->fax_no,
		   			"footer_text" => $request->footer_text,
		   			"address"     => $request->address,
		   			"fav_icon"     => $fav_dbUrl,
		   		]);

   			}else{

   				$logo_file          = $request->file('logo');
	            $logo_file_ext      = $logo_file->getClientOriginalExtension();
	            $logo_file_name     = uniqid().".".$logo_file_ext;
	            $logo_url           = "Admin/image/genarel/";
	            $logo_dbUrl         = $logo_url.$logo_file_name;
	            $logo_file->move($logo_url,$logo_file_name);

	            GenarelSetting::where('id', 1)->update([
		   			"website_name"  => $request->website_name,
		   			"company_email" => $request->company_email,
		   			"contact_no"  => $request->contact_no,
		   			"fax_no"      => $request->fax_no,
		   			"footer_text" => $request->footer_text,
		   			"address"     => $request->address,
		   			"logo"        => $logo_dbUrl,
		   		]);
   			}

   			return back()->with('message', 'Genarel Settings Updated Successfully!!');
   		}else{
   			
   			// update genarel info

	   		GenarelSetting::where('id', 1)->update([
	   			"website_name" => $request->website_name,
	   			"company_email"=> $request->company_email,
	   			"contact_no"  => $request->contact_no,
	   			"fax_no"      => $request->fax_no,
	   			"footer_text" => $request->footer_text,
	   			"address"     => $request->address,
	   			// "favIcon"     => $request->favIcon,
	   			// "logo"        => $request->logo,
	   		]);
   		}

   		return back()->with('message', 'Genarel Settings Updated Successfully!!');
   }
}
