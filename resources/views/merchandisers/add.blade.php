@extends('layouts.master')
@section('content')
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                        <a href="merchandiser-view/" class="btn btn-purple">Back To Merchandiser</a>
                </div>
        </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Merchandiser</h1> 
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
                                <form role="form" action="{{action('MerchandisersController@save')}}" method="post">
                                 <input type="hidden" name="_token" value="<?= csrf_token() ?>">                                
                                 <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>Merchandiser Name</label>
                                            <input placeholder="Merchandiser Name" name="name" class="form-control">
                                        </div> 
                                        <div class="form-group">
                                            <label>Merchandiser Code</label>
                                            <input value="MERCH<?php echo $data['id']; ?>" disabled="disabled" name="code" class="form-control">
                                        </div> 
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            <input placeholder="Contact No" name="contact_no" class="form-control">
                                        </div> 
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input placeholder="Email" name="email" class="form-control">
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