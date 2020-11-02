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
                        <h4 class="pull-left page-title">Company Information Settings</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title text-white">Company Information Settings</h3></div>
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
                                        <form role="form" action="{{ url('/update-website/'.$setting->id) }}" method="POST" enctype="multipart/form-data">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Company Address</label>
                                                <input type="text" class="form-control" name="company_address" value="{{ $setting->company_address }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Company Phone</label>
                                                <input type="text" class="form-control" name="company_phone" value="{{ $setting->company_phone }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Company Email Address</label>
                                                <input type="email" class="form-control" name="company_email" value="{{ $setting->company_email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Company City</label>
                                                <input type="text" class="form-control" name="company_city" value="{{ $setting->company_city }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Company Country</label>
                                                <input type="text" class="form-control" name="company_country" value="{{ $setting->company_country }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Company ZipCode</label>
                                                <input type="text" class="form-control" name="company_zipcode" value="{{ $setting->company_zipcode }}" required>
                                            </div>

                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label>Upload New Photo</label>
                                                <input type="file" class="form-control upload" name="company_logo" accept="image/*" onchange="readURL(this);">
                                            </div>

                                            <div class="form-group">
                                                <label>Existing Photo</label>
                                                <div>
                                                    <img src="{{ URL::to($setting->company_logo) }}" style="height: 80px; width: 80px;">
                                                    <input type="hidden" name="old_photo" value="{{ $setting->company_logo }}">
                                                </div>
                                            </div>
                                           
                                            <button type="submit" class="btn btn-lg btn-success waves-effect waves-light">Update</button>
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
