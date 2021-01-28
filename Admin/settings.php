<?php
define('TITLE', 'Students');
define('PAGE', 'student');
include('include/header.php'); 
$msg ="";

if(isset($_REQUEST['addadmin'])){
    
    $uname = $_REQUEST['uname'];
    $mail = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $sql = "INSERT INTO `admin`( `a_email`, `a_password`, `a_name`) VALUES ('$mail', '$pass' ,'$uname')";
    $conn->query($sql);
    $msg = "New Admin Added";
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />'; 
     
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin settings</h1>
    </div>
    <div class="row mb-4">
        <div class="col">
            <a href="room.php" class="btn btn-danger ">
                <i class="fas fa-long-arrow-alt-left"></i>
                Back</a>
        </div>
    </div>

    <!-- add admin -->
    <div class=" card rounded shadow mb-4 p-4">
        <form action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="uname" class="form-control" required="required" >
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" required="required" >
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="text" name="pass" class="form-control" required="required" >
            </div>
            <p class="text-danger"><?php echo $msg; ?></p>
            <input type="submit" name="addadmin" class="btn btn-primary" value="Add Admin">
        </form>
    </div>

    <!-- Content Row -->
    <!-- table -->
    <p class="text-danger card shadow p-2 font-weight-bold">Available Admins</p>
    <table class="table ">
        <thead>
            <tr>
            <th>Name</th>
            <th>email</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT * FROM admin";
            $data = $conn->query($sql);
            while($row = $data->fetch_assoc()){
                echo'
            <tr>
                <td>'.$row["a_name"].'</td>
                <td>'.$row["a_email"].'</td>';

                if(($row['default_admin'] == '1') || ($_SESSION["username"] == $row["a_name"]) ){
                    echo '<td>Defaul/Current</td>';
                }else{
                    
                    echo ' 
                <td>
                <form action="" method="post" class="d-inline">
                <input type="hidden" name="id" value='.$row["a_login_id"].'>
                <button class="btn btn-danger" type="submit" name="del">
                <i class="fas fa-trash "></i>
                </button>
                </td>';
                }
                echo '</tr>';
        }
            ?>
        </tbody>
    </table>
   

</div>
<!-- /.container-fluid -->
<?php
 if(isset($_REQUEST['del'])){
     $sql = "DELETE FROM `admin` WHERE a_login_id = '{$_REQUEST['id']}'";
     $conn->query($sql);
     echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />'; 
 } 
?>
<?php include('include/footer.php') ?>