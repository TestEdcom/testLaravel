@extends('layouts.master')
@section('content')
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                       <a href="/payment-view/" class="btn btn-purple">Back To Payment Methods</a>
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
<p style="color:red" ><?php echo Session::get('message'); ?></p>      
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    
           <div class="modal-body">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12"> 
                          
                            <div class="row">
                                <form role="form" action="{{action('PaymentController@update')}}" method="post">
                                 <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                 <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                <div class="col-lg-6">        
                                        <div class="form-group">                                            
                                            <label>Payment Method Name</label>                                           
                                            <input placeholder="Payment Method Name" class="form-control" name="payment_name" value="<?php echo $row->payment_name; ?>">
                                            
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
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@stop()