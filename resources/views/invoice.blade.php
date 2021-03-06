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
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">NOBI STORE</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="public/companylogo/5c4re.png" alt="velonic" style="width: 80px; height: 60px;"> NOBI STORE</h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>{{ date('d-F-Y') }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                	<h4>CUSTOMER'S DETAILS</h4>
                                                	<hr>
                                                    <address>
                                                      <strong>Customer Name: {{ $customer->name }} </strong><br>
                                                      <strong>Shop Name: {{ $customer->shopname }} </strong><br>
                                                      Email: {{ $customer->email }}<br>
                                                      <abbr title="Phone">Phone:</abbr> {{ $customer->phone }} <br>
                                                      Address: {{ $customer->address }}<br>
                                                      City: {{ $customer->city }}<br>
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date('d-M-Y') }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    {{-- @php
                                                    	$order=DB::table('orders')->select('id')->first();
                                                    @endphp --}}
                                                    <p class="m-t-10"><strong>Order ID: </strong> {{-- {{ $order++ }} --}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total Cost</th>
                                                        </tr></thead>
                                                        <tbody>
                                                        	@php
                                                        		$sl=1;
                                                        	@endphp
                                                        		
                                                        	@foreach($contents as $cont)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $cont->name }}/td>
                                                                <td>{{ $cont->qty }}</td>
                                                                <td>BDT {{ $cont->price }}</td>
                                                                <td>BDT {{ $cont->price*$cont->qty }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>SUB-TOTAL:</b> {{ Cart::subtotal()}} /-</p>
                                                <p class="text-right"><b>DISCOUNT(%):</b> 0</p>
                                                <p class="text-right"><b>VAT(21%):</b> {{ Cart::tax()}} /-</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{ Cart::total() }} /- </h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-lg btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-lg btn-primary waves-effect waves-light">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

            </div> <!-- container -->
                               
                </div> <!-- content -->

            </div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


@endsection
