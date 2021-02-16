<?php
define('TITLE', 'Course');
define('PAGE', 'course');
include('include/header.php'); 
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Student Details</h1>
    </div>
<?php
    if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM `student` where sid = {$_REQUEST['id']}";
            $data = $conn->query($sql);
        
            $row = $data->fetch_assoc();
    }

            $paymentpendin = $row["TotalPayment"]-$row["Paymentdone"];
                echo '
                <!-- add btn -->

                <div class="row mb-4">
                    <div class="col">
                        <a href="students.php" class="btn btn-danger ">
                            <i class="fas fa-long-arrow-alt-left"></i>
                            Back</a>
                    </div>
                    <div class="col">
                        <form action="editstudent.php" method="post" class="float-right ">
                            <input type="hidden" name="id" value='.$row["sid"].'>
                            <button class="btn btn-primary" name="edit" type="submit">
                                <i class="fas fa-pen"></i>
                                Edit
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Content Row -->';


                echo '
                <div class="container p-0 m-4">

                    <div class="row">

                        <div class="col-sm-3">
                            <div class="left mt-5">
                                <img src="'; echo simg.$row["image"]; echo '" alt="" id="userimg">
                                <h3 class="text mt-4 text-primary text-center">'.$row["sname"].'</h3>
                                <h6 class="text  text-primary text-center">student id: '.$row["sid"].'</h6>
                            </div>
                        </div>

                        <div class="col right">
                            <div class="row px-2">
                                <div class="col">
                                    <div class="left mt-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["sname"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Roll No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["roll"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Father Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["fname"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["phn"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Local gurdain:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["lgname"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["addrs"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Course</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["course"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bed Type</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p  class="text-primary" >'.$row["RoomTyp"].'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="cright mt-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hostal Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p  class="text-primary" >'.$row["hname"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Room No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["RoomNo"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Booking From</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["Bfrm"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Booking To</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["Bto"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Booked month</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["bmonth"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Payment</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["TotalPayment"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Payment Done</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row["Paymentdone"].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Payment Pending</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-danger font-weight-bold">'.$paymentpendin.'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>';
            
?>

    <!-- /.container-fluid -->

    <!-- /.container-fluid -->
    <?php include('include/footer.php') ?>