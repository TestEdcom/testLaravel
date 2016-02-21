@extends('layouts.master')


@section('content')

  
 
      <div id="page-wrapper">
            <div class="row clr_row sub_menu_bar">
                <div class="col-lg-12">
                        <a href="/product-sizes" class="btn btn-purple">Back To Product Sizes</a>
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
                                <form role="form" action="{{action('ProductController@psize_update')}}" method="post">
                                 <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                 <input type="hidden" name="id" value="<?php echo $row->id; ?>"> 
                                 <input type="hidden" name="p_size_code" value="<?php echo $row->p_size_code; ?>">
                                <div class="col-lg-6">        
                                        <div class="form-group">
                                            <label>Size Name</label>
                                            <input class="form-control" name="p_size_name" value="<?php echo $row->p_size_name; ?>" placeholder="Size Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Size Code</label>
                                            <input class="form-control" name="p_size_code" disabled="disabled"  value="<?php echo $row->p_size_code; ?>"> 
                                        </div>
                                         <div class="form-group">
                                            <label>Size Description</label>
                                            <textarea class="form-control" name="p_size_description" placeholder="Size Description"><?php echo $row->p_size_description; ?></textarea>
                                        </div> 
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="1"  <?php if(trim($row->status) == 1) { echo "selected='selected'"; } ?> >Active</option>
                                                <option value="0"  <?php if(trim($row->status) == 0 ) { echo "selected='selected'"; } ?> >Deactive</option>
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