<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Cart;

class CartController extends Controller
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


    public function addCart(Request $request)
    {
    	$data = array();
    	$data['id'] = $request->id;
    	$data['name'] = $request->name;
    	$data['qty'] = $request->qty;
    	$data['price'] = $request->price;
    	$data['weight'] = $request->weight;

    	$add = Cart::add($data);
    	
    	if($add){
            $notification=array(
                'message'=>'PRODUCT ADDED TO CART',
                'alert-type'=>'success'
            );
                return Redirect()->back()->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }


    public function cartUpdate(Request $request, $rowId)
    {
    	// $data = array();
    	// $data['qty'] = $request->qty;

    	$qty = $request->qty;
    	$update = Cart::update($rowId, $qty);  // Will update the quantity

    	if($update){
            $notification=array(
                'message'=>'CART UPDATED',
                'alert-type'=>'success'
            );
                return Redirect()->back()->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }

    }


    public function cartRemove($rowId)
    {
    	$remove = Cart::remove($rowId);

    	if($remove){
            $notification=array(
                'message'=>'CART REMOVED',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }

    }

    //INVOICE
    public function createInvoice(Request $request)
    {
    	//DATA VALIDATION
        $request->validate([
        	'cus_id' => 'required',
        ],

        [
        	'cus_id.required' => 'Please Select a Customer',
        ]);

        $cus_id = $request->cus_id;
        $customer = DB::table('customers')->where('id',$cus_id)->first();
        $contents = Cart::content();

    	return view('invoice',compact('customer','contents'));

    }
}
