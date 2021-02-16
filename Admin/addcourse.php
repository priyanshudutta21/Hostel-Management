<?php
include('include/header.php'); 
$msg ='';

if(isset($_REQUEST['AddCourse']))
{
    $cname = $_REQUEST['cname'];

    if(($_REQUEST['cname'] == ""))
    {
        $msg = 'Fill all details';
        
    }
    else{
       $sql = "INSERT INTO `course`(`cname`) VALUES ('$cname')";
        if($conn->query($sql)== TRUE)
        {
            $msg = 'course added succesfully';
        }
    
    }
}

?> 

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Course</h1>
</div>

<!-- add stud -->
<div class="text-center font-weight-bold">
    <p class="align-center text-danger"><?php echo $msg; ?></p>
    
</div>

<div class="card rounded shadow m-2">
    <form class="p-4" action="" method="post">
       <div class="form-group">
           <label for="name">Course Name</label>
           <input type="text"  class="form-control" name="cname" id="cname">
       </div>
       <div class="text-center">
       <input class="btn align-center btn-success" type="submit" value="ADD COURSE" name="AddCourse"></input>
       <a href="course.php" class="btn align-center btn-danger">Close</a>
    </div>
    </form>
</div>


<?php include('include/footer.php') ?>