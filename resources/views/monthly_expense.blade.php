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
                        <h4 class="pull-left page-title">Monthly Expenses</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">NOBI STORE</a></li>
                            <li class="active">MD. Aminul Haque</li>
                        </ol>
                    </div>
                </div>
                <div>
                    <a href="{{ route('january.expense') }}" class="btn btn-md btn-info">January</a>
                    <a href="{{ route('february.expense') }}" class="btn btn-md btn-danger">February</a>
                    <a href="{{ route('march.expense') }}" class="btn btn-md btn-success">March</a>
                    <a href="{{ route('april.expense') }}" class="btn btn-md btn-primary">April</a>
                    <a href="{{ route('may.expense') }}" class="btn btn-md btn-warning">May</a>
                    <a href="{{ route('june.expense') }}" class="btn btn-md btn-info">June</a>
                    <a href="{{ route('july.expense') }}" class="btn btn-md btn-danger">July</a>
                    <a href="{{ route('august.expense') }}" class="btn btn-md btn-success">August</a>
                    <a href="{{ route('september.expense') }}" class="btn btn-md btn-primary">September</a>
                    <a href="{{ route('october.expense') }}" class="btn btn-md btn-warning">October</a>
                    <a href="{{ route('november.expense') }}" class="btn btn-md btn-info">November</a>
                    <a href="{{ route('december.expense') }}" class="btn btn-md btn-danger">December</a>
                </div>
                        <div class="panel panel-info">       
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <h4 class="badge badge-success" style="color: white; font-size: 20px;">Monthly Expense : {{ date("Y") }}</h4>                                           
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expense as $row)
                                            <tr class="gradeX">
                                                <td>{{ $row->date }}</td>
                                            	<td>{{ $row->details }}</td>
                                                <td>{{ $row->amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @php
			            		$month = date("M");
			            		$total = DB::table('expenses')->where('month',$month)->sum('amount');
			            	@endphp
                            <h4 style="color: red; font-size: 25px;" align="center">TOTAL: {{ $total }} /-</h4>

                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
                </div>
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
