@extends('layouts.master')


@section('content')

  
 
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                        <a href="/area-view#cities" class="btn btn-purple">Back To District View</a>
                </div>
        </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add District</h1> 
                    </div>

                 </div>
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
    
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    
           <div class="modal-body">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12"> 
                          
                            <div class="row">
                                <form role="form" action="{{action('AreaViewController@city_save')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <input type="hidden" name="city_code" value="<?php  echo $next_city_code; ?>">
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>City Name</label>
                                            <input class="form-control" name="city_name" placeholder="City Name" autocomplete=off>
                                        </div>
                                        <div class="form-group">
                                            <label>City Code</label>
                                            <input class="form-control" name="city_code" disabled="disabled"  value="<?php  echo $next_city_code; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Province Name</label>
                                            <select  class="form-control"  name="province_code" class="province_code">
                                                 <option value="">Select Province</option>
                                                 <?php foreach ($result_province as $province) {
                                                  $province_name = trim($province->province_name);
                                                  $province_code = trim($province->province_code);
                                                  ?>
                                                  <option value="<?php echo $province_code; ?>"><?php echo $province_name; ?></option>
                                                  <?php
                                                 }
                                                 ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>District Name</label>
                                            <select  class="form-control"  name="district_code" >
                                                 <option value="">Select District</option>
                                                 <?php foreach ($result_district as $district) {
                                                  $district_name = trim($district->districts_name);
                                                  $district_code = trim($district->districts_code);
                                                  ?>
                                                  <option value="<?php echo $district_code; ?>"><?php echo $district_name; ?></option>
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