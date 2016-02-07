@extends('layouts.master')


@section('content')

  
 
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                         <a href="/area-view#districts" class="btn btn-purple">Back To District View</a>
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
                                <form role="form" action="{{action('AreaViewController@district_update')}}" method="post">
                                 <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                 <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                 <input type="hidden" name="districts_code" value="<?php echo $row->districts_code; ?>">
                                <div class="col-lg-6">  
                                 <div class="form-group">
                                            <label>District Name</label>
                                            <input class="form-control" name="districts_name" value="<?php echo trim($row->districts_name); ?>" placeholder="District Name">
                                        </div>
                                        <div class="form-group">
                                            <label>District Code</label>
                                            <input class="form-control" name="districts_code" disabled="disabled"  value="<?php echo trim($row->districts_code); ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Province Name</label>
                                            <select  class="form-control"  name="province_code" >
                                                 <option value="">Select Province</option>
                                                 <?php 
                                                 foreach ($result_province as $province) {
                                                  $province_name = trim($province->province_name);
                                                  $province_code = trim($province->province_code);
                                                  ?>
                                                  <option value="<?php echo $province_code; ?>" <?php if(trim($row->province_name) == trim($province_name)) { echo "selected='selected'"; } ?> ><?php echo $province_name; ?></option>
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