@extends('layouts.master')


@section('content')

  
 
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                         <a href="/area-view#cities" class="btn btn-purple">Back To City View</a>
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
                                <form role="form" action="{{action('AreaViewController@city_update')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>City Name</label>
                                            <input class="form-control" name="city_name" placeholder="City Name" value="<?php echo $row->city_name; ?>" autocomplete=off>
                                        </div>
                                        <div class="form-group">
                                            <label>City Code</label>
                                            <input class="form-control" name="city_code" disabled="disabled"  value="<?php echo $row->city_code; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>District Name</label>
                                            <select  class="form-control"  name="districts_code" >
                                                 <option value="">Select District</option>
                                                 <?php foreach ($result_district as $district) {
                                                  $district_name = trim($district->districts_name);
                                                  $district_code = trim($district->districts_code);
                                                  ?>
                                                  <option value="<?php echo $district_code; ?>"  <?php if(trim($row->districts_code) == trim($district_code)) { echo "selected='selected'"; } ?> ><?php echo $district_name; ?></option>
                                                  <?php
                                                 }
                                                 ?>
                                            </select>
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