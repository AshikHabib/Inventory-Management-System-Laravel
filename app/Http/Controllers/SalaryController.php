<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class SalaryController extends Controller
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

    public function advancedIndex()
    {
    	return view('advanced_salary');
    }


    //SHOW ALL ADVANCED SALARIES PAID
    public function allSalary()
    {
    	$salary=DB::table('advanced_salaries')
		    	->join('employees','advanced_salaries.emp_id','employees.id')
		    	->select('advanced_salaries.*','employees.name','employees.salary','employees.photo')
		    	->orderBy('id','DESC')
		    	->get();

		return view('all_advanced_salary',compact('salary'));

		// $advanced = DB::table('advanced_salaries')->get();
        // return view('all_advanced_salary', compact('advanced_salaries'));

    }


    //ADVANCED SALARY PAID
    public function advancedStore(Request $request)
    {
    	$month=$request->month;
    	$emp_id=$request->emp_id;

    	$advanced=DB::table('advanced_salaries')
			    	->where('month',$month)
			    	->where('emp_id',$emp_id)
			    	->first();
			if ($advanced === NULL) {

				$data=array();
		    	$data['emp_id']=$request->emp_id;
		    	$data['month']=$request->month;
		    	$data['year']=$request->year;
		    	$data['advanced_salary']=$request->advanced_salary;

		    	$advanced=DB::table('advanced_salaries')->insert($data);
		    	if($advanced){
                        $notification=array(
                            'message'=>'ADVANED SALARY PAID SUCCESSFULLY!!',
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
				$notification=array(
                            'message'=>'ADVANCED ALREADY PAID FOR THIS MONTH!!',
                            'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
			}

    }


    //PAY SALARY
    public function index()
    {
        
        $employee=DB::table('employees')->get();
        return view('pay_salary',compact('employee'));

    }
}
