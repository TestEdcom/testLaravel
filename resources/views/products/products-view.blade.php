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
        
        <div id="page-wrapper">
             <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                         <a href="/products-add" class="btn btn-purple">Add Size</a> 
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Products View</h1> 
                </div>
                 <?php if(Session::get('message')){ ?>
                 <div class="col-lg-12">
                        <p  class="alert alert-success" ><?php echo Session::get('message'); ?></p>
                </div>
                <?php } ?>    
                 </div>
                  
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Description</th> 
                                            <th>Supplier</th>
                                            <th>Merchandizer</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($data) && $data!=""){
                                            foreach($data as $row){  
                                               $id = $row->id;
                                               $product_code = $row->product_code;
                                               $product_name = $row->product_name;
                                               $product_description  = $row->product_description;
                                               $product_supplier  = $row->product_supplier;
                                               $product_merchandizer  = $row->product_merchandizer;
                                               $status = $row->status;

                                                
                                               $status = CustomHelper::getStatus($status);
                                               

                                             ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $product_name; ?>  </td>
                                                <td><?php echo $product_code; ?></td> 
                                                <td><?php echo $product_description; ?> </td> 
                                                <td><?php echo $product_supplier; ?> </td> 
                                                <td><?php echo $product_merchandizer; ?> </td> 
                                                <td><?php echo $status; ?></td> 
                                                <td class="center"> 
                                                    <a href="/product-edit/<?php echo $id;?> " class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                    <a href="/product-delete/<?php echo $id;?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                </td>
                                            </tr>
                                        <?php } 

                                        } else { ?>
                                            <tr class="odd gradeX">
                                                <td>  </td>
                                                <td>  </td>
                                                <td>No Data Found!</td> 
                                                <td>  </td>
                                                <td>  </td>
                                                <td>  </td>
                                                <td class="center"> 
                                                    
                                                </td>
                                            </tr>
                                     <?php
                                        }

                                         ?>
                                         
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
        <!-- /#page-wrapper  -->
@stop()