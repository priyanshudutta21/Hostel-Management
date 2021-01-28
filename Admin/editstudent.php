<?php
define('TITLE', 'Assign Student');
define('PAGE', 'assign');
include('include/header.php'); 



$msg = '';
$rprice = '0';
$paymdone = '0';


if(isset($_REQUEST['assigns']))
{
    
    
        // PICTURE UPLOAD
        $file = $_FILES['userpic'];

        $photo_name = $_FILES['userpic']['name'];
        $file_type = $_FILES['userpic']['type'];
        $file_size =$_FILES['userpic']['size'];
        $file_tmp_loc = $_FILES['userpic']['tmp_name'];
        $file_store_path = "img/student_img/".$photo_name;

        move_uploaded_file($file_tmp_loc,$file_store_path);


        $id = $_REQUEST['Sid'];
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

        $check_sql2 = "SELECT * FROM `room` WHERE hname='{$hname}' and rno = '{$RoomN}'";
        $cdata2 = $conn->query($check_sql2);
        $retdata2 = $cdata2->fetch_assoc();
        // echo $check_sql2;
        // echo $retdata2['status'];
        // die();
        if( $retdata2["status"] == 1)
        {
            $msg = "Student already exists or Room Booked Already";
        }
        else 
        {
           // add data
           $sql ="UPDATE `student` SET `sname`='$sname',`phn`='$phn',`lgname`='$lgur',`fname`='$fname',`addrs`='$add',`gender`='$gen',`course`='$course',`roll`='$rno',`hname`='$hname',`RoomTyp`='$rType',`RoomNo`='$RoomN',`Bfrm`='$Bfrm',`Bto`='$Bto',`bmonth`='$month',`TotalPayment`='$totpayment',`image`='$photo_name' WHERE sid = '$id'";
           $conn->query($sql);
           $msg = "Student updated succesfully";

           $red = "<script>
        setTimeout(function(){
           window.location.href = 'students.php';
        }, 1000);
        </script>";
            
        }
    

}


?>

<?php 
    if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM student WHERE sid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Students Details</h1>
    </div>
    <div class="row mb-4">
        <div class="col">
            <a href="students.php" class="btn btn-danger ">
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
                <label for="name">SID</label>
                <input
                    type="text"
                    class="form-control"
                    name="Sid"
                    id="Sid"
                    value="<?php if(isset($row['sid'])) {echo $row['sid']; }?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="Sname"
                    id="Sname"
                    value="<?php if(isset($row['sname'])) {echo $row['sname']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input
                    type="number"
                    class="form-control"
                    name="phn"
                    id="phn"
                    value="<?php if(isset($row['phn'])) {echo $row['phn']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Local Gurdain</label>
                <input
                    type="text"
                    class="form-control"
                    name="lgname"
                    id="lgname"
                    value="<?php if(isset($row['lgname'])) {echo $row['lgname']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Father</label>
                <input
                    type="text"
                    class="form-control"
                    name="fname"
                    id="fname"
                    value="<?php if(isset($row['fname'])) {echo $row['fname']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input
                    type="text"
                    class="form-control"
                    name="add"
                    id="add"
                    style="height: 80px;"
                    value="<?php if(isset($row['addrs'])) {echo $row['addrs']; }?>">
            </div>
            <div class="form-group">
                <label for="rtype">Gender</label>
                <select class="form-control" name="gender">
                    <option selected="selected" disabled="disabled" hidden="hidden"><?php if(isset($row['gender'])) {echo $row['gender']; }?></option>
                    <option name="sing">Male</option>
                    <option name="doub">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" name="course">
                    <option selected="selected" disabled="disabled" hidden="hidden"><?php if(isset($row['course'])) {echo $row['course']; }?></option>
                    <?php
                $sql = "SELECT * FROM `course`";
                $data = $conn->query($sql);
                while ($row2 = $data->fetch_assoc()){
                echo '<option name="cname">'.$row2["cname"].'</option>';
                } 
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="rno">RollNo</label>
                <input
                    type="text"
                    class="form-control"
                    name="rno"
                    id="rno"
                    value="<?php if(isset($row['roll'])) {echo $row['roll']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Hostel</label>
                <select
                    class="form-control"
                    name="hst"
                    value="<?php if(isset($row['hname'])) {echo $row['hname']; }?>"
                   >
                    <?php
                $sql = "SELECT * FROM `hostel`";
                $data = $conn->query($sql);
                while ($row2 = $data->fetch_assoc()){
                echo '<option name="cname">'.$row2["hname"].'</option>';
                } 
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="rtype">Room Type</label>
                <select
                    class="form-control"
                    name="rtype"
                    value="<?php if(isset($row['RoomTyp'])) {echo $row['RoomTyp']; }?>"
                    >
                    <option >Single</option>
                    <option>Double</option>
                </select>
            </div>

            <div class="form-group">
                <label for="roomno">Room No</label>
                <input
                    type="number"
                    name="roomno"
                    class="form-control"
                    id="roomno"
                    value="<?php if(isset($row['RoomNo'])) {echo $row['RoomNo']; }?>"
                   >
                    
            </div>
            <div class="form-group">
                <label for="bmonthFr">Book Month</label><br>
                <label >From</label>
                <input
                    type="month"
                    class="form-control"
                    name="bmonthFr"
                    id="bmonthFr"
                    value="<?php if(isset($row['Bfrm'])) {$res = substr($row['Bfrm'],0,7); echo $res;  }?>">
                <label for="bmonthTo">To</label>
                <input
                    type="month"
                    class="form-control"
                    name="bmonthTo"
                    id="bmonthTo"
                    value="<?php if(isset($row['Bto'])) {$res = substr($row['Bto'],0,7); echo $res; }?>">
            </div>
            <div class="text-center">
                <input
                    class="btn align-center btn-success"
                    value="Update Student"
                    name="assigns"
                    type="submit"></input>
                <a href="students.php" class="btn align-center btn-danger">Back</a>
            </div>
        </form>
    </div>
    
    <?php echo $red; ?>
    <?php include('include/footer.php') ?>