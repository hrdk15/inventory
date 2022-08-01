<?php 
include "connection.php";
if(!isset($_SESSION["user"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.php" style="color:white; margin-left: 30px; margin-top: 40px">Inventory</a>
    </h2>
</div>




<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome <?php '$_SESSION[user]'  ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>


<div id="sidebar">
    <ul>
        <li class="active">
            <a href="dashboard.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="company_list.php"><i class="icon icon-user"></i><span>Company List</span></a>
        </li>
        <li>
            <a href="product_list.php"><i class="icon icon-user"></i><span>Products List</span></a>
        </li>
        <li>
            <a href="vendor_list.php"><i class="icon icon-user"></i><span>Vendors List</span></a>
        </li>
        <li>
            <a href="order_purchase.php"><i class="icon icon-user"></i><span>Order Purchase</span></a>
        </li>

        <li>
            <a href="purchase_report.php"><i class="icon icon-user"></i><span>Purchase Report</span></a>
        </li>
        <li>
            <a href="stock_report.php"><i class="icon icon-user"></i><span>Stock Report</span></a>
        </li>
        <li>
            <a href="vendor_report.php"><i class="icon icon-user"></i><span>Vendor Report</span></a>
        </li>

        
</div>

<div id="search">

    <a href="logout.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

</div>