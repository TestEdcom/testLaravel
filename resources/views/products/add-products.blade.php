@extends('layouts.master')


@section('content')

   
   
            <!-- /.row -->
            <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                        <a href="product-view.html" class="btn btn-purple">Product View</a>
                        <a href="product-category.html" class="btn btn-purple">Product Category</a>
                        <a href="product-sizes.html" class="btn btn-purple">Product Sizes</a>
                        <a href="product-prices.html" class="btn btn-purple">Product Prices</a>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product</h1> 
                </div>

                 </div>
                  
            <!-- /.row -->
            <div class="row clr_row">
                <div class="col-lg-12">
                    <?php if(Session::get('message')){ ?>
                 <div class="col-lg-12">
                        <p  class="alert alert-success" ><?php echo Session::get('message'); ?></p>
                </div>
                <?php } ?>
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
           <div class="modal-body">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12"> 
                          
                            <div class="row">
                                <form role="form" action="{{action('ProductController@save_products')}}" method="post">
                                  <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                 <input type="hidden" name="product_code" value="<?php  echo $next_product_code; ?>">
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                            <legend>Basic</legend>
                                        
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control"  name="product_name" placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input class="form-control"  name="product_code" disabled="disabled" value="<?php echo $next_product_code; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <input class="form-control" name="product_description" placeholder="Product Description">
                                        </div> 
                                        <div class="form-group">
                                            <label>Product Supplier</label>
                                            <input class="form-control" name="product_supplier" placeholder="Product Supplier">
                                        </div>
                                        </fieldset>
                                        
                                        
                                       
                                </div>  
                                 <div class="col-lg-6">
                                    <fieldset>
                                      <legend>Image</legend>
                                      
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" name="product_image" >
                                        </div>
                                    </fieldset>   
                                 </div>
                                 <div class="col-lg-6">
                                    <fieldset>
                                      <legend>Merchandizing</legend>
                                      
                                        <div class="form-group">
                                            <label>Merchandizer Name</label>
                                             <select class="form-control" name="product_merchandizer" >
                                            <?php 
                                            foreach($all_merchandizer as $merchandizer){ 
                                            ?>
                                              <option value="<?php echo $merchandizer->code; ?> "><?php echo $merchandizer->name; ?> </option> 
                                            <?php
                                            }
                                            ?>
                                          
                                               
                                             </select>   
                                              
                                        </div>
                                     </fieldset>  
                                 </div>
                                 
                                 
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

    </div>

    <!-- Add User Popup-->
@stop()