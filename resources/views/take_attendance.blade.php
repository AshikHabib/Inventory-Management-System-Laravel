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
                        <h4 class="pull-left page-title">Take Attendance</h4>
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
                                            {{-- <button href="{{ route('add.employee') }} " id="addToTable" class="btn btn-primary waves-effect waves-light">Add New  <i class="fa fa-plus"></i></button> --}}
                                            <h4 class="badge badge-success" style="color: white; font-size: 20px;">Date : {{ date("d-M-Y") }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <form action="{{ url('/insert-attendance') }}"  method="POST">
                                    @csrf
	                                        @foreach($employee as $row)
	                                            <tr>
	                                                <td>{{ $row->name }}</td>
	                                                <td><img src="{{ $row->photo }}" style="width: 60px; height:60px;"></td>
	                                            <input type="hidden" name="user_id[]" value="{{ $row->id }}">
	                                                <td>
	                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Present" required> Present
	                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Absent" required> Absent
	                                                </td>
	                                            <input type="hidden" name="att_date" value="{{ date("d-M-Y") }}">
	                                            <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                                <input type="hidden" name="motnh" value="{{ date("F") }}">
	                                            </tr>
	                                        @endforeach
                                    </tbody>
                                </table>
                                	<button type="submit" class="btn btn-lg btn-success">Take Attendance</button>
                                    <a href="{{ route('all.attendance') }} " class="btn btn-lg btn-info waves-effect waves-light">Show All Attendance</a>
                                </form>
                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
                </div>
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
