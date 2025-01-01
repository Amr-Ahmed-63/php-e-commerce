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

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Add Product</div>
      <div class="card-body">
        <form action="../../fun/products/add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <input name="name" type="text" id="inputName" class="form-control" placeholder="Name" required="required">
                <label for="inputName">Name</label>
              </div>
            </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="price" type="number" id="inputPrice" class="form-control" placeholder="Price" required="required" autofocus="autofocus">
              <label for="inputPrice">Price</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="sale" type="number" id="inputSale" class="form-control" placeholder="Sale" required="required">
              <label for="inputSale">Sale</label>
            </div>
          </div>
          <div class="form-group">
            <select name="category" id="category">
                <option value="phone">Phone</option>
                <option value="laptop">Laptop</option>
                <option value="pc">PC</option>
            </select>
            <div class="form-group">
              <div class="form-label-group">
                <input name="img[]" multiple type="file" id="inputImg" class="form-control" placeholder="Image" required="required">
              </div>
          </div>

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
