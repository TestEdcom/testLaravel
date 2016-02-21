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
  
 
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                         <a href="psize-add/" class="btn btn-purple">Add Size</a> 
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Sizes</h1> 
                </div>

                 </div>
                   <?php if(Session::get('message')){ ?>
                 <div class="col-lg-12">
                        <p  class="alert alert-success" ><?php echo Session::get('message'); ?></p>
                </div>
                <?php } ?>    
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    
           <div class="modal-body">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12"> 
                          
            <div class="row">
                 
                <div class="col-lg-12"> 
                      
                       <div class="panel panel-default">
                        <div class="panel-heading">
                            All Sizes
                        </div>
                        <!-- /.panel-heading --> 
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
                                            <th>Size Name</th> 
                                            <th>Size Code</th>
                                            <th>Description</th>  
                                            <th>Status</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                        if(isset($data) && $data!=""){
                                            foreach($data as $row){  
                                               $p_size_id = $row->id;
                                               $p_size_name = $row->p_size_name;
                                               $p_size_code = $row->p_size_code;
                                               $p_size_description = $row->p_size_description;
                                               $status = $row->status;

                                                
                                               $status = CustomHelper::getStatus($status);
                                               

                                             ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $p_size_name; ?>  </td>
                                                <td><?php echo $p_size_code; ?></td> 
                                                <td><?php echo $p_size_description; ?> </td> 
                                                <td><?php echo $status; ?></td> 
                                                <td class="center"> 
                                                    <a href="/psize-edit/<?php echo $p_size_id;?> " class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                    <a href="/psize-delete/<?php echo $p_size_id;?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                </td>
                                            </tr>
                                        <?php } 

                                        } else { ?>
                                            <tr class="odd gradeX">
                                                <td>  </td>
                                                <td>  </td>
                                                <td>No Data Found!</td> 
                                                <td>  </td>
                                                <td class="center"> 
                                                    
                                                </td>
                                            </tr>
                                     <?php
                                        }

                                         ?>
                                         
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div> 
                 </div>
                    
            </div>
                            <!-- /.row (nested) -->
                       
                    
                </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                </div>

                </div>

                </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@stop()