@extends('layouts.master')
@section('content')
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                       <a href="/suppliers-view/" class="btn btn-purple">Back To Suppliers</a>
                </div>
        </div>
            <div class="container-fluid">                 
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Supplier</h1> 
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
                                     <form role="form" action="{{action('SupplierController@update')}}" method="post">
                                     <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                     <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                <div class="col-lg-12">                                    
                                        <fieldset><legend>General Information</legend></fieldset>
                                </div>
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>Supplier Name</label>
                                            <input placeholder="Supplier Name" class="form-control" name="supplier_name" value="<?php echo $row->supplier_name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Code</label>
                                            <input value="<?php echo $row->supplier_code; ?>" disabled="disabled" class="form-control" name="supplier_code" value="<?php echo $row->supplier_code; ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Contact Person Name:</label>
                                            <input placeholder="Contact Person Name" class="form-control" name="contact_person_name" value="<?php echo $row->contact_person_name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number (company):</label>
                                            <input placeholder="Phone Number (company)" class="form-control" name="phone_land" value="<?php echo $row->phone_land; ?>">
                                        </div>
                                        
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone Number (Mobile):</label>
                                            <input placeholder="Phone Number (Mobile)" class="form-control" name="phone_mobile" value="<?php echo $row->phone_mobile; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Fax Number</label>
                                            <input placeholder="Fax Number" class="form-control" name="fax" value="<?php echo $row->fax; ?>">
                                        </div> 
                                       
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input placeholder="Email Address" class="form-control" name="email" value="<?php echo $row->email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Web Address</label>
                                            <input placeholder="Web Address" class="form-control" name="web_address" value="<?php echo $row->web_address; ?>">
                                        </div>
                                </div>
                                <div class="col-lg-12"> <div class="divider">&nbsp;</div> </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                            <legend>Address</legend>
                                        <div class="form-group">
                                            <label> No / Company Name:</label>
                                            <input placeholder="No / Company Name" class="form-control" name="company_name" value="<?php echo $row->company_name; ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label> Street Address</label>
                                            <input placeholder="Street Address" class="form-control" name="address_1" value="<?php echo $row->address_1; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Street Address 2</label>
                                            <input placeholder="Street Address 2" class="form-control" name="address_2" value="<?php echo $row->address_2; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input placeholder="City" class="form-control" name="city" value="<?php echo $row->city; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <input placeholder="District" class="form-control" name="district" value="<?php echo $row->district; ?>">
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
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@stop()