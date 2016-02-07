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
 
<p style="color:red" ><?php echo Session::get('message'); ?></p>
 
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tax Rates</h1> 
                </div>

                 </div>
                  <div class="row page-header">
                    <div class="col-lg-12"> 
                       <a class="btn btn-primary" href="/tax-add">Add Tax Rates</a>


                    </div>
                <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Tax Rates    
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Tax Rate Name</th>
                                            <th>Tax Rate Percent</th> 
                                            <th>Status</th> 
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        if(isset($data) && $data!=""){
                                            foreach($data as $row){  
                                               $tax_id = $row->id;
                                               $tax_name = $row->tax_name;
                                               $tax_rate = $row->tax_rate;
                                               $tax_status = $row->status;

                                                
                                               $status = CustomHelper::getStatus($tax_status);
                                               

                                             ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $tax_name; ?>  </td>
                                                <td><?php echo $tax_rate; ?>% </td> 
                                                <td><?php echo $status; ?></td> 
                                                <td class="center"> 
                                                    <a href="/tax-edit/<?php echo $tax_id;?> " class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                    <a href="/tax-delete/<?php echo $tax_id;?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                </td>
                                            </tr>
                                        <?php } 

                                        } else { ?>
                                            <tr class="odd gradeX">
                                                <td>  </td>
                                                <td>No Data Found!</td> 
                                                <td class="center"> 
                                                    
                                                </td>
                                            </tr>
                                     <?php
                                        }

                                         ?>
                                        <!-- <tr class="odd gradeX">
                                            <td>Value Added Tax  </td>
                                            <td>1.2% </td> 
                                            <td class="center"> 
                                                <a href="" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                <a href="" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Economic Service Charge </td>
                                            <td>1.1% </td> 
                                            <td class="center"> 
                                                <a href="" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                <a href="" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                           <td>Withholding Taxes </td>
                                            <td>1.0% </td>  
                                            <td class="center"> 
                                                <a href="" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                <a href="" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                           <td>Sales Tax Rate </td>
                                            <td>0.8% </td> 
                                            <td class="center"> 
                                                <a href="" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                <a href="" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                            </td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Corporate Income Tax​ </td>
                                            <td>0.2% </td> 
                                            <td class="center"> 
                                                <a href="" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                <a href="" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                            </td>
                                        </tr> -->
                                        
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
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@stop()