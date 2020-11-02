<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class ExpenseController extends Controller
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
    	return view('add_expense');
    }


    //INSERT NEW EXPENSE
    public function store(Request $request)
    {
        //DATA VALIDATION
        // $validatedData = $request->validate([
        //     'product_name' => 'required',
        //     'product_code' => 'required|unique:products|max:255',
        // ]);

        //FETCHING DATA
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['month']=$request->month;
        $data['date']=$request->date;
        $data['year']=$request->year;

        $exp=DB::table('expenses')->insert($data );

        if($exp){
            $notification=array(
                'message'=>'EXPENSE ADDED SUCCESSFULLY!!',
                 'alert-type'=>'success'
            );
            	return Redirect()->route('today.expense')->with($notification);
        }else{
            $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }


    //SHOW TODAY'S EXPENSES
    public function todayExpense()
    {
        $date = date("d-M-Y");
        $today = DB::table('expenses')->where('date',$date)->get();

        return view('today_expense', compact('today'));

    }


    //EDIT A SINGLE EXPENSE (JUST SHOW)
    public function editTodayExpense($id)
    {
        $tdy=DB::table('expenses')
            ->where('id', $id)
            ->first();

        return view('edit_today_expense',compact('tdy'));
    }


    //UPDATE A SINGLE EXPENSE (AFTER EDITING)
    public function updateExpense(Request $request, $id)
    {

        //FETCHING DATA
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['month']=$request->month;
        $data['date']=$request->date;
        $data['year']=$request->year;

        $exp=DB::table('expenses')->where('id',$id)->update($data );

        if($exp){
            $notification=array(
                'message'=>'EXPENSE UPDATED SUCCESSFULLY!!',
                 'alert-type'=>'success'
            );
                return Redirect()->route('today.expense')->with($notification);
        }else{
            $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }


    //SHOW MONTHLY EXPENSES
    public function monthlyExpense()
    {
        $month = date("M");
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }


    //SHOW YEARLY EXPENSES
    public function yearlyExpense()
    {
        $year = date("Y");
        $expense = DB::table('expenses')->where('year',$year)->get();

        return view('yearly_expense', compact('expense'));

    }


    /////////SHOW MONTHLY EXPENSES INDIVIDUALLY/////////////////////
    public function januaryExpense()
    {
        $month = "Jan";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function februaryExpense()
    {
        $month = "Feb";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function marchExpense()
    {
        $month = "Mar";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function aprilExpense()
    {
        $month = "Apr";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function mayExpense()
    {
        $month = "May";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function juneExpense()
    {
        $month = "Jun";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function julyExpense()
    {
        $month = "Jul";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function augustExpense()
    {
        $month = "Aug";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function septemberExpense()
    {
        $month = "Sep";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function octoberExpense()
    {
        $month = "Oct";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function novemberExpense()
    {
        $month = "Nov";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    public function decemberExpense()
    {
        $month = "Dec";
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('expense'));

    }

    //////////////////////// END ////////////////////////////////////////
    
}
