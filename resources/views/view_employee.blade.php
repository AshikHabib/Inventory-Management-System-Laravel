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
                        <h4 class="pull-left page-title">View Employee</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Employee Details</h3></div>
                                    <div class="panel-body">
                                        	<div class="form-group">
                                                <label>Name</label>
                                                    <p>{{ $single->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
                                                    <p>{{ $single->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                    <p>{{ $single->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                    <p>{{ $single->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Experience</label>
                                                    <p>{{ $single->experience }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Salary</label>
                                                    <p>{{ $single->salary }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Vacation</label>
                                                    <p>{{ $single->vacation }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                    <p>{{ $single->city }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <div>
                                                    <img style="height: 80px; width: 80px;" src="{{ URL::to($single->photo) }}">
                                                </div>
                                            </div>
                                           
                                            <button type="button" class="btn btn-purple waves-effect waves-light">Go Back</button>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
