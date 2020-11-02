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
                        <h4 class="pull-left page-title">Edit Expense</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title text-white">Update Expense Information</h3>
                                    </div>

                                    	<div class="badge badge-danger"> DATE: {{ date("d-M-Y") }}</div>

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
                                        <form role="form" action="{{ url('/update-expense/'.$tdy->id) }}" method="POST">
                                        	@csrf

                                        	<div class="form-group">
                                                <label>Expense Details</label>
                                                <textarea class="form-control" rows="4" name="details">
                                                	{{ $tdy->details }}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Amount (Tk.)</label>
                                                <input type="text" class="form-control" name="amount" value="{{ $tdy->amount }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="month" value="{{ date("M") }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="date" value="{{ date("d-M-Y") }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="year" value="{{ date("Y") }}" required>
                                            </div>
                                            
                                           
                                            <button type="submit" class="btn btn-lg btn-success waves-effect waves-light"><i class="fas fa-caret-square-up"></i> Update</button>

                                            {{-- <a href="{{ route('today.expense') }}" class="pull-right btn btn-md btn-danger waves-effect waves-light">Today's Expenses</a>
                                        	<a href="" class="pull-right btn btn-md btn-warning waves-effect waves-light">Monthly Expenses</a> --}}
                                            
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

@endsection
