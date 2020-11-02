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
                        <h4 class="pull-left page-title">All Customers</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">NOBI STORE</a></li>
                            <li class="active">MD. Aminul Haque</li>
                        </ol>
                    </div>
                </div>
                        <div class="panel">
                            
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            {{-- <button href="{{ route('add.customer') }}" id="addToTable" class="btn btn-primary waves-effect waves-light">Add New  <i class="fa fa-plus"></i></button> --}}
                                            <a href="{{ route('add.customer') }} " class="btn btn-primary waves-effect waves-light">Add New <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Shop Name</th>
                                            <th>Account Holder</th>
                                            <th>Account Number</th>
                                            <th>Bank Name</th>
                                            <th>Bank Branch</th>
                                            <th>City</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customers as $row)
                                            <tr class="gradeX">
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->shopname }}</td>
                                                <td>{{ $row->account_holder }}</td>
                                                <td>{{ $row->account_number }}</td>
                                                <td>{{ $row->bank_name }}</td>
                                                <td>{{ $row->bank_branch }}</td>
                                                <td>{{ $row->city }}</td>
                                                <td><img src="{{ $row->photo }}" style="width: 60px; height:60px;"></td>
                                                <td class="actions">
                                                    <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                                                    <a href="{{ URL::to('edit-customer/'.$row->id) }}" class="btn btn-md btn-info"><i class="fas fa-edit"></i></a>
                                                    <a id="" href="{{ URL::to('view-customer/'.$row->id) }}" class="btn btn-md btn-success"><i class="fas fa-eye"></i></i></a>
                                                    <a id="delete" href="{{ URL::to('delete-customer/'.$row->id) }}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt"></i></a>
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
