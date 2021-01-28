<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('include/header.php'); 


// total hostel
$sql = "SELECT count(hid) FROM hostel";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$thostel = $row[0];

// total capacity
$sql = "SELECT sum(hcap) as capac FROM hostel";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$tcap = $row['capac']+0;


// student booked
$sql = "SELECT count(sid) FROM student";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$tstudent = $row[0];

// total room
$sql = "SELECT count(rid) FROM room";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$troom = $row[0];

// single room
$sql = "SELECT count(rid) FROM room where rtype = 'Single'";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$sbed = $row[0];

// available s room
$sql = "SELECT count(rid) FROM room where status = '0' and rtype = 'Single' ";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$savl = $row[0];

// double room
$sql = "SELECT count(rid) FROM room where rtype = 'Double'";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$dbed = $row[0];

// available D room
$sql = "SELECT COUNT(rid) FROM room WHERE rtype = 'Double' and status = '0' or status = '2'";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$davl = $row[0];



?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">TOTAL HOSTALS</h6>
                    <h2 class="text-right">
                        <i class="fa fa-cart-plus f-left"></i>
                        <span><?php echo $thostel; ?></span></h2>
                    <p class="m-b-0">total capacity<span class="f-right"><?php echo $tcap; ?></span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">students</h6>
                    <h2 class="text-right">
                        <i class="fa fa-rocket f-left"></i>
                        <span><?php echo $tstudent; ?></span></h2>
                    <p class="m-b-0">Total rooms<span class="f-right"><?php echo $troom; ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Single Room</h6>
                    <h2 class="text-right">
                        <i class="fa fa-credit-card f-left"></i>
                        <span><?php echo $sbed; ?></span></h2>
                    <p class="m-b-0">Available
                        <span class="f-right"><?php echo $savl; ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Double Room</h6>
                    <h2 class="text-right">
                        <i class="fa fa-credit-card f-left"></i>
                        <span><?php echo $dbed; ?></span></h2>
                    <p class="m-b-0">Available<span class="f-right"><?php echo $davl; ?></span></p>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row mt-5">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">AVailable Rooms</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <table class="table roomdetail" style="font-size: 12px;">
                            <thead>
                                <th>Hostel Name</th>
                                <th>Room Type</th>
                                <th>price</th>
                            </thead>
                            <tbody>
                                <?php
                                            $sql = "SELECT * FROM room ";
                                            $result = $conn->query($sql);

                                            while($row = $result->fetch_assoc()){
                                                
                                            echo'
                                            <tr>
                                                <td>'.$row["hname"].'</td>
                                                <td class="font-weight-bold text-success">'.$row["rtype"].'</td>
                                                <td class="font-weight-bold text-danger">'.$row["rprice"].'</td>
                                            </tr>';
                                            }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue
                    </h6>
                </div>
                <?php
                // total income
                $sql = "SELECT sum(TotalPayment) as tpay, sum(Paymentdone) as payd FROM student";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $tpayment = $row['tpay']+0;
                //  total done
                $paymentdone = $row['payd']+0;
                ?>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie  pt-2 pb-2">
                    <table class="table">
                        <th class="text-uppercase">total payment for all hostels</th>

                        <tr>
                            <td class="font-weight-bold text-primary">₹ <?php echo $tpayment; ?></td>
                        </tr>
                    </table>
                    <table class="table">
                        <th class="text-uppercase">total collected payment</th>

                        <tr>
                            <td class="font-weight-bold text-success">₹ <?php echo $paymentdone; ?></td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('include/footer.php') ?>