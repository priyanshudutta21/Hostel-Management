<?php
define('TITLE', 'Hostel');
define('PAGE', 'hostel');
include('include/header.php'); 

if(isset($_REQUEST['updatehstl'])){

   
    $id = $_REQUEST['hid'];
    $name = $_REQUEST['name'];
    $cap = $_REQUEST['capacity'];
    $sr = $_REQUEST['Sroom'];
    $dr = $_REQUEST['Droom'];
    $srp = $_REQUEST['SrP'];
    $drp = $_REQUEST['DrP'];
    // check empty 
    if(($_REQUEST['name'] == "") || ( $_REQUEST['Sroom'] == "") || ($_REQUEST['Droom'] == "") || ($_REQUEST['SrP'] == "") || ($_REQUEST['DrP'] == ""))
    {
        $msg = 'Fill all inputs';
        
    }
    else{
        $sql = "UPDATE `hostel` SET `hname`= '$name',`hcap`='$cap',`sroom`='$sr',`droom`='$dr',`sroomprice`='$srp',`droomprice`='$drp' WHERE hid = '$id' ";
        // $msg = $sql;
        if($conn->query($sql)== TRUE){
            $msg = 'Updated succesfully';
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Hostel</h1>
    </div>
    <div class="row mb-4">
        <div class="col">
            <a href="hostel.php" class="btn btn-danger ">
                <i class="fas fa-long-arrow-alt-left"></i>
                Back</a>
        </div>
    </div>

    <!-- add stud -->
    <div class="text-center font-weight-bold">
        <p class="align-center text-danger"><?php echo $msg; ?></p>

    </div>
    <?php
    if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM hostel WHERE hid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    }
    ?>
    <div class="card rounded shadow m-2">
        <form class="p-4" action="" method="post">
            <div class="form-group">
                <label for="name">Hostel ID</label>
                <input
                    type="text"
                    class="form-control"
                    name="hid"
                    id="hid"
                    value="<?php if(isset($row['hid'])) {echo $row['hid']; }?>"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="name">Hostel Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="<?php if(isset($row['hname'])) {echo $row['hname']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Single Bed Room</label>
                <input
                    type="number"
                    class="form-control"
                    name="Sroom"
                    id="Sroom"
                    value="<?php if(isset($row['sroom'])) {echo $row['sroom']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Double Bed Room</label>
                <input
                    type="number"
                    class="form-control"
                    name="Droom"
                    id="Droom"
                    value="<?php if(isset($row['droom'])) {echo $row['droom']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Total Room</label>
                <input
                    type="number"
                    class="form-control"
                    name="Troom"
                    id="Troom"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="name">Hoste Student capacity</label>
                <input
                    type="number"
                    class="form-control"
                    name="capacity"
                    id="capacity"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="name">Single Bed Room Price(pm)</label>
                <input
                    type="text"
                    class="form-control"
                    name="SrP"
                    id="SrP"
                    value="<?php if(isset($row['sroomprice'])) {echo $row['sroomprice']; }?>">
            </div>
            <div class="form-group">
                <label for="name">Double Bed Room Price(pm)</label>
                <input
                    type="text"
                    class="form-control"
                    name="DrP"
                    id="DrP"
                    value="<?php if(isset($row['droomprice'])) {echo $row['droomprice']; }?>">
            </div>

            <div class="text-center">
                <input
                    class="btn align-center btn-success"
                    type="submit"
                    value="Update"
                    name="updatehstl"></input>
                <a href="hostel.php" class="btn align-center btn-danger">Close</a>
            </div>
        </form>
    </div>

    <?php include('include/footer.php') ?>