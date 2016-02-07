@extends('layouts.master')
@section('content')
      <div id="page-wrapper">            
            <div class="container-fluid">                
               <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings Details</h1> 
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
<p style="color:red" ><?php echo Session::get('message'); ?></p>      
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">                 
           <div class="modal-body">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">                           
                            <div class="row">
                                <form role="form" action="{{action('settingController@update')}}" method="post">
                                 <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>Company Name</label>                                           
                                            <input placeholder="Company Name" class="form-control" name="company_name" value="<?php echo (isset($data['company_name']))?$data['company_name']:''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>                                           
                                            <input placeholder="Address" class="form-control" name="company_address" value="<?php echo (isset($data['company_address']))?$data['company_address']:''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>                                           
                                            <input placeholder="Email" class="form-control" name="company_email" value="<?php echo (isset($data['company_email']))?$data['company_email']:''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>                                           
                                            <input placeholder="Telephone" class="form-control" name="company_phone" value="<?php echo (isset($data['company_phone']))?$data['company_phone']:''; ?>">
                                        </div>
                                        
                                </div>                                 
                                <div class="col-lg-12"> <div class="divider">&nbsp</div> </div>                                    
                                 <div class="col-lg-12">
                                    <div class="divider">&nbsp</div> 
                                 <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                 </div> 
                                 </form>
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