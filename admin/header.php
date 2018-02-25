<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION['adminloggedin']))
{
	header("location: login.php");	
}
else
{
	include('../db_config.php');
}

?>
<!doctype html>
<html lang="en-US">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Admin Panel</title>
        <meta name="description" content="" />
        <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- THEME CSS -->
        <link href="../assets/css/essentials.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

        <!-- PAGE LEVEL STYLES -->
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<style>

.inside_div
{
    border : 1px dotted #ccc;       
}
.inside_div1
{
    border : 1px dotted #ccc;  
    padding: 2%;
}
form .row {
     margin-bottom: 0px;
}
</style>
</head>
<body>
    <div id="wrapper">
        <aside id="aside">
            <nav id="sideNav"><!-- MAIN MENU -->
                <ul class="nav nav-list">
                    <li>
                        <a href="index.php">
                            <i class="main-icon fa fa-dashboard"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="cars.php">
                            <i class="main-icon fa fa-car"></i><span>Cars</span>
                        </a>
                    </li>
                    <li>
                        <a href="enquiry.php">
                            <i class="main-icon fa fa-info-circle"></i><span>Enquiry</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <span id="asidebg"><!-- aside fixed background --></span>
        </aside>

        <header id="header">
            <button id="mobileMenuBtn"></button>
            <span class="logo pull-left">
                    <H3 alt="logo" style = "height:35px;color:#fff;margin-top:4%;" />Admin</h3>
            </span>
            <nav>
                <!-- OPTIONS LIST -->
                <ul class="nav pull-right">
                    <li class="dropdown pull-left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img class="user-avatar" alt="" src="../assets/images/noavatar.jpg" height="34" /> 
                            <span class="user-name">
                                    <span class="hidden-xs"> 
                                    Admin <i class="fa fa-angle-down"></i>
                                    </span>
                            </span>
                        </a>
                        <ul class="dropdown-menu hold-on-click">
                            <li>
                                <a href="changepass.php"><i class="fa fa-key"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
    <!-- /HEADER -->
