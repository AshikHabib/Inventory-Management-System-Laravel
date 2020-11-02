<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//for str_random funtion
use Illuminate\Support\Str;

use DB;

class ProductController extends Controller
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
    	return view('add_product');
    }


    //INSERT NEW PRODUCT
    public function store(Request $request)
    {
        //DATA VALIDATION
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products|max:255',
        ]);

        //FETCHING DATA
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

        $image = $request->file('product_image');

            if ($image) {
                $image_name = Str::random(5);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/products/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if($success){
                    $data['product_image']=$image_url;
                    $product=DB::table('products')
                            ->insert($data);
                    if($product){
                        $notification=array(
                            'message'=>'PRODUCT ADDED SUCCESSFULLY!!',
                            'alert-type'=>'success'
                        );
                        return Redirect()->route('all.product')->with($notification);
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


    //SHOW ALL PRODUCT
    public function allProduct()
    {
        $product = DB::table('products')->get();
        return view('all_product', compact('product'));

    }


    //VIEW A SINGLE PRODUCT
    public function viewProduct($id)
    {
        $single=DB::table('products')
        	->join('categories','products.cat_id','categories.id')
        	->join('suppliers','products.sup_id','suppliers.id')
        	->select('categories.cat_name','products.*','suppliers.name')
            ->where('products.id', $id)
            ->first();
            
        return view('view_product',compact('single'));
    }

    //DELETE A SINGLE PRODUCT
    public function deleteProduct($id)
    {
        $delete=DB::table('products')
            ->where('id', $id)
            ->first();
        $photo=$delete->product_image;
        unlink($photo);
        $dltprod=DB::table('products')
            ->where('id', $id)
            ->delete();
        if($dltprod){
            $notification=array(
                'message'=>'PRODUCT DELETED!!',
                'alert-type'=>'error'
            );
                return Redirect()->route('all.product')->with($notification);
        }else{
             $notification=array(
                'message'=>'ERROR!!!',
                'alert-type'=>'error'
            );
                return Redirect()->back()->with($notification);
        }
    }

    //EDIT A SINGLE PRODUCT (JUST SHOW)
    public function editProduct($id)
    {
        $edit=DB::table('products')
            ->where('id', $id)
            ->first();
        return view('edit_product',compact('edit'));
    }

    //UPDATE A SINGLE PRODUCT (AFTER EDITING)
    public function updateProduct(Request $request, $id)
    {

        //FETCHING DATA
       	$data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

        $image=$request->product_image;
        //UPDATING EXISTING IMAGE
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/products/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $img=DB::table('products')->where('id',$id)->first();
                $image_path = $img->product_image;
                $done=unlink($image_path);
                $prod=DB::table('products')->where('id',$id)->update($data);
                if ($prod) {
                    $notification=array(
                        'message' => 'PRODUCT INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $oldphoto=$request->old_image;
            if ($oldphoto) {
                $data['product_image']=$oldphoto;
                $prod=DB::table('products')->where('id',$id)->update($data);
                if ($prod) {
                    $notification=array(
                        'message' => 'PRODUCT INFORMATION UPDATED!!',
                        'alert-type' => 'info'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

    }
}
