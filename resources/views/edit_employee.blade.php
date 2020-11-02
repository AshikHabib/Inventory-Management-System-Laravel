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
                        <h4 class="pull-left page-title">Update Employee Information</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Edit Employee Details</h3></div>
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
                                        <form role="form" action="{{ url('/update-employee/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $edit->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
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
                                                <label>Experience</label>
                                                <input type="text" class="form-control" name="experience" value="{{ $edit->experience }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Salary</label>
                                                <input type="text" class="form-control" name="salary" value="{{ $edit->salary }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Vacation</label>
                                                <input type="text" class="form-control" name="vacation" value="{{ $edit->vacation }}" required>
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
                                                    <img src="{{ URL::to($edit->photo) }}" style="height: 80px; width: 80px;">
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
