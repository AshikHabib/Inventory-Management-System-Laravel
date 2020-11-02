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
                        <h4 class="pull-left page-title">All Products</h4>
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
                                            {{-- <button href="{{ route('add.employee') }} " id="addToTable" class="btn btn-primary waves-effect waves-light">Add New  <i class="fa fa-plus"></i></button> --}}
                                            <a href="{{ route('add.product') }} " class="btn btn-primary waves-effect waves-light">Add Product <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            {{-- <th>Category</th>
                                            <th>Supplier</th> --}}
                                            <th>Warehouse</th>
                                            <th>Route</th>
                                            <th>Expire Date</th>
                                            <th>Selling Price (Tk.)</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product as $row)
                                            <tr class="gradeX">
                                                <td>{{ $row->product_name }}</td>
                                                <td>{{ $row->product_code }}</td>
                                                {{-- <td>{{ $row->cat_id }}</td>
                                                <td>{{ $row->sup_id }}</td> --}}
                                                <td>{{ $row->product_garage }}</td>
                                                <td>{{ $row->product_route }}</td>
                                                <td>{{ $row->expire_date }}</td>
                                                <td>{{ $row->selling_price }}</td>
                                                <td><img src="{{ $row->product_image }}" style="width: 60px; height:60px;"></td>
                                                <td class="actions">
                                                    {{-- <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a> --}}
                                                    <a href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-md btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                    <a id="" href="{{ URL::to('view-product/'.$row->id) }}" class="btn btn-md btn-success"><i class="fas fa-eye"></i> View</a>
                                                    <a id="delete" href="{{ URL::to('delete-product/'.$row->id) }}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
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
