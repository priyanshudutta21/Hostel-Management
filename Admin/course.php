<?php
define('TITLE', 'Course');
define('PAGE', 'course');
include('include/header.php'); 
?> 
  <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Course</h1>
    </div>

    <!-- add stud -->
    <div class="row mb-3">

        <a href="addcourse.php" type="button" class="btn btn-success">
            <i class="fas fa-plus-square"></i>
            Add Course</a>

    </div>
    <table class="table text-center courseTable">
        <thead>
            <th>Course</th>
            <th>Course Duration(year)</th>
            <th>action</th>
        </thead>
        <tbody class="text-center">
            <?php
             $sql = "SELECT * FROM `course` order by cid desc";
             $data = $conn->query($sql);
             while($row= $data->fetch_assoc()){
            
            echo '
            <tr>
                <td>'.$row['cname'].'</td>
                <td>'.$row['cyear'].'</td>
                <td>
               

                    <form action="" method="post" class="d-inline">
                    <input type="hidden" name="id" value='.$row["cid"].'>
                    <button class="btn btn-danger" name="delet">
                    <i class="fas fa-trash"></i>
                    </button>
                </form>
                </td>
            </tr>';
            }

            if(isset($_REQUEST['delet'])){
                $sql = "DELETE FROM `course` WHERE cid = {$_REQUEST['id']} ";
                if($conn->query($sql) === TRUE){
                    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
                    }else {
    
                      echo "Unable to Delete Data";
                    }
            }
    
            ?>
        </tbody>
    </table>
<?php include('include/footer.php') ?>