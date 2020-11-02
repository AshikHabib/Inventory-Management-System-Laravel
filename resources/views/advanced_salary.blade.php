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
                        <h4 class="pull-left page-title">Provide Advance Salary</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title text-white">Provide Advance Salary</h3></div>
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
                                        <form role="form" action="{{ url('/insert-advanced-salary') }}" method="POST" enctype="multipart/form-data">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Choose Employee</label>
                                                @php
                                                	$emp=DB::table('employees')->get();
                                                @endphp
                                                <select name="emp_id" class="form-control" required>
                                                	<option value="" disabled="" selected="">Choose Employee</option>
                                                	@foreach($emp as $row)
                                                	<option value="{{ $row->id }}" > {{ $row->name }} </option>
                                                	@endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Month</label>
                                                <select name="month" class="form-control" required>
                                                	<option value="" disabled="" selected="">Choose Month</option>
                                                	<option value="January">January</option>
                                                	<option value="February">February</option>
                                                	<option value="March">March</option>
                                                	<option value="April">April</option>
                                                	<option value="May">May</option>
                                                	<option value="June">June</option>
                                                	<option value="July">July</option>
                                                	<option value="August">August</option>
                                                	<option value="September">September</option>
                                                	<option value="October">October</option>
                                                	<option value="November">November</option>
                                                	<option value="December">December</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Year</label>
                                                <input type="text" class="form-control" name="year" placeholder="Year" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Advanced Salary</label>
                                                <input type="text" class="form-control" name="advanced_salary" placeholder="Amount (Tk.)" required>
                                            </div>
                                            <div class="form-group">  

                                            <button type="submit" class="btn btn-lg btn-success waves-effect waves-light">PAY</button>
                                            <a href="{{ route('all.advancedsalary') }}" class="btn btn-lg btn-info waves-effect waves-light">Show All Advanced</a>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
