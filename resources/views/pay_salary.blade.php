@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">PAY SALARIES</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">NOBI STORE</a></li>
                            <li class="active">MD. Aminul Haque</li>
                        </ol>
                    </div>
                </div>
                	<h3 class="text-danger">Date: {{ date("F Y") }}</h3>
                        <div class="panel panel-info">       
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            {{-- <button href="{{ route('add.customer') }}" id="addToTable" class="btn btn-primary waves-effect waves-light">Add New  <i class="fa fa-plus"></i></button> --}}
                                            {{-- <a href="{{ route('add.advancedsalary') }} " class="btn btn-success waves-effect waves-light">Pay New <i class="fa fa-plus"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Salary (Tk.)</th>
                                            <th>Month</th>
                                            <th>Advanced Amount (Tk.)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <!--RETURN ADVANCED SALARIES OF EMPLOYEES-->

                                    {{-- START --}}
                                    @php
                                    $month= date("F", strtotime('-1 month'));

							        $salary=DB::table('advanced_salaries')
							                ->join('employees','advanced_salaries.emp_id','employees.id')
							                ->select('advanced_salaries.*','employees.name','employees.salary','employees.photo')
							                ->where('month',$month)
							                ->get();
							        @endphp
							        {{-- END --}}

                                    <tbody>
                                        @foreach($employee as $row)
                                            <tr class="gradeX">
                                                <td>{{ $row->name }}</td>
                                                <td><img src="{{ $row->photo }}" style="width: 60px; height:60px;"></td>
                                                <td>{{ $row->salary }}</td>
                                                <td> <span class="badge badge-success">{{ date("F", strtotime('-1 month')) }}</span> </td>
                                                <td></td>
                                                <td class="actions">
                                                    <a href="#" class="btn btn-md btn-primary"><i class="fab fa-paypal"></i>  Pay Now</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
                </div>
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
