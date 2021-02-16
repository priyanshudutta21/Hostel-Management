<?php
define('TITLE', 'Room');
define('PAGE', 'room');
include('include/header.php'); 
$msg = '';

if(isset($_REQUEST['adroom'])){
    
    $hname = $_REQUEST['shname'];
    $roomT = $_REQUEST['rtype'];
    $RoomNo = $_REQUEST['rno'];
    
    
    // to set price
    $sq = "SELECT * FROM `hostel` where hname = '{$hname}'";
    $data = $conn->query($sq);
    $row = $data->fetch_assoc();

    if(($roomT == "Single")){

        $rprice = $row["sroomprice"];  

    }
    else if(($roomT == "Double")){

        $rprice = $row["droomprice"];
    }

    // check room already added or not

    $chSql = "SELECT * FROM `room` where rno = '$RoomNo' and hname = '$hname'";
    $cdata = $conn->query($chSql);
    $rdata = mysqli_num_rows($cdata);

    if($rdata > 0)
    {
        $msg = "Room already added";
    }
    else{
        $sql = "INSERT INTO `room`(`hname`, `rno`, `rprice`, `rtype`) 
        VALUES ('$hname','$RoomNo', '$rprice' , '$roomT')";

        $conn->query($sql);
        $msg= "Room Added Succesfully";

    }
}


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Room</h1>
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
        <form class="p-4" action="" method="post">
            <div class="form-group">
                <label for="name">Available Hostel</label>
                <select name="hname" class="form-control" id="hname" >

             <?php
            $sql = "SELECT * FROM `hostel`";
            $data = $conn->query($sql);
            while ($row = $data->fetch_assoc()){

            echo '<option>'.$row["hname"].'</option>';
            
            }

            ?>
                </select>
                <input
                    type="submit"
                    class="btn btn-success mt-3"
                    name="sethostel"
                    value="set hostel">
            </div>

            <div class="form-group ">
                <?php
           if(isset($_REQUEST['sethostel'])){

               $hn = $_REQUEST['hname'];

               $sq = "SELECT * From `hostel` where hname = '{$hn}'";
               $data = $conn->query($sq);
               $row = $data->fetch_assoc();
               $totroom = $row["droom"] + $row["sroom"];

               echo '
                <label for="name">Hostel</label>
                <input type="text" name="shname" class="form-control" value="'.$row["hname"].'" readonly >

                <label for="name">Total single Bed Room</label>
                <input type="number"  class="form-control" value='.$row["sroom"].' readonly >

                <label for="name">Total Double Bed Room</label>
                <input type="number"  class="form-control"  value='.$row["droom"].' readonly >

                <label for="name">Total Room </label>
                <input type="number"  class="form-control"  value='.$totroom.' readonly >';
           }
               
           
           ?>

            </div>

            <div class="form-group">
                <label for="name">Bed Type
                </label>
                <select
                    name="rtype"
                    class="form-control"
                    id="rtype"
                    onchange="fetchhname(this.value)">
                    <option>Single</option>
                    <option>Double</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Room No</label>
                <input type="number" class="form-control" name="rno" id="rno">
            </div>

            <div class="text-center">
                <input
                    class="btn align-center btn-success"
                    type="submit"
                    value="ADD ROOM"
                    name="adroom"></input>
                <a href="room.php" class="btn align-center btn-danger">Close</a>
            </div>
        </form>
    </div>
    <?php include('include/footer.php') ?>