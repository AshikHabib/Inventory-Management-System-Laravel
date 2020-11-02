<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Attendance;

class AttendanceController extends Controller
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

    public function takeAttendance()
    {
    	$employee=DB::table('employees')->get();

    	return view('take_attendance', compact('employee'));
    }


    //INSERT ATTENDANCE
    public function insertAttendance(Request $request)
    {
        $date=$request->att_date;
        $att_date=DB::table('attendances')->where('att_date',$date)->first();
        
        if ($att_date) {
            $notification=array(
                'message'=>'ALREADY TAKEN FOR TODAY',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);

        }else{
            foreach ($request->user_id as $id) {
            $data[]=[
                "user_id" => $id,
                "attendance" => $request->attendance[$id],
                "att_date" => $request->att_date,
                "att_year" => $request->att_year,
                "month" => $request->month,
                "edit_date" => date("d_M_Y"),
            ];
        }

        $att=DB::table('attendances')->insert($data);

        if($att){
            $notification=array(
                'message'=>'ATTENDANCE TAKEN SUCCESSFULLY!!',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
            //return Redirect()->route('all.attendance')->with($notification);
        }else{
            $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
            }

        }
        
    }


    //SHOW ALL ATTENDANCE
    public function allAttendance()
    {
        $all_att = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('all_attendance', compact('all_att'));

    }

    
    //VIEW ATTENDANCE
    public function viewAttendance($edit_date)
    {
        $date = DB::table('attendances')->where('edit_date', $edit_date)->first();

        $view=DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('edit_date', $edit_date)
            ->get();
        
        return view('view_attendance',compact('view','date'));

    }


    //EDIT ATTENDANCE (JUST SHOW)
    public function editAttendance($edit_date)
    {
        $date = DB::table('attendances')->where('edit_date', $edit_date)->first();

        $edit=DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('edit_date', $edit_date)
            ->get();
        
        return view('edit_attendance',compact('edit','date'));
    }


    //UPDATE ATTENDANCE (AFTER EDITING)
    public function updateAttendance(Request $request)
    {

        foreach ($request->id as $id){
            $data=[
                "attendance" => $request->attendance[$id],
                "att_date" => $request->att_date,
                "att_year" => $request->att_year,
                "month" => $request->month,
            ];

            $attendance = Attendance::where(['att_date'=>$request->att_date, 'id'=>$id])->first();
            $attendance->update($data);
        }

            if ($attendance) {
                $notification=array(
                    'message' => 'ATTENDANCE UPDATED!!',
                    'alert-type' => 'info'
                    );
                return Redirect()->route('all.attendance')->with($notification);
                
            }else{
                $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
                );

                return Redirect()->back()->with($notification);
            }
    }

}
