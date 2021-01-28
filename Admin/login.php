
<?php
$msg = '';

if(isset($_POST['login'])){
  include('include/database.php');

  $uname = $_POST['aEmail'];
  $pass = $_POST['aPassword'];

  $sql = "SELECT  `a_email`, `a_password`,`a_name`,`a_login_id` FROM `admin` WHERE  a_email = '{$uname}' AND a_password = '{$pass}' ";
  $result = $conn->query($sql);
  
  if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc()){
      session_start();
      $_SESSION["username"] = $row['a_name'];
      $_SESSION["adminid"] = $row['a_login_id'];


      header("LOCATION: index.php");
    }
  }else
  {
    $msg = "USERNAME OR PASSWORD ARE NOT MATCHED.";
  }

}




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <form class="box" method="POST" action="">
        <h2>Login</h2>
        <input type="text" name="aEmail" placeholder="username">
        <input type="password" name="aPassword" placeholder="password">
        <div class="msg"><?php echo $msg; ?></div>
        <input type="submit" value="login" name="login">
    </form>

</body>
</html>