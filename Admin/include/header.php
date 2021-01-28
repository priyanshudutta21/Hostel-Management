<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION["username"])){

    header("LOCATION: /index.php");

}
include('database.php');
define('simg' , "img/student_img/");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hostel Management</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hostel Management</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link  <?php if(PAGE == 'dashboard') { echo 'active'; } ?>" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

         

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>

            <!-- Nav Item - hostels -->
            <li class="nav-item">
                <a class="nav-link  <?php if(PAGE == 'hostel') { echo 'active'; } ?>" href="hostel.php">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Hostels</span></a>
            </li>

            <!-- nav Item -  rooms -->
            <li class="nav-item">
                <a class="nav-link  <?php if(PAGE == 'room') { echo 'active'; } ?>" href="room.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Rooms</span></a>
            </li>
            
            <!-- Nav Item - student -->
            <li class="nav-item">
                <a class="nav-link  <?php if(PAGE == 'student') { echo 'active'; } ?>" href="students.php">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Students</span></a>
            </li>
            
            <!-- nav Item - Course -->
            <li class="nav-item">
                <a class="nav-link  <?php if(PAGE == 'course') { echo 'active'; } ?>" href="course.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Course</span></a>
            </li>
            <!-- nav Item - settings -->
            <li class="nav-item">
                <a class="nav-link  <?php if(PAGE == 'settings') { echo 'active'; } ?>" href="settings.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span></a>
            </li>
            <!-- nav Item - logout -->
            <li class="nav-item">
                <a class="nav-link  <?php if(PAGE == 'logout') { echo 'active'; } ?>" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"]?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- End of Topbar -->

                