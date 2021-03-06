<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('assets/bower_components/metisMenu/dist/metisMenu.min.css') }} " rel="stylesheet">

      <link href="{{asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }} " rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('assets/bower_components/datatables-responsive/css/dataTables.responsive.css') }} " rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/dist/css/sb-admin-2.css') }} " rel="stylesheet">

    <!-- Fancybox CSS -->
    <link href="{{asset('assets/dist/css/jquery.fancybox.css') }} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-purple navbar-static-top" role="navigation" style="margin-bottom: 0">
             <div class="navbar-header-upper"  >
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><h4>EdCom<sup>ERP</sup></h4></a>
                </div>
                <!-- /.navbar-header -->
              </div>
            <!-- /.navbar-top-links -->  
            <ul class="nav navbar-top-links navbar-right">
                
                 
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> Master Data <i class="fa fa-caret-down"></i>
                    </a>
                   <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="/suppliers-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Suppliers
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li> 
                        <li>
                            <a href="/salesperson-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>  Sales Persons
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/tax-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>  Tax Rates
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="brand-view.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Brands
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/channel-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Channels (Sale Type)
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/area-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Areas / Routes
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/payment-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Payment Methods
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                         <li>
                            <a href="/merchandiser-view">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Merchandiser
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> User Accounts
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                          <!--   <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>-->
                             
                        </li> 
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> 
                        <li>
                            <a href="tables.html"><i class="fa fa-apple"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="product-add.html">Add Products</a>
                                </li>
                                <li>
                                    <a href="product-category.html">Product Categories</a>
                                </li>
                                 <li>
                                    <a href="product-sizes.html">Product Sizes</a>
                                </li>
                                 <li>
                                    <a href="product-prices.html">Product Prices</a>
                                </li>
                                <li>
                                    <a href="product-view.html">View Products</a>
                                </li>
                                 
                            </ul>
                        </li> 
                        <li>
                            <a href="tables.html"><i class="fa fa-tasks"></i> Inventory<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="inventory-view.html">View Inventory</a>
                                </li>
                                <li>
                                    <a href="inventory-add-item.html">New Item Add</a>
                                </li>
                                <li>
                                    <a href="inventory-goods-receive.html">Goods Receive</a>
                                </li>
                                <li>
                                    <a href="inventory-goods-issue.html">Goods Issue</a>
                                </li>
                                 
                            </ul>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-users"></i> Clients<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="client-add.html">Add Clients</a>
                                </li>
                                <li>
                                    <a href="client-view.html">View Clients</a>
                                </li>
                                 
                            </ul>
                        </li> 
                        <li>
                            <a href="tables.html"><i class="fa fa-file-o"></i> Quotes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="quotes-add.html">Add Quotes</a>
                                </li>
                                <li>
                                    <a href="quotes-back-orders.html">Back Orders</a>
                                </li>
                                <li>
                                    <a href="quotes-view.html">View Quotes</a>
                                </li>
                                 
                            </ul>
                        </li> 
                        <li>
                            <a href="tables.html"><i class="fa fa-floppy-o"></i> Invoices<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="invoice-add.html">Add Invoice</a>
                                </li>
                                <li>
                                    <a href="invoice-view.html">View Invoice</a>
                                </li>
                                <li>
                                    <a href="invoice-return.html">Invoices Return</a>
                                </li>
                                 
                            </ul>
                        </li> 
                        <li>
                            <a href="tables.html"><i class="fa fa-dollar"></i> Payments<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="payment-add.html">Add Payments</a>
                                </li>
                                <li>
                                    <a href="payment-view.html">View Payments</a>
                                </li>
                                 
                            </ul>
                        </li>  
                         <li>
                            <a href="tables.html"><i class="fa fa-file"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="tax.html">Clients Statements</a>
                                </li>
                                <li>
                                    <a href="morris.html">Item Sales</a>
                                </li>
                                <li>
                                    <a href="morris.html">Payments Collected</a>
                                </li>
                                <li>
                                    <a href="morris.html">Revenue By Client</a>
                                </li>
                                <li>
                                    <a href="morris.html">Tax Sumery</a>
                                </li> 
                            </ul>
                        </li>  
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav> 
        @yield('content'); 
  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js') }} "></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('assets/bower_components/metisMenu/dist/metisMenu.min.js') }} "></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }} "></script>
    
    <script src="{{asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }} "></script>

<!-- Fancybox JS -->

    <script src="{{asset('assets/dist/js/jquery.fancybox.js') }} "></script>

    <script src="{{asset('assets/dist/js/jquery.fancybox.pack.js') }} "></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('assets/dist/js/sb-admin-2.js') }} "></script>


   <script>

    $(window).load(function() {
       
        var url = window.location.href;  
        var hash = '#'+url.split('#')[1];
        var href= jQuery('.tab_view_nav').find('li').attr('href');

        $(".tab_view_nav li").each(function() {
            var href_ = $(this).find('a').attr("href");
            href_ = '#'+href_.split('#')[1];
             
            if(href_ == hash){
                $(this).find('a').trigger('click');
                 console.log(href_);
            }
           
      });
         
         
    });
    $(document).ready(function() {


        $('#dataTables-example').DataTable({
                responsive: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 5,
                "order": []

        });
        $('#dataTables-example2').DataTable({
                responsive: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 5,
                "order": []

        });
        $('#dataTables-example3').DataTable({
                responsive: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 5,
                "order": []

        });
        $('#dataTables-example4').DataTable({
                responsive: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 5,
                "order": []

        });

        $(".various").fancybox({
            maxWidth    : 1000,
            fitToView   : false,
            width       : '70%',
            height      : '45%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });
    });
    </script>


</body>

</html>
