<?php
include('include/header.php'); 

$msg = '';

if(isset($_REQUEST['addhostel'])){

    $name = $_REQUEST['name'];
    $cap = $_REQUEST['capacity'];
    $sr = $_REQUEST['Sroom'];
    $dr = $_REQUEST['Droom'];
    $srp = $_REQUEST['SrP'];
    $drp = $_REQUEST['DrP'];
    
    if(($_REQUEST['name'] == "") || ($_REQUEST['capacity'] == "") ||( $_REQUEST['Sroom'] == "") || ($_REQUEST['Droom'] == "") || ($_REQUEST['SrP'] == "") || ($_REQUEST['DrP'] == ""))
    {
        $msg = 'Fill all inputs';
        
    }
    else{
       $sql = "INSERT INTO `hostel`(`hname`, `hcap`, `sroom`, `droom`, `sroomprice`, `droomprice`) VALUES ('$name','$cap','$sr','$dr','$srp','$dr')";
        if($conn->query($sql)== TRUE){
            $msg = 'Hostel added succesfully';
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Hostel</h1>
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

    <div class="card rounded shadow m-2">
        <form class="p-4" action="" method="post">
            <div class="form-group">
                <label for="name">Hostel Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">Single Room</label>
                <input type="number" class="form-control" name="Sroom" id="Sroom">
            </div>
            <div class="form-group">
                <label for="name">Double Room</label>
                <input type="number" class="form-control" name="Droom" id="Droom">
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
                <label for="name">Hostel Student capacity</label>
                <input
                    type="number"
                    class="form-control"
                    name="capacity"
                    id="capacity"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="name">Single Room Price(pm)</label>
                <input type="text" class="form-control" name="SrP" id="SrP">
            </div>
            <div class="form-group">
                <label for="name">Double Room Price(pm)</label>
                <input type="text" class="form-control" name="DrP" id="DrP">
            </div>

            <div class="text-center">
                <input
                    class="btn align-center btn-success"
                    type="submit"
                    value="ADD HOSTEL"
                    name="addhostel"></input>
                <a href="hostel.php" class="btn align-center btn-danger">Close</a>
            </div>
        </form>
    </div>

    <?php include('include/footer.php') ?>