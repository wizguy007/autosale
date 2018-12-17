<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AutoSale - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="../assest/img/tilog.png">

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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="padding-top:0px;" class="navbar-brand" href="index.php"><img src="../assest/img/logo.png" height="50"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span style="text-transform: capitalize;"> <?php echo $FULLNAME; ?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li> -->
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#democarsales"><i class="fa fa-fw fa-btc"></i> Car Sales <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="democarsales" class="collapse">
                            <li>
                                <a href="viewcarmodel.php"><span class="glyphicon glyphicon-eye-open" ></span> View Car Models</a>
                            </li>
                            <li>
                                <a href="addcarmodel.php"><i class="fa fa-fw fa-plus"></i> Add Car Models</a>
                            </li>
                            <li>
                                <a href="viewcarbrand.php"><span class="glyphicon glyphicon-eye-open" ></span> View Car Brand</a>
                            </li>
                            <li>
                                <a href="addcarbrand.php"><i class="fa fa-fw fa-plus"></i> Add Car Brand</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-money"></i> Car Rental <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="viewrcarcat.php"><span class="glyphicon glyphicon-eye-open" ></span> View Categories</a>
                            </li>
                            <li>
                                <a href="addrcarcat.php"><i class="fa fa-fw fa-plus"></i> Add Categories</a>
                            </li>
                            <li>
                                <a href="viewrentcars.php"><span class="glyphicon glyphicon-eye-open" ></span> View Rent Cars</a>
                            </li>
                            <li>
                                <a href="addrentcars.php"><i class="fa fa-fw fa-plus"></i> Add Rent Cars</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demoorder"><i class="fa fa-fw fa-truck"></i> Orders <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demoorder" class="collapse">
                            <li>
                                <a href="apporder.php"><span class="glyphicon glyphicon-eye-open" ></span> View All Order</a>
                            </li>
                            <li>
                                <a href="order.php"><i class="fa fa-fw fa-shopping-cart"></i> New Order</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demobooking"><i class="fa fa-fw fa-tasks"></i> Booking <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demobooking" class="collapse">
                            <li>
                                <a href="appbooking.php"><span class="glyphicon glyphicon-eye-open" ></span> View All Booking</a>
                            </li>
                            <li>
                                <a href="booking.php"><i class="fa fa-fw fa-plus"></i> New Booking</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demouser"><i class="fa fa-fw fa-group"></i> Admin <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demouser" class="collapse">
                            <li>
                                <a href="viewadmins.php"><span class="glyphicon glyphicon-eye-open" ></span> View All Admin</a>
                            </li>
                            <li>
                                <a href="addadmins.php"><i class="fa fa-fw fa-plus"></i>Add New Admin</a>
                            </li>
                        </ul>
                    </li>

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper" style="min-height: 609px;">

            <div class="container-fluid">
