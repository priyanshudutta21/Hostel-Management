<?php
session_start();
if(!isset($_SESSION["username"])){

    header("LOCATION: /index.php");

}
else{
    include('dashboard.php');
}
?>
