<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class SupplierController extends Controller
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


    public function index()
    {
    	return view('add_supplier');
    }


    //INSERT NEW SUPPLIER
    public function store(Request $request)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:suppliers|max:255',
            'phone' => 'required|unique:suppliers|max:13',
            'address' => 'required',
            'photo' => 'required',
            'city' => 'required',
        ]);
        //FETCHING DATA
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['shopname']=$request->shopname;
        $data['accountHolder']=$request->accountHolder;
        $data['accountNumber']=$request->accountNumber;
        $data['bankName']=$request->bankName;
        $data['bankBranch']=$request->bankBranch;
        $data['city']=$request->city;

        $image = $request->file('photo');

            if ($image) {
                $image_name = Str::random(5);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/supplier/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if($success){
                    $data['photo']=$image_url;
                    $supplier=DB::table('suppliers')
                            ->insert($data);
                    if($supplier){
                        $notification=array(
                            'message'=>'SUPLLIER ADDED SUCCESSFULLY!!',
                            'alert-type'=>'success'
                        );
                        return Redirect()->route('all.supplier')->with($notification);
                    }else{
                        $notification=array(
                            'message'=>'ERROR!!!',
                            'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
                    }

                }else{
                    return Redirect()->back();
                }

            }else{
                return Redirect()->back();
            }
    }


    //SHOW ALL SUPPLIER
    public function allSupplier()
    {
        $suppliers = DB::table('suppliers')->get();
        return view('all_supplier', compact('suppliers'));

    }


    //VIEW A SINGLE SUPPLIER
    public function viewSupplier($id)
    {
        $single=DB::table('suppliers')
            ->where('id', $id)
            ->first();
        return view('view_supplier',compact('single'));
    }

    //DELETE A SINGLE SUPPLIER
    public function deleteSupplier($id)
    {
        $delete=DB::table('suppliers')
            ->where('id', $id)
            ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('suppliers')
            ->where('id', $id)
            ->delete();
        if($dltuser){
            $notification=array(
                'message'=>'SUPPLIER DELETED!!',
                'alert-type'=>'error'
            );
                return Redirect()->route('all.supplier')->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }

    //EDIT A SINGLE SUPPLIER (JUST SHOW)
    public function editSupplier($id)
    {
        $edit=DB::table('suppliers')
            ->where('id', $id)
            ->first();
        return view('edit_supplier',compact('edit'));
    }

    //UPDATE A SINGLE SUPPLIER (AFTER EDITING)
    public function updateSupplier(Request $request, $id)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            //'photo' => 'required',
            'city' => 'required',
        ]);

        //FETCHING DATA
       	$data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['shopname']=$request->shopname;
        $data['accountHolder']=$request->accountHolder;
        $data['accountNumber']=$request->accountNumber;
        $data['bankName']=$request->bankName;
        $data['bankBranch']=$request->bankBranch;
        $data['city']=$request->city;

        $image=$request->photo;
        //UPDATING EXISTING IMAGE
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/supplier/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('suppliers')->where('id',$id)->first();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('suppliers')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'message' => 'INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $data['photo']=$oldphoto;
                $user=DB::table('suppliers')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'message' => 'INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

    }
}
