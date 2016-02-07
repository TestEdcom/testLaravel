@extends('layouts.master')
@section('content')
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                        <a href="salesperson-view/" class="btn btn-purple">Back To Sales Persons</a>
                </div>
        </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Sales Person</h1> 
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
                                <form role="form" action="{{action('SalesPersonController@save')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token() ?>">   
                                <div class="col-lg-12">                                    
                                        <fieldset>
                                            <legend>General Information</legend>
                                </fieldset></div>
                                <div class="col-lg-12">        
                                        <div class="form-group">
                                            <label>Sales Person Name</label>
                                            <input placeholder="Sales Person Name" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Sales Person Code</label>
                                            <input value="<?php echo $data['id']; ?>" disabled="disabled" class="form-control" name="salesperson_code">
                                        </div> 
                                        <div class="form-group">
                                            <label>Phone Number (company):</label>
                                            <input placeholder="Phone Number (company)" class="form-control" name="phone_land">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number (Mobile):</label>
                                            <input placeholder="Phone Number (Mobile)" class="form-control" name="phone_mobile">
                                        </div>  
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input placeholder="Email Address" class="form-control" name="email">
                                        </div>                                         
                                </div>
                                 
                                <div class="col-lg-12"> <div class="divider">&nbsp;</div> </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                            <legend>Area / Routes </legend>
                                            <div class="col-lg-6">
                                                <label>Route 1</label>
                                                <ul>
                                                    <li>Galle Road <input type="checkbox"></li>
                                                    <li>Mathugama <input type="checkbox"></li>
                                                    <li>Rathanapura/Nuwara Eliya/Badulla <input type="checkbox"></li> 
                                                </ul>
                                            </div>  
                                            <div class="col-lg-6">
                                                <label>Route 2</label>
                                                <ul>
                                                    <li>Vauniya <input type="checkbox"></li>
                                                    <li>Trincomalee <input type="checkbox"></li>
                                                    <li>Polonnaruwa <input type="checkbox"></li> 
                                                </ul>
                                            </div>    
                                        </fieldset>
                                </div>    
                                 <div class="col-lg-12">
                                    <div class="divider">&nbsp;</div> 
                                 <button class="btn btn-default" type="submit">Submit Button</button>
                                        <button class="btn btn-default" type="reset">Reset Button</button>
                                    
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