<?php
define('TITLE', 'Students');
define('PAGE', 'student');
include('include/header.php'); 
?> 
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">STUDENTS</h1>
    </div>

    <!-- add stud -->
    <div class="row mb-3">
        
            <a href="room.php"  class="btn btn-success">
                <i class="fas fa-plus-square"></i>
                Assign Student</a>
        
    </div>

    <!-- Content Row -->
    

        <!-- table -->
    
        <table class="table table-striped myTable"  width="100%" cellspacing="0" style="font-size: 12px;" >
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">ROOM</th>
                    <th scope="col">Hostel</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">Payment Done</th>
                    <th scope="col">Payment Pending</th>
                    <th scope="col">Payment total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            $sql = "SELECT * FROM `student`";
            $data = $conn->query($sql);

            while($row= $data->fetch_assoc()){



            $paymentpendin = $row["TotalPayment"]-$row["Paymentdone"];
              // calculate staying month  
            
            echo '
            <tr>
            <td>'.$row["sname"].'</td>
            <td>'.$row["RoomNo"].'</td>
            <td name="hname">'.$row["hname"].'</td>
            <td>'.$row["course"].'</td>
            <td class="text-success">₹ '.$row["Paymentdone"].'</td>
            <td class="text-danger">₹ '.$paymentpendin.'</td>
            <td>₹ '.$row["TotalPayment"].'</td>
            <td>';

            if($row["Paymentdone"] == $row["TotalPayment"])
            {
                echo '<i class="fas fa-check-circle" style=" color: green;"></i>';
            }else if($row["Paymentdone"] < $row["TotalPayment"])
            {
                echo '<i class="fas fa-clock" style=" color: red;"></i>';
            }
            echo '</td>';
            if($row["Paymentdone"] == $row["TotalPayment"]){
                echo '
                <td>
                        <form action="studentdetails.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value='.$row["sid"].'>
                        <button class="btn btn-success" type="submit" name="view">
                        <i class="fas fa-info-circle "></i>
                        </button>
                        </form>
    
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="id" value='.$row["sid"].'>
                            <button class="btn btn-danger" name="delete" type="submit">
                            <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <form action="invoice.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value='.$row["sid"].'>
                        <button class="btn btn-danger" type="submit" name="bill">
                        <i class="fas fa-file-download "></i>
                        </button>
                        </form>
                    </td>
                </tr>
                ';
            }
            else if($row["Paymentdone"] < $row["TotalPayment"]){
                echo '
                <td>
                        <form action="payment.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value='.$row["sid"].'>
                            <button class="btn btn-primary" type="submit" name="pay">
                            <i class="fas fa-rupee-sign "></i>
                            </button>
                        </form>
                        <form action="studentdetails.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value='.$row["sid"].'>
                            <button class="btn btn-success" type="submit" name="view">
                            <i class="fas fa-info-circle "></i>
                            </button>
                        </form>
    
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="id" value='.$row["sid"].'>
                            <button class="btn btn-danger" name="delete" type="submit">
                            <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <form action="invoice.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value='.$row["sid"].'>
                        <button class="btn btn-danger" type="submit" name="bill">
                        <i class="fas fa-file-download "></i>
                        </button>
                        </form>
                    </td>
                </tr>
                ';
            }
            
        };
        
        // delet and check double room or single room clear
       

        if(isset($_REQUEST['delete']))
        {
           
          

            $sql = "SELECT * from student where sid = '{$_REQUEST['id']}'";
            $retcon = $conn->query($sql);
            $roomdata = mysqli_fetch_assoc($retcon);
            $hname1 = $roomdata['hname'];
            $rmno = $roomdata['RoomNo'];

            $sqlD = "DELETE FROM `student` where sid = '{$_REQUEST['id']}'";
            $conn->query($sqlD);

               
           
            
           if(($roomdata['RoomTyp'] == "Double")){
                
                $che_sql = "SELECT * FROM `student` where RoomNo = '{$rmno}' and hname = '{$hname1}'";
                $cda = $conn->query($che_sql);
                $retda = mysqli_num_rows($cda);

                if($retda == 2){
                    $sql = "UPDATE `room` SET `status`= '1' WHERE hname = '{$hname1}' and rno = '{$rmno}' ";
                    $conn->query($sql);
                }
                else if($retda == 1){
                    $sql = "UPDATE `room` SET `status`= '2' WHERE hname = '{$hname1}' and rno = '{$rmno}' ";
                    $conn->query($sql);
                }
                else if($retda == 0){
                    $sql = "UPDATE `room` SET `status`= '0' WHERE hname = '{$hname1}' and rno = '{$rmno}' ";
                    $conn->query($sql);
                }
            }
            else if(($roomdata['RoomTyp'] == "Single")){

                $sqlUp = "UPDATE `room` SET `STATUS`= '0' WHERE hname = '{$hname1}' and rno = '{$rmno}' ";
                $conn->query($sqlUp);

            }
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />'; 
            
         }
        
            ?>
               
            </tbody>
            

        </table>
   

</div>
<!-- /.container-fluid -->

<?php include('include/footer.php') ?>