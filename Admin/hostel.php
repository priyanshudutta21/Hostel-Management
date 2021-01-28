<?php
define('TITLE', 'Hostel');
define('PAGE', 'hostel');
include('include/header.php'); 
?> 
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hostel</h1>
    </div>

    <!-- add stud -->
    <div class="row mb-3">

        <a href="addhostel.php" type="button" class="btn btn-success">
            <i class="fas fa-plus-square"></i>
            Add Hostel</a>

    </div>

    <!-- Content Row -->

    <!-- table -->
    <table class="table hostalTable">
        <thead class="text-center">
            <th>NAME</th>
            <th>capacity</th>
            <th>single|Double</th>
            <th>Room</th>
            <th>Action</th>
        </thead>
        <tbody class="text-center ">
            <?php
            
            $sql = "SELECT * FROM `hostel` order by hid desc";
            $data = $conn->query($sql);
            while($row= $data->fetch_assoc())
            {

            $totalroom = $row['sroom']+$row['droom'];
        
            echo '
            <tr>
                <td>'.$row["hname"].'</td>
                <td>'.$row["hcap"].'</td>
                <td>'.$row["sroom"].'/'.$row["droom"].'</td>
                <td>'.$totalroom.'</td>
                
                <td>
                    <form action="edithostel.php" method="post" class="d-inline">
                    <input type="hidden" name="id" value='.$row["hid"].'>
                        <button class="btn btn-info"  name="edit">
                        <i class="fas fa-edit"></i>
                        </button>
                    </form>

                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="id" value='.$row["hid"].'>
                        <button class="btn btn-danger" name="delet">
                        <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            ';
            }


        if(isset($_REQUEST['delet'])){
            $sql = "DELETE FROM `hostel` WHERE hid = {$_REQUEST['id']} ";
            if($conn->query($sql) === TRUE){
                echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
                }else {

                  echo "Unable to Delete Data";
                }
        }

            ?>
            
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

<?php include('include/footer.php') ?>