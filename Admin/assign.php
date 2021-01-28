<?php
define('TITLE', 'Assign Student');
define('PAGE', 'assign');
include('include/header.php'); 



$msg = '';
$rprice = '0';
$paymdone = '0';


if(isset($_REQUEST['assigns']))
{
    if(($_REQUEST['Sname'] == "") || ($_REQUEST['course'] == "") || ($_REQUEST['rno'] == "") || ($_REQUEST['hst'] == "") ||($_REQUEST['rtype'] == "") || ($_REQUEST['rno'] == ""))
    {
        $msg ="fill all details";
    }
    else
    {
        // PICTURE UPLOAD
        $file = $_FILES['userpic'];

        $photo_name = $_FILES['userpic']['name'];
        $file_type = $_FILES['userpic']['type'];
        $file_size =$_FILES['userpic']['size'];
        $file_tmp_loc = $_FILES['userpic']['tmp_name'];
        $file_store_path = "img/student_img/".$photo_name;

        move_uploaded_file($file_tmp_loc,$file_store_path);


        $sname = $_REQUEST['Sname'];
        $phn = $_REQUEST['phn'];
        $lgur = $_REQUEST['lgname'];
        $fname = $_REQUEST['fname'];
        $add = $_REQUEST['add'];
        $gen = $_REQUEST['gender'];
        $course = $_REQUEST['course'];
        $rno = $_REQUEST['rno'];
        $hname = $_REQUEST['hst'];
        $rType = $_REQUEST['rtype'];
        $RoomN = $_REQUEST['roomno'];

        $Bfrm = $_REQUEST['bmonthFr'].'-01';
        $Bto = $_REQUEST['bmonthTo'] .'-31';

        // calculate month for total ammount
        $date1 =$Bfrm;
        $date2 = $Bto;
        $d1=new DateTime($date2); 
        $d2=new DateTime($date1);                                  
        $Months = $d2->diff($d1); 

        // in month
        $month = (($Months->y) * 12) + ($Months->m) + 1;

        $sql = "SELECT * FROM `hostel` WHERE hname = '{$hname}'"; 
        $data = $conn->query($sql);
        $row = $data->fetch_assoc();

        if($rType == 'Single')
        {
            $rprice = $row['sroomprice'];
        }
        else if($rType == 'Double')
        {
            $rprice = $row['droomprice'];
        }

        $totpayment = $rprice * $month;

        // check condition and insert

        $check_sql = "SELECT * FROM `student` where roll = '$rno' and course = '$course'";
        $cdata = $conn->query($check_sql);
        $retdata = mysqli_num_rows($cdata);

        $check_sql2 = "SELECT STATUS FROM `room` WHERE hname='{$hname}' and rno = '{$RoomN}'";
        $cdata2 = $conn->query($check_sql2);
        $retdata2 = mysqli_fetch_assoc($cdata2);

        if( $retdata2['STATUS'] == '1')
        {
            $msg = "Student already exists or Room Booked Already";
        }
        else 
        {
            // add data
            $sql = "INSERT INTO `student`( `sname`, `phn`, `lgname`, `fname`, `addrs`, `gender`, `course`, `roll`, `hname`, `RoomTyp`, `RoomNo`, `Bfrm`, `Bto`,`bmonth`, `TotalPayment`, `Paymentdone`, `image`) 
            VALUES ('$sname','$phn','$lgur','$fname','$add','$gen','$course','$rno','$hname','$rType','$RoomN','$Bfrm','$Bto','$month','$totpayment','$paymdone','$photo_name')";
            $conn->query($sql);
             
            if($rType == 'Single'){
                $sq = "UPDATE `room` SET `status`= '1' WHERE hname = '{$hname}' and rno = '{$RoomN}'";
                $conn->query($sq);
            }
            else if ( $rType == 'Double'){

                // check 2 or not

                $che_sql = "SELECT * FROM `student` where RoomNo = '{$RoomN}'";
                $cda = $conn->query($che_sql);
                $retda = mysqli_num_rows($cda);

                if($retda > 1)
                {
                $sq = "UPDATE `room` SET `status`= '1' WHERE hname = '{$hname}' and rno = '{$RoomN}'";
                $conn->query($sq);
                }
                else  if($retda == 1){
                $sq = "UPDATE `room` SET `status`= '2' WHERE hname = '{$hname}' and rno = '{$RoomN}'";
                $conn->query($sq);
                }else if(!$retda > 0 ){
                $sq = "UPDATE `room` SET `status`= '0' WHERE hname = '{$hname}' and rno = '{$RoomN}'";
                $conn->query($sq);
                }
            }

            $msg = "Student Assigned succesfully";
            $red = "<script>
        setTimeout(function(){
           window.location.href = 'students.php';
        }, 1000);
        </script>";
        }
    } 

}


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Assign Students</h1>
    </div>
    <div class="row mb-4">
        <div class="col">
            <a href="room.php" class="btn btn-danger ">
                <i class="fas fa-long-arrow-alt-left"></i>
                Back</a>
        </div>
    </div>

    <!-- add stud -->
    <div class="text-center font-weight-bold">
        <p class="align-center text-danger"><?php echo $msg; ?></p>

    </div>

    <div class="card rounded shadow m-2">
        <form class="p-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">profile picture</label>
                <input type="file" class="form-control" name="userpic" id="userpic">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="Sname" id="Sname" required>
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="number" class="form-control" name="phn" id="phn" required>
            </div>
            <div class="form-group">
                <label for="name">Local Gurdain</label>
                <input type="text" class="form-control" name="lgname" id="lgname">
            </div>
            <div class="form-group">
                <label for="name">Father</label>
                <input type="text" class="form-control" name="fname" id="fname" required>
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input
                    type="text"
                    class="form-control"
                    name="add"
                    id="add"
                    style="height: 80px;" required>
            </div>
            <div class="form-group">
                <label for="rtype">Gender</label>
                <select class="form-control" name="gender" >
                    <option selected="selected" disabled="disabled" hidden="hidden">Select Gender</option>
                    <option name="sing">Male</option>
                    <option name="doub">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" name="course" required>
                    <?php
            $sql = "SELECT * FROM `course`";
            $data = $conn->query($sql);
            while ($row = $data->fetch_assoc()){
                echo '<option name="cname">'.$row["cname"].'</option>';
            } 
            ?>
                </select>
            </div>
            <?php
            if(isset($_REQUEST['asgn'])){
            $sql = "SELECT * FROM room WHERE rid = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            }
            ?>
            <div class="form-group">
                <label for="rno">RollNo</label>
                <input type="text" class="form-control" name="rno" id="rno" required>
            </div>
            <div class="form-group">
                <label for="name">Hostel</label>
                <input
                    class="form-control"
                    name="hst"
                    value="<?php if(isset($row['hname'])) {echo $row['hname']; }?>"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="rtype">Room Type</label>
                <input
                    class="form-control"
                    name="rtype"
                    value="<?php if(isset($row['rtype'])) {echo $row['rtype']; }?>"
                    readonly="readonly">
            </div>

            <div class="form-group">
                <label for="roomno">Room No</label>
                <input
                    type="number"
                    name="roomno"
                    class="form-control"
                    id=""
                    value="<?php if(isset($row['rno'])) {echo $row['rno']; }?>"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="bmonthFr">Book Month</label><br>
                <label >From</label>
                <input type="month" class="form-control" name="bmonthFr" id="bmonthFr" value="<?php echo date("Y-m");?>" required>
                <label for="bmonthTo">To</label>
                <input type="month" class="form-control" name="bmonthTo" id="bmonthTo" value="<?php echo date("Y-m");?>" required>
            </div>
            <div class="text-center">
                <input
                    class="btn align-center btn-success"
                    value="Assign Student"
                    name="assigns"
                    type="submit"></input>
                <a href="students.php" class="btn align-center btn-danger">Back</a>
            </div>
        </form>
    </div>
<?php echo $red; ?>
    <?php include('include/footer.php') ?>