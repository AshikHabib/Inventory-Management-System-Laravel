@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
				<!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">View Products</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">NOBI STORE</a></li>
                            <li class="active">MD. Aminul Haque</li>
                        </ol>
                    </div>
                </div>
				<!-- Start Widget -->
                <div class="row">
                    <!-- Basic Form -->
                    <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Product Details</h3></div>
                                    <div class="panel-body">
                                    		<div class="form-group">
                                                <label>Product Image</label>
                                                <div>
                                                    <img style="height: 300px; width: 300px;" src="{{ URL::to($single->product_image) }}">
                                                </div>
                                            </div>

                                        	<div class="form-group">
                                                <label>Product Name</label>
                                                    <p>{{ $single->product_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                    <p>{{ $single->product_code }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>
                                                    <p>{{ $single->cat_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                    <p>{{ $single->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Warehouse</label>
                                                    <p>{{ $single->product_garage }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Route</label>
                                                    <p>{{ $single->product_route }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Date</label>
                                                @if($single->buy_date == NULL)
                                                	N/A
                                                @else
                                                	<p>{{ $single->buy_date }}</p>
                                                @endif
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                    <p>{{ $single->expire_date }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Price (Tk.)</label>
                                                    <p>{{ $single->buying_price }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Selling Price (Tk.)</label>
                                                    <p>{{ $single->selling_price }}</p>
                                            </div>
                                           
                                            <a href="{{ route('all.product') }} " class="btn btn-lg btn-success waves-effect waves-light"><i class="fas fa-chevron-circle-left"></i> Go Back</a>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
