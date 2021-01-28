<?php
define('TITLE', 'Payment');
define('PAGE', 'payment');
include('include/header.php'); 
$msg = "";
// set current time

$timezone = date_default_timezone_set("Asia/kolkata");
$time = date("h:i:sa");
$date = date("Y/m/d");


if(isset($_REQUEST['pyment'])){
    
    $sql = "SELECT `Paymentdone` FROM student WHERE sid = '{$_REQUEST["sid"]}'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $curentdone = $row['Paymentdone'];

   
    if((isset($_REQUEST["cpay"]) == ''))
    {
        $msg = "enter a valid price";
    }
    else 
    {
       
        $id = $_REQUEST['sid'];
        $payment = $_REQUEST['cpay'];
        $final = $curentdone + $payment;

        $sql = "UPDATE `student` SET `Paymentdone`='{$final}' ,`Currentpayment`='{$payment}',`Cpaydate`='{$date}',`Cpaytime`='{$time}' WHERE sid = '{$id}'";
        $data = $conn->query($sql);
        $msg = "Payment Succesfull";
        $red = "<script>
        setTimeout(function(){
           window.location.href = 'students.php';
        }, 2000);
        </script>";
    }
    
}


?> 

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Students Fees</h1>
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
    <p class="align-center text-danger"><?php echo $msg;?></p>
    
</div>
<?php 
    if(isset($_REQUEST['pay'])){
    $sql = "SELECT * FROM student WHERE sid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }
?>

<div class="card rounded shadow m-2">
    <form class="p-4" action="" method="post">
       <div class="form-group">
           <label for="name">SID</label>
           <input type="text"  class="form-control" name="sid" id="sid"
           value="<?php if(isset($row['sid'])) {echo $row['sid']; }?>" readonly>
       </div>
       <div class="form-group">
           <label for="name">Name</label>
           <input type="text"  class="form-control" name="name" id="name" value="<?php if(isset($row['sname'])) {echo $row['sname']; }?>" readonly>
       </div>
       <div class="form-group">
           <label for="name">Course</label>
           <input class="form-control" name="course" value= "<?php if(isset($row['course'])) {echo $row['course']; }?>" readonly >
            
       </div>
       <div class="form-group">
           <label for="name">Hostel</label>
           <input class="form-control" name="hostelname" value = "<?php if(isset($row['hname'])) {echo $row['hname']; }?>" readonly>
       </div>
       <div class="form-group">
           <label for="name">Room Type</label>
           <input class="form-control" name="roomtype" value = "<?php if(isset($row['RoomTyp'])) {echo $row['RoomTyp']; }?>" readonly>
    
       </div>
       <div class="form-group">
           <label for="name">Room No</label>
           <input name="roomname" class="form-control" value = "<?php if(isset($row['RoomNo'])) {echo $row['RoomNo']; }?>" readonly>
               
       </div>
       <div class="form-group">
           <label for="name">Total Payment Recieved </label>
           <input type="text"  class="form-control" name="pdone" id="rfee" readonly value="<?php if(isset($row['Paymentdone'])) {echo $row['Paymentdone']; }?>">
       </div>
       <div class="form-group">
           <label for="name">Total fee</label>
           <input type="text"  class="form-control" name="name" id="tfee" readonly value="<?php if(isset($row['TotalPayment'])) {echo $row['TotalPayment']; }?>">
       </div>
       <div class="form-group">
           <label for="name">pending fee</label>
           <input type="number"  class="form-control" name="pfee" id="pfee" readonly >
       </div>
       <div class="form-group">
        <label for="name">Pending fee [Pay now]</label>
        <input type="text"  class="form-control" name="cpay" required>
    </div>
       <div class="text-center">
       <input class="btn align-center btn-success" value="PAY" type="submit" name="pyment" ></input>
       <a href="students.php" class="btn align-center btn-danger" >Close</a>
    </div>
    </form>
</div>
<?php echo $red; ?>

<?php include('include/footer.php') ?>