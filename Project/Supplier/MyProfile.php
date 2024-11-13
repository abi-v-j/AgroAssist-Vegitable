<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "select * from tbl_supplier where supplier_id =".$_SESSION["sid"];
$result = $Con -> query($selQry);
$data = $result -> fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supplier Profile</title>

<!-- Bootstrap CDN -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wn1+Bl6k9oX0zIs0yS23sAXqiJ/N6tOe6u6O0qO5SzxOhgOzK8oNP3m9/XgaISe" crossorigin="anonymous"> -->
</head>

<body>
<div class="container mt-5">
  <h1 class="text-center mb-4">Supplier Profile</h1>
  <form id="form1" name="form1" method="post" action="">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <div class="text-center mb-4">
              <img class="rounded-circle img-fluid" name="img_photo" id="img_photo" src="../Assets/Files/UserDocs/image4.jpg" alt="Supplier Image" width="150" />
            </div>
            <table class="table table-bordered">
              <tr>
                <th scope="row">Name</th>
                <td><?php echo $data["supplier_name"]?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td><?php echo $data["supplier_email"]?></td>
              </tr>
              <tr>
                <th scope="row">Contact</th>
                <td><?php echo $data["supplier_contact"]?></td>
              </tr>
              <tr>
                <th scope="row">Address</th>
                <td><?php echo $data["supplier_address"]?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Bootstrap JS and dependencies -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-mrRXh83Mz3F5mn/R4ljMxVUpyXSNtc6jbCkgUzmcpQ7eRi5KR3RV5Tw1wk8y6XJT" crossorigin="anonymous"></script> -->

</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
