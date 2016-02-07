@extends('layouts.master')


@section('content')

  @if (count($errors) > 0)
 
            <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
            </div>

@endif

@if (Session::has('success'))

 {{ Session::get('success') }}

@endif
@if (Session::has('error'))

{{ Session::get('error') }}

@endif
<p style="color:red" ><?php echo Session::get('message'); ?></p>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Active Clients</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-apple fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Active Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>Quotes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-floppy-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Invoices</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6"> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Payment Summery
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>Total</th>
                                                <th>Last Payment</th>
                                                <th>Balance</th>
                                                <th>Payment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="success">
                                                <td>Cargills</td>
                                                <td>8500</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                            <tr class="info">
                                                  <td>H.A Phamacy</td>
                                                <td>8500</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                            <tr class="warning">
                                                  <td>ABC Cop</td>
                                                <td>8500</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                            <tr class="danger">
                                                  <td>XYZ Pvt Ltd</td>
                                                <td>8500</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                         
                     
                    </div>
                    <!-- /.panel -->
                   
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-6">
                   
                  <div class="panel panel-default">
                            <div class="panel-heading"> 
                                Overdue Invoices

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Client</th>
                                                <th>Last Payment</th>
                                                <th>Balance</th>
                                                <th>Payment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="success">
                                                <td>102345</td>
                                                <td>Cargills</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                            <tr class="info">
                                                 <td>102345</td>
                                                <td>Cargills</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                            <tr class="warning">
                                                <td>102345</td>
                                                <td>Cargills</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                            <tr class="danger">
                                                 <td>102345</td>
                                                <td>Cargills</td>
                                                <td>2000</td>
                                                <td>6500</td> 
                                                <td>2015.12.31</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>  
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@stop()