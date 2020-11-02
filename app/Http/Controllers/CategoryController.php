<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class CategoryController extends Controller
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
    	return view('add_category');
    }


    //INSERT NEW CATEGORY
    public function store(Request $request)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'cat_name' => 'required|unique:categories|max:255',
        ]);

        //FETCHING DATA
        $data=array();
        $data['cat_name']=$request->cat_name;
        $cat=DB::table('categories')->insert($data);

        if($cat){
            $notification=array(
            	'message'=>'CATEGORY ADDED SUCCESSFULLY!!',
                'alert-type'=>'success'
            	);
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }
    }


    //SHOW ALL CATEGORIES
    public function allCategory()
    {
        $category = DB::table('categories')->get();
        return view('all_category', compact('category'));

    }


    //DELETE A SINGLE CATEGORY
    public function deleteCategory($id)
    {
        // $delete=DB::table('categories')
        //     ->where('id', $id)
        //     ->first();
        // $photo=$delete->photo;
        // unlink($photo);
        $delete=DB::table('categories')
            ->where('id', $id)
            ->delete();
        if($delete){
            $notification=array(
                'message'=>'CATEGORY DELETED!!',
                'alert-type'=>'error'
            );
                return Redirect()->route('all.category')->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }


    //EDIT A SINGLE CATEGORY (JUST SHOW)
    public function editCategory($id)
    {
        $edit=DB::table('categories')
            ->where('id', $id)
            ->first();
        return view('edit_category',compact('edit'));
    }


    //UPDATE A SINGLE CATEGORY (AFTER EDITING)
    public function updateCategory(Request $request, $id)
    {
        //FETCHING DATA
        $data=array();
        $data['cat_name']=$request->cat_name;
        $cat_up=DB::table('categories')->where('id',$id)->update($data);
			if ($cat_up) {
                $notification=array(
                	'message' => 'CATEGORY UPDATED!!',
                    'alert-type' => 'info'
                    );
                return Redirect()->route('all.category')->with($notification);
                
            }else{
                return Redirect()->back();
            }
    }

}
