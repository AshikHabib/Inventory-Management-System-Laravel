<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class EmployeeController extends Controller
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
    	return view('add_employee');
    }

    //INSERT NEW EMPLOYEE
    public function store(Request $request)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'photo' => 'required',
            'salary' => 'required',
        ]);

        //FETCHING DATA
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;

        $image = $request->file('photo');

            if ($image) {
                $image_name = Str::random(5);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/employee/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if($success){
                    $data['photo']=$image_url;
                    $employee=DB::table('employees')
                            ->insert($data);
                    if($employee){
                        $notification=array(
                            'message'=>'EMPLOYEE ADDED SUCCESSFULLY!!',
                            'alert-type'=>'success'
                        );
                        return Redirect()->route('all.employee')->with($notification);
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


    //SHOW ALL EMPLOYEE
    public function allEmployee()
    {
        $employees = DB::table('employees')->get();
        return view('all_employee', compact('employees'));
    }

    //VIEW A SINGLE EMPLOYEE
    public function viewEmployee($id)
    {
        $single=DB::table('employees')
            ->where('id', $id)
            ->first();
        return view('view_employee',compact('single'));
    }

    //DELETE A SINGLE EMPLOYEE
    public function deleteEmployee($id)
    {
        $delete=DB::table('employees')
            ->where('id', $id)
            ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('employees')
            ->where('id', $id)
            ->delete();
        if($dltuser){
            $notification=array(
                'message'=>'EMPLOYEE DELETED!!',
                'alert-type'=>'error'
            );
                return Redirect()->route('all.employee')->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }

    //EDIT A SINGLE EMPLOYEE (JUST SHOW)
    public function editEmployee($id)
    {
        $edit=DB::table('employees')
            ->where('id', $id)
            ->first();
        return view('edit_employee',compact('edit'));
    }

    //UPDATE A SINGLE EMPLOYEE (AFTER EDITING)
    public function updateEmployee(Request $request, $id)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'salary' => 'required',
        ]);

        //FETCHING DATA
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;

        $image=$request->photo;
        
        //UPDATING EXISTING IMAGE
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/employee/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('employees')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'message' => 'INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $data['photo']=$oldphoto;
                $user=DB::table('employees')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'message' => 'INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

    }

}
