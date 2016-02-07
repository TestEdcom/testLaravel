@extends('layouts.master')
@section('content')
      <div id="page-wrapper">            
            <div class="container-fluid">                
               <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile Details</h1> 
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
                                <form role="form" action="{{action('profileController@update')}}" method="post">
                                 <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>Name</label>                                           
                                            <input placeholder="User Name" class="form-control" name="user_name" value="<?php echo $data['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>                                           
                                            <input placeholder="User Email" class="form-control" name="user_email" value="<?php echo $data['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>                                           
                                            <input placeholder="User Password" type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>                                           
                                            <input placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation">
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