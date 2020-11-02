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
                        <h4 class="pull-left page-title">Update Product Information</h4>
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
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Edit Product Details</h3></div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-product/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="{{ $edit->product_name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="text" class="form-control" name="product_code" value="{{ $edit->product_code }}" required>
                                            </div>
                                           <div class="form-group">
                                                <label>Select Category</label>

                                                @php
                                                	$cat=DB::table('categories')->get();
                                                @endphp

                                                <select name="cat_id" class="form-control">
                                                	<option disabled="" selected="">Select Category</option>

                                                	@foreach($cat as $row)
                                                	<option value="{{ $row->id }}" 
                                                		<?php if ($edit->cat_id == $row->id) {
                                                			echo "selected";
                                                		} ?> >{{ $row->cat_name }}
                                                	</option>
                                                	@endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>Select Supplier</label>

                                                @php
                                                	$sup=DB::table('suppliers')->get();
                                                @endphp

                                                <select name="sup_id" class="form-control">
                                                	<option disabled="" selected="">Select Supplier</option>

                                                	@foreach($sup as $row)
                                                	<option value="{{ $row->id }}" 
                                                		<?php if ($edit->sup_id == $row->id) {
                                                			echo "selected";
                                                		} ?> >{{ $row->name }}
                                                	</option>
                                                	@endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>Warehouse</label>
                                                <input type="text" class="form-control" name="product_garage" value="{{ $edit->product_garage }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Route</label>
                                                <input type="text" class="form-control" name="product_route" value="{{ $edit->product_route }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" value="{{ $edit->buy_date }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{ $edit->expire_date }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Price (Tk.)</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ $edit->buying_price }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Selling Price (Tk.)</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ $edit->selling_price }}" required>
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label>Upload New Photo</label>
                                                <input type="file" class="form-control upload" name="product_image" accept="image/*" onchange="readURL(this);">
                                            </div>
                                            <div class="form-group">
                                                <label>Existing Photo</label>
                                                <div>
                                                    <img src="{{ URL::to($edit->product_image) }}" style="height: 80px; width: 80px;">
                                                    <input type="hidden" name="old_image" value="{{ $edit->product_image }}">
                                                </div>
                                            </div>
                                           
                                            <button type="submit" class="btn btn-lg btn-success waves-effect waves-light"><i class="fas fa-arrow-circle-up"></i> Update</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

<script type="text/javascript">
	function readURL(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#image')
					.attr('src', e.target.result)
					.width(80)
					.height(80)
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection
