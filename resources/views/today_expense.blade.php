@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
            	@php
            		$date = date("d-M-Y");
            		$expense = DB::table('expenses')->where('date',$date)->sum('amount');
            	@endphp

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Today's Expenses</h4>
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
                                            <a href="{{ route('add.expense') }} " class="btn btn-success waves-effect waves-light">Add Expense  <i class="fa fa-plus"></i></a>                                           
                                        </div>
                                    </div>
                                </div>
                                <h4 style="color: red; font-size: 30px;" align="center">TOTAL: {{ $expense }} /-</h4>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($today as $row)
                                            <tr class="gradeX">
                                            	<td>{{ $row->details }}</td>
                                                <td>{{ $row->amount }}</td>
                                                <td class="actions">
                                                    {{-- <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a> --}}
                                                    <a href="{{ URL::to('edit-today-expense/'.$row->id) }}" class="btn btn-md btn-info"><i class="fas fa-edit"></i> Edit </a>
                                                    {{-- <a id="" href="#" class="btn btn-md btn-success"><i class="fas fa-eye"></i></i></a> --}}
                                                    {{-- <a id="delete" href="{{ URL::to('delete-expense/'.$row->id) }}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt"></i> Delete</a> --}}
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
