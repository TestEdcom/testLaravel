@extends('layouts.area-route')


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
            <div class="container-fluid">
                <div class="tab-content">
                <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Area / Route</h1> 
                </div>
                <?php if(Session::get('message')){ ?>
                 <div class="col-lg-12">
                        <p  class="alert alert-success" ><?php echo Session::get('message'); ?></p>
                </div>
                <?php } ?>
                 </div>
                  <ul class="nav nav-tabs tab_view_nav">
                                <li class="active"><a data-toggle="tab" href="/area-view#area" aria-expanded="true">Area</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="/area-view#province" aria-expanded="false">Provinces</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="/area-view#districts" aria-expanded="false">Districts</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="/area-view#cities" aria-expanded="false">Cities</a>
                                </li>
                            </ul>
            <!-- /.row -->
            <div id="area" class="tab-pane fade active in">
            <div class="row clr_row">
                <div class="col-lg-12">
                    <div class="row page-header">
                    <div class="col-lg-12"> 
                       <a class="btn btn-primary" href="/add-area">Add Area</a>


                    </div>
                <!-- /.col-lg-12 -->
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Areas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>Area Code</th>
                                            <th>Area District</th> 
                                            <th>Area City</th>  
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $areas_all = $data['areas'];
                                         
                                        if(isset($areas_all) && $areas_all!=""){ 

                                            foreach($areas_all as $areas){ 
                                               $area_city_all = array();
                                                $area_district_all = array();

                                                $area_name = $areas['area']['area_name'];
                                                $area_code = $areas['area']['area_code'];
                                                $area_id = $areas['area']['area_id'];
                                                $area_cities = $areas['cities'];

                                                 foreach($area_cities as $a_ities){
                                                   
                                                    if(!in_array($a_ities['city_name'],$area_city_all)){
                                                        array_push($area_city_all, $a_ities['city_name']);
                                                    }
                                                    if(!in_array($a_ities['districts_name'],$area_district_all)){
                                                        array_push($area_district_all, $a_ities['districts_name']);
                                                    }
                                                 }
  
                                            ?>
                                            <tr class="odd gradeX">
                                            <td><?php echo $area_name; ?></td>
                                            <td><?php echo $area_code; ?></td>
                                            <td><?php foreach($area_district_all as $district_all){ echo $district_all.'/'; } ?></td> 
                                            <td><?php foreach($area_city_all as $city_all){ echo $city_all.'/'; } ?></td> 
                                            <td class="center"> 
                                            <a href="<?php echo 'edit-area/'.$area_id ; ?>" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                            <a href="<?php echo 'delete-area/'.$area_id ; ?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                            </td>
                                        </tr>
                                            <?php

                                             }

                                             } ?>
                                         
                                        
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

        </div>
            <!-- /.area -->
        <div id="province" class="tab-pane fade ">     
             <div class="row clr_row">
                <div class="col-lg-12">
                    <div class="row page-header">
                    <div class="col-lg-12"> 
                       <a class="btn btn-primary" href="/add-province">Add Province</a>


                    </div>
                <!-- /.col-lg-12 -->
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Provinces
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                            <th>Province Name</th>
                                            <th>Province Code</th> 
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $provinces_all = $data['provinces'];
                                        
                                        if(isset($provinces_all) && $provinces_all!=""){ 

                                            foreach($provinces_all as $provinces){

                                                $province_name = trim($provinces->province_name);
                                                $province_code = trim($provinces->province_code);
                                                $province_id = $provinces->id; 
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $province_name ; ?></td>
                                                    <td><?php echo $province_code ; ?></td> 
                                                   <td class="center"> 
                                                    <a href="<?php echo 'edit-province/'.$province_id ; ?>" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                    <a href="<?php echo 'delete-province/'.$province_id ; ?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                    </td>
                                                </tr>
                                            <?php 
                                            }
                                        }else{ ?>

                                            <tr class="odd gradeX">
                                                <td>  </td>
                                                <td>No Data Found!</td> 
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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>    
            <!-- /.province -->

             <div id="districts" class="tab-pane fade ">    
             <div class="row clr_row">
                <div class="col-lg-12">
                    <div class="row page-header">
                    <div class="col-lg-12"> 
                       <a class="btn btn-primary" href="/add-district">Add District</a>


                    </div>
                <!-- /.col-lg-12 -->
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Districts
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                    <thead>
                                        <tr>
                                            <th>District Name</th>
                                            <th>District Code</th>
                                            <th>Province Name</th> 
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $districts_all = $data['districts'];
                                        
                                        if(isset($districts_all) && $districts_all!=""){ 

                                            foreach($districts_all as $districts){

                                                $districts_name = trim($districts->districts_name);
                                                $districts_code = trim($districts->districts_code);
                                                $districts_province_name = trim($districts->province_name);
                                                $districts_id = $districts->id; 
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $districts_name; ?></td>
                                                    <td><?php echo $districts_code; ?></td> 
                                                    <td><?php echo $districts_province_name; ?></td> 
                                                    <td class="center"> 
                                                    <a href="<?php echo '/edit-district/'.$districts_id; ?>" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                    <a href="<?php echo '/delete-district/'.$districts_id; ?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                    </td> 
                                                </tr>
                                            <?php 
                                            }
                                        }else{ ?>

                                            <tr class="odd gradeX">
                                                <td>  </td>
                                                <td>No Data Found!</td> 
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
                </div>    
                    <!-- /.districts -->

                <div id="cities" class="tab-pane fade ">    
             <div class="row clr_row">
                <div class="col-lg-12">
                    <div class="row page-header">
                    <div class="col-lg-12"> 
                       <a class="btn btn-primary" href="/add-city">Add City</a>


                    </div>
                <!-- /.col-lg-12 -->
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Cities
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                    <thead>
                                        <tr>
                                            <th>City Name</th>
                                            <th>City Code</th>
                                            <th>District Name</th>
                                            <th>Province Name</th> 
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $cities_all = $data['cities'];
                                        
                                        if(isset($cities_all) && $cities_all!=""){ 

                                            foreach($cities_all as $cities){
                                             
                                                $cities_name = trim($cities->city_name);
                                                $cities_code = trim($cities->city_code); 
                                                $cities_province_code = trim($cities->province_code);
                                                $cities_province_name = trim($cities->province_name);
                                                $cities_districts_name = trim($cities->districts_name);
                                                $cities_id = $cities->id; 
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $cities_name; ?></td>
                                                    <td><?php echo $cities_code; ?></td>  
                                                    <td><?php echo $cities_districts_name; ?></td> 
                                                    <td><?php echo $cities_province_name; ?></td> 
                                                    <td class="center"> 
                                                    <a href="<?php echo '/edit-city/'.$cities_id; ?>" class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                    <a href="<?php echo '/delete-city/'.$cities_id; ?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                    </td> 
                                                </tr>
                                            <?php 
                                            }
                                        }else{ ?>

                                            <tr class="odd gradeX">
                                                <td>  </td>
                                                <td>No Data Found!</td> 
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
                </div>    
                    <!-- /.districts -->    

                 </div> <!-- /.tab content -->
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@stop()

  