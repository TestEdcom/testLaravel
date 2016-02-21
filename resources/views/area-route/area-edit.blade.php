@extends('layouts.area-route')


@section('content')

  
 
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                         <a href="/area-view#area" class="btn btn-purple">Back To Area View</a>
                </div>
        </div>
            <div class="container-fluid">
                 
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
 </div>     
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    
           <div class="modal-body">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12"> 
                          
                             <div class="row">
                                <form role="form" action="{{action('AreaViewController@area_update')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                <input type="hidden" name="area_code" value="<?php echo $row->area_code; ?>">
                                <?php
                                $selected_cities_all ="";
                                foreach($selected_cities_array as  $selected_cities){ 
                                    $selected_cities_all .= $selected_cities.',';
                                  }
                                  $selected_cities_all = rtrim($selected_cities_all,',');
                                  //var_dump( $selected_cities_all);
                                ?>
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>Area Name</label>
                                            <input class="form-control" name="area_name" value="<?php echo $row->area_name; ?>" autocomplete=off>
                                        </div>
                                        <div class="form-group">
                                            <label>Area Code</label>
                                            <input class="form-control" name="area_code" disabled="disabled"  value="<?php echo $row->area_code; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="1"  <?php if(trim($row->status) == 1) { echo "selected='selected'"; } ?> >Active</option>
                                                <option value="0"  <?php if(trim($row->status) == 0 ) { echo "selected='selected'"; } ?> >Deactive</option>
                                             </select>   
                                        </div>
                                </div>
                                 
                                <div class="col-lg-12"> 
                                     <div class="form-group"> 
                                            <label>District & Cities</label>
                                            <input type="hidden" class="selected_cities" value="<?php echo $selected_cities_all; ?>" name="selected_cities" />
                                            <div class="panel-group cities_pool" id="accordion">
                                                <?php 
                                                    $countdiv = 1;
                                                    if(isset($all_distrcts_cities) && $all_distrcts_cities!=""){
                                                    foreach ($all_distrcts_cities as $distrcts_cities) {
                                                      $district =  $distrcts_cities['district'];
                                                      $cities =  $distrcts_cities['cities']; 
                                                      ?>
                                                       <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                                <?php if (sizeof($cities)!=0){ ?>
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $countdiv; ?>" >
                                                                    <?php } ?>
                                                                    <h4 class="panel-title">
                                                                        Distrct : <?php echo $district['districts_name']?> 
                                                                    </h4>
                                                                <?php if (sizeof($cities)!=0){ ?>
                                                                </a>
                                                                <?php } ?>
                                                        </div>  
                                                         <div id="collapse<?php echo $countdiv; ?>" class="panel-collapse <?php echo ($countdiv==1?'collapse in':'collapse '); ?>">
                                                                <div class="panel-body">
                                                          <?php  
                                                          if(!empty($cities) || $cities!="" || sizeof($cities)!=0){
                                                          foreach($cities as $city): 
                                                           $city_id =  $city->id;
                                                           $city_name =   $city->city_name;
                                                           $city_code =   $city->city_code;
                                                           $checked = in_array($city_code,$selected_cities_array); 
                                                          ?>
                                                         
                                                                    <div class="col-lg-8"> 
                                                                      <h5><?php echo $city_name; ?></h5>
                                                                    </div>  
                                                                    <div class="col-lg-2"> 
                                                                      <input type="checkbox" class="edit_city_checkbox" value="<?php echo $city_code; ?>" <?php echo ($checked?"checked='chcked'":''); ?> name="" />
                                                                    </div>
                                                              
                                                           
                                                          <?php 
                                                            endforeach;
                                                            }else {   ?>
                                                                <div class="col-lg-8"> 
                                                                      <h5>No Saved City For District : <?php echo $district['districts_name']?>.Please Contact Administrator.</h5>
                                                                    </div> 
                                                            <?php
                                                            }   
                                                           ?>
                                                              </div>
                                                            </div> 
                                                      </div>  
                                                      <?php
                                                      $countdiv++;
                                                     }

                                                 }
                                                     ?> 
                                                 
                                                
                                               
                                                </div> 
                                          </div>  
                                        </div>
                                        <div class="col-lg-12"> <div class="divider">&nbsp</div> </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="divider">&nbsp</div> 
                                            <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </form>
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