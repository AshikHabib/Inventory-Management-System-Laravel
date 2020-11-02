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
                        <h4 class="pull-left page-title">All Attendance</h4>
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
                                            {{-- <button href="{{ route('add.customer') }}" id="addToTable" class="btn btn-primary waves-effect waves-light">Add New  <i class="fa fa-plus"></i></button> --}}
                                            <a href="{{ route('take.attendance') }} " class="btn btn-success waves-effect waves-light">Take Attendance  <i class="fas fa-user-check"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                        	<th>SL</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@php
                                    		$sl=1;
                                    	@endphp

                                        @foreach($all_att as $row)
                                            <tr class="gradeX">
                                            	<td>{{ $sl++ }}</td>
                                                <td>{{ $row->edit_date }}</td>
                                                <td class="actions">
                                                    {{-- <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a> --}}
                                                    <a href="{{ URL::to('edit-attendance/'.$row->$edit_date) }}" class="btn btn-md btn-info"><i class="fas fa-edit"></i> Edit </a>

                                                    <a href="{{ URL::to('view-attendance/'.$row->$edit_date) }}" class="btn btn-md btn-success"><i class="fas fa-eye"></i> View</a>

                                                    <a id="delete" href="{{ URL::to('delete-attendance/'.$row->$edit_date) }}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
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
