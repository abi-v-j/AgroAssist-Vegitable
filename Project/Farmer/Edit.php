<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "select * from tbl_farmer where farmer_id =".$_SESSION['fid'];
$result = $Con -> query($selQry);
$data = $result -> fetch_assoc();


if(isset($_POST['btn_edit']))
{
	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$contact = $_POST['txt_contact'];
	$address=$_POST["txt_address"];
	
	$upQry = "update  tbl_farmer set farmer_name='$name',farmer_email ='$email',farmer_contact='$contact',farmer_address='$address' where farmer_id=".$_SESSION["fid"];
	if($Con -> query($upQry))
	{
?>
        <script>
		alert("Profile Updated");
		window.location="MyProfile.php";
		</script>
<?php
	      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Farmer Profile</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Edit Profile</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <!-- Profile Image -->
                            <img src="../Assets/Files/UserDocs/image2.jpg" class="rounded-circle mb-3" alt="Farmer Photo" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="form-group">
                                <label for="profileImage" class="form-label">Change Profile Picture</label>
                                <input type="file" class="form-control" id="profileImage">
                            </div>
                        </div>
                        <!-- Edit Profile Form -->
                        <form  method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="txt_name" value="<?php echo $data['farmer_name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="txt_email" value="<?php echo $data['farmer_email']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="txt_address" rows="3" required><?php echo $data['farmer_address']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="tel" class="form-control" id="contact" name="txt_contact" value="<?php echo $data['farmer_contact']; ?>" required>
                            </div>
                            <div class="d-grid">
                                <button  name="btn_edit" type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
<?php
    include("Foot.php");
    ob_flush();
?>
</html>
