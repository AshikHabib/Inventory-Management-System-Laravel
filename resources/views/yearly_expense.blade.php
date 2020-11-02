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
                        <h4 class="pull-left page-title">Yearly Expenses</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">NOBI STORE</a></li>
                            <li class="active">MD. Aminul Haque</li>
                        </ol>
                    </div>
                </div>
                        <div class="panel panel-info">       
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <h4 class="badge badge-success" style="color: white; font-size: 20px;">Yearly Expense : {{ date("Y") }}</h4>                                           
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expense as $row)
                                            <tr class="gradeX">
                                            	<td>{{ $row->details }}</td>
                                                <td>{{ $row->amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @php
			            		$year = date("Y");
			            		$total = DB::table('expenses')->where('year',$year)->sum('amount');
			            	@endphp
                            <h4 style="color: red; font-size: 25px;" align="center">Yearly Expense Total: {{ $total }} /-</h4>

                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
                </div>
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
