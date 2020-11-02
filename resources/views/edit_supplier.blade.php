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
                        <h4 class="pull-left page-title">Update Supplier Information</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Edit Supplier Details</h3></div>
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
                                        <form role="form" action="{{ url('/update-supplier/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $edit->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" name="email" value="{{ $edit->email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $edit->phone }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ $edit->address }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="type" class="form-control">
                                                	<option value="{{ $edit->type }}">{{ $edit->type }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="shopname" value="{{ $edit->shopname }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Holder</label>
                                                <input type="text" class="form-control" name="accountHolder" value="{{ $edit->accountHolder }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" class="form-control" name="accountNumber" value="{{ $edit->accountNumber }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control" name="bankName" value="{{ $edit->bankName }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Branch</label>
                                                <input type="text" class="form-control" name="bankBranch" value="{{ $edit->bankBranch }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" value="{{ $edit->city }}" required>
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label>Upload New Photo</label>
                                                <input type="file" class="form-control upload" name="photo" accept="image/*" onchange="readURL(this);">
                                            </div>
                                            <div class="form-group">
                                                <label>Existing Photo</label>
                                                <div>
                                                    <img src="{{ URL::to($edit->photo) }}" style="height: 80px; width: 80px;"/>
                                                    <input type="hidden" name="old_photo" value="{{ $edit->photo }}">
                                                </div>
                                            </div>
                                           
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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
