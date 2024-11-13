<?php 
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']))
{
	$name = $_POST['txt_name'];
	$address = $_POST['txt_address'];
	$contact = $_POST['txt_ph'];
	$email = $_POST['txt_email'];

	$place = $_POST['sel_place'];
	$photo = $_FILES['file_photo']['name'];
	$tempphoto = $_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto,"../Assets/Files/UserDocs/".$photo);
	$gender = $_POST['gender'];
	$dob = $_POST['date_DOB'];
	$password = $_POST['txt_password'];
	$insQry = "insert into tbl_user(user_name,user_address,user_contact,user_email,place_id,user_photo,user_gender,user_dob,user_password) values('$name','$address','$contact','$email','$place','$photo','$gender','$dob','$password')";
	if($Con -> query($insQry))
	{
?>
        <script>
		alert("Inserted");
		</script>
<?php
	}
}


if(isset($_GET['did']))
{
	$delQry = "delete from tbl_user where user_id = ".$_GET['did'];
	if($Con -> query($delQry))
	{
?>
        <script>
		alert("Deleted");
		window.location ="NewUser.php";
		</script>
<?php
	}
}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SignUp form</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="519" border="1">
    <tr>
    <td>Name</td>
	<td><input type="text" name="txt_name" id="txt_name"required="required" placeholder="Enter your Email" pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" ></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_ph"></label>
      <input type="text" name="txt_ph" id="txt_contact"  placeholder="Enter Your number"required></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input name="txt_email" type="email" id="txt_email" required="required" placeholder="Enter your Email" pattern="/^[a -zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"></td>
    </tr>
    <tr>
      <td>District</td>
      <td id="sel_district"><label for="txt_district"  ></label>
        <label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)" required="required">
        <option value="">Select District</option>
<?php
	$selQry = "select * from tbl_district";
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		
?>
        <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
<?php
	}
?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
        <label for="sel_place"></label>
        <select name="sel_place" id="sel_place" required="required">
        <option>---Select----</option>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" required="required" /></td>
      <tr>
		<td>Gender</td>
		<td><input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
  	 </td>
      </tr>
       <tr>
      <td>Date of Birth</td>
 	  <td>
 	    <label for="txt_date"></label>
 	    <input type="date" name="date_DOB"  /></td>
 	  </tr>
      <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required"placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password2" id="txt_password" required="required"placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></td>
    </tr>
      <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_submit" id="btn_submit" value="Sign Up" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
    </table>
</form>
</body>
 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

</script>
</html>
