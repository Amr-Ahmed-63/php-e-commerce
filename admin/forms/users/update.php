<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<?php

require "../../connect.php";
$id = $_GET["id"];
if($_SESSION["login"]["priv"] == 0){
  if($_SESSION["login"]["id"] != $id){
    header("location:../../users.php");
  }
}
$user = $connect->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();

?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Update User</div>
      <div class="card-body">
        <form action="../../fun/users/update.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" value="<?= $user["email"] ?>" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input name="name" value="<?= $user["name"] ?>" type="text" id="inputName" class="form-control" placeholder="Name" required="required">
              <label for="inputName">Name</label>
            </div>
            <input name="id" value="<?= $id ?>" type="hiden" class="form-control d-none">
          </div>
          <div class="form-group">
            <select name="gender" id="gender">
                <option value="1" <?= $user["gender"]==1?"selected":"" ?> >Male</option>
                <option value="0" <?= $user["gender"]==0?"selected":"" ?> >Female</option>
            </select>
            <select name="priv" id="priv">
                <option value="1" <?= $user["priv"]==1?"selected":"" ?> >Admin</option>
                <option value="0" <?= $user["priv"]==0?"selected":"" ?> >User</option>
            </select>
          </div>
          <span class="text-danger">
            <?php
          if(isset($_GET["error"])){
            echo $_GET["error"];
          }
          ?>
          </span>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
