<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Setting()
    {
    	$setting=DB::table('settings')->first();
    	return view('setting', compact('setting'));
    }


    //UPDATE COMPANY INFORMATION SETTINGS
    public function updateWebsite(Request $request, $id)
    {
    	//DATA VALIDATION
        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required|max:13',
            'company_email' => 'required|max:255',
            'company_city' => 'required',
            'company_country' => 'required',
        ]);

         //FETCHING DATA
        $data=array();
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['company_phone']=$request->company_phone;
        $data['company_email']=$request->company_email;
        $data['company_city']=$request->company_city;
        $data['company_country']=$request->company_country;
        $data['company_zipcode']=$request->company_zipcode;

        $image=$request->company_logo;
        
        //UPDATE COMPANY LOGO-START
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/companylogo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['company_logo']=$image_url;
                $img=DB::table('settings')->where('id',$id)->first();
                $image_path = $img->company_logo;
                $done=unlink($image_path);
                $company=DB::table('settings')->where('id',$id)->update($data);
                if ($company) {
                    $notification=array(
                        'message' => 'SETTINGS INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $data['company_logo']=$oldphoto;
                $company=DB::table('settings')->where('id',$id)->update($data);
                if ($company) {
                    $notification=array(
                        'message' => 'SETTINGS INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

        //UPDATE COMPANY LOGO-END
    }
}
