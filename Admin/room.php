
<?php
define('TITLE', 'Room');
define('PAGE', 'room');
include('include/header.php'); 
?> 
     <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Rooms</h1>
                        </div>

                        <!-- add stud -->
                        <div class="row mb-3">

                            <a href="addroom.php" type="button" class="btn btn-success">
                                <i class="fas fa-plus-square"></i>
                                Add Rooms</a>

                        </div>

                        <!-- Content Row -->
                        
                            <table class="table roomTable">
                                <thead>
                                    <th>Hostel Name</th>
                                    <th>ROOM No</th>
                                    <th>Room Type</th>
                                    <th>price pm</th>
                                    <th>status</th>
                                </thead>
                                <tbody>

                                <?php
            
                                $sql = "SELECT * FROM `room` ";
                                $data = $conn->query($sql);
                                while($row= $data->fetch_assoc())
                                {
                                
                                echo '
                                    <tr>
                                        <td>'.$row["hname"].'</td>
                                        <td>'.$row["rno"].'</td>
                                        <td>'.$row["rtype"].'</td>
                                        <td>₹ '.$row["rprice"].'</td>';
                                if($row["status"] == 0)
                                {
                                    echo '
                                    <td >
                                    <form action="assign.php" method="POST" class="d-inline mx-2">
                                    <input type="hidden" name="id" value='. $row["rid"] .'>
				                    <button type="submit" class="btn btn-info" name="asgn" value="asgn">
                                    <i class="fas fa-plus-square"></i> Assign
                                    </form>

                                    <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["rid"].'>
                                    <button class="btn btn-danger" name="delete" type="submit">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                    </form>

                                    </td>';
                                }
                                else if($row["status"]==1)
                                {
                                    echo ' 
                                    <td >
                                    <div class="text text-danger">OCCUPIED</div>
                                    </td>';
                                }
                                else if($row["status"]==2)
                                {
                                    echo ' 
                                    <td>
                                    <form action="assign.php" method="POST" class="d-inline mx-2">
                                    <input type="hidden" name="id" value='. $row["rid"] .'>
				                    <button type="submit" class="btn btn-info" name="asgn" value="asgn">
                                    <i class="fas fa-plus-square"></i> Assign
                                    </form>
                                    </td>';
                                }
                                }
                                echo '</tr>';










                                if(isset($_REQUEST['delete']))
                                {
            
                                    $sql = "DELETE FROM `room` WHERE rid = {$_REQUEST['id']} ";
                                    if($conn->query($sql) === TRUE)
                                    {
                                        echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
<?php include('include/footer.php') ?>