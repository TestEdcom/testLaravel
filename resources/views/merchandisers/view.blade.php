@extends('layouts.master')


@section('content')

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
 
<div id="page-wrapper" style="min-height: 648px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Merchandisers</h1> 
            </div>

        </div>
        <div class="row page-header">
            <div class="col-lg-12"> 
                <a href="/merchandiser-add" class="btn btn-primary">Add Merchandiser</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row clr_row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Merchandisers </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
                                            <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 214px;" aria-label="Name: activate to sort column ascending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 229px;" aria-label="Code: activate to sort column ascending">Code</th>                                            
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 365px;" aria-label="Email: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 326px;" aria-label="Contact No: activate to sort column ascending">Contact No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 227px;" aria-label="Action: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                <?php
                                                if (isset($data) && $data != "") {
                                                    foreach ($data as $row) {
                                                        $tax_id = $row->id;                                                      
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo  $row->name; ?>  </td>
                                                            <td><?php echo  $row->code; ?>  </td>
                                                            <td><?php echo  $row->email; ?>  </td>
                                                            <td><?php echo  $row->contact_no; ?>  </td>                                                            
                                                            <td class="center"> 
                                                                <a href="/merchandiser-edit/<?php echo $tax_id; ?> " class="btn btn-primary btn-xs"> <span class="fa fa-pencil" ></span></a>
                                                                <a href="/merchandiser-delete/<?php echo $tax_id; ?>" class="btn btn-danger btn-xs">  <span class="fa fa-times " ></span> </a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } else {
                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td>  </td>
                                                        <td>No Data Found!</td> 
                                                        <td class="center"> 

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>
        <!-- /#page-wrapper -->
@stop()