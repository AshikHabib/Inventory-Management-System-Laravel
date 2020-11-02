<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class CustomerController extends Controller
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
    	return view('add_customer');
    }


    //INSERT NEW CUSTOMER
    public function store(Request $request)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers|max:255',
            'phone' => 'required|unique:customers|max:13',
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
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $image = $request->file('photo');

            if ($image) {
                $image_name = Str::random(5);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/customer/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if($success){
                    $data['photo']=$image_url;
                    $customer=DB::table('customers')
                            ->insert($data);
                    if($customer){
                        $notification=array(
                            'message'=>'CUSTOMER ADDED SUCCESSFULLY!!',
                            'alert-type'=>'success'
                        );
                        return Redirect()->back()->with($notification);
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


    //SHOW ALL CUSTOMERS
    public function allCustomer()
    {
        $customers = DB::table('customers')->get();
        return view('all_customer', compact('customers'));

    }


    //VIEW A SINGLE CUSTOMER
    public function viewCustomer($id)
    {
        $single=DB::table('customers')
            ->where('id', $id)
            ->first();
        return view('view_customer',compact('single'));
    }

    //DELETE A SINGLE CUSTOMER
    public function deleteCustomer($id)
    {
        $delete=DB::table('customers')
            ->where('id', $id)
            ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('customers')
            ->where('id', $id)
            ->delete();
        if($dltuser){
            $notification=array(
                'message'=>'CUSTOMER DELETED!!',
                'alert-type'=>'error'
            );
                return Redirect()->route('all.customer')->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }

    //EDIT A SINGLE CUSTOMER (JUST SHOW)
    public function editCustomer($id)
    {
        $edit=DB::table('customers')
            ->where('id', $id)
            ->first();
        return view('edit_customer',compact('edit'));
    }

    //UPDATE A SINGLE CUSTOMER (AFTER EDITING)
    public function updateCustomer(Request $request, $id)
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
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $image=$request->photo;
        //UPDATING EXISTING IMAGE
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/customer/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('customers')->where('id',$id)->first();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('customers')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'message' => 'INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
        	$oldphoto=$request->old_photo;
            if ($oldphoto) {
                $data['photo']=$oldphoto;
                $user=DB::table('customers')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'message' => 'INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

    }

}

