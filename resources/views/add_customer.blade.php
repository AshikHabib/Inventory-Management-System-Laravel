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
                        <h4 class="pull-left page-title">Add Customers</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Add New Customer</h3></div>
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
                                        <form role="form" action="{{ url('/insert-customer') }}" method="POST" enctype="multipart/form-data">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="shopname" placeholder="Shop Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Holder</label>
                                                <input type="text" class="form-control" name="account_holder" placeholder="Account Holder" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" class="form-control" name="account_number" placeholder="Account Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Branch</label>
                                                <input type="text" class="form-control" name="bank_branch" placeholder="Bank Branch" required>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" required>
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label>Photo</label>
                                                <input type="file" class="form-control upload" name="photo" accept="image/*" required onchange="readURL(this);">
                                            </div>
                                           
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Save</button>
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
