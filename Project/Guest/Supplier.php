<?php
		include("../Assets/Connection/Connection.php");
		if(isset($_POST['btn_register']))
		{
			$name=$_POST['txt_name'];
			$contact=$_POST['txt_contact'];
			$email=$_POST['txt_email'];
			$address=$_POST['txt_address'];
			$place=$_POST['sel_place'];
			
			$photo=$_FILES['file_photo']['name'];
			$tempPhoto=$_FILES['file_photo']['tmp_name'];
			move_uploaded_file($tempPhoto,"../Assets/Files/UserDocs/".$photo);
			$proof=$_FILES['file_proof']['name'];
			$tempProof=$_FILES['file_proof']['tmp_name'];
			move_uploaded_file($tempProof,"../Assets/Files/UserDocs/".$proof);
			
			$password=$_POST['txt_password'];
      $question=$_POST['txt_question'];
			$answer=$_POST['txt_answer'];
			
			$insQry="insert into tbl_supplier
			(supplier_name,supplier_contact,supplier_email,
			supplier_address,place_id,supplier_photo,supplier_proof,supplier_password,supplier_squestion,supplier_answer) values('$name','$contact','$email','$address','$place','$photo','$proof','$password','$question','$answer')";
			if($Con -> query($insQry));
			{
?>
			<script>
			alert("Registered");
            </script>
<?php            
            
            }
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supplier</title>
</head>

<body>
<!-- <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" placeholder=" Enter your Contactnumber"pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email"pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
         <option value="">Select District</option> -->
        <?php
	$selQry = "select * from tbl_district";
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		?>
    <!-- <option value="<?php echo $data['district_id'] ?> "><?php echo $data['district_name'] ?></option> -->
    <?php
	}
	?>
      <!-- </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option value="">Select Place</option>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>Security Question</td>
      <td><label for="txt_question"></label>
      <input type="text" name="txt_question" id="txt_question" required placeholder="Enter your question" /></td>
</tr>
		<tr>
      <td>Answer</td>
      <td><label for="txt_answer"></label>
      <input type="text" name="txt_answer" id="txt_answer" required placeholder="Enter your answer" /></td>
</tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_register" id="btn_register" value="Register" /></td>
    </tr>
  </table>
</form> -->
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






<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v3 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="../Assets/Templates/Registration/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../Assets/Templates/Registration/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>

		<div class="wrapper" style="background-image: url('../Assets/Templates/Registration/images/bg-registration-form-3.jpg');">
			<div class="inner">
				<form action=""  enctype="multipart/form-data" method="post">
					<h3>Registration Form</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Name:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-account-o"></i>
								<!-- <input type="text" > -->
                <input type="text" class="form-control" name="txt_name" id="txt_name" required title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">District:</label>
							<div class="form-holder select">
								<select name="sel_district" id="sel_district" onChange="getPlace(this.value)" required ="required" class="form-control">
                <option value="">Select District</option>
                <?php
                  $selQry = "select * from tbl_district";
                  $result = $Con -> query($selQry);
                  while($data = $result -> fetch_assoc())
                  {
                    ?>
                    <option value="<?php echo $data['district_id'] ?> "><?php echo $data['district_name'] ?></option>
                    <?php
                  }
                  ?>
								</select>
								<i class="fa-solid fa-map-location"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Contact:</label>
							<div class="form-holder">
              <i class="fa-regular fa-address-book"></i>
								<!-- <input type="password"  placeholder="********"> -->
                <input type="text" class="form-control" name="txt_contact" id="txt_contact" required pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9"/></td>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Place:</label>
							<div class="form-holder select">
								<select name="sel_place" id="sel_place" required ="required" class="form-control">
                <option value="">Select Place</option>
								</select>
								<i class="fa-solid fa-map-location"></i>
							</div>
						</div>
					</div>
          <div class="form-group">
            <div class="form-wrapper">
							<label for="">Email:</label>
							<div class="form-holder">
              <i class="fa-regular fa-envelope"></i>
								<!-- <input type="text"> -->
                <input type="email" class="form-control" name="txt_email" id="txt_email" required pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"/></td>
						</div>
						</div>
						<div class="form-wrapper">
							<label for="">Photo:</label>
							<div class="form-holder">
              <i class="fa-solid fa-photo-film"></i>
								<!-- <input type="password" class="form-control" placeholder="********"> -->
                <input type="file" class="form-control" name="file_photo" id="file_photo" required="required" style="padding-top:10px"/></td>
							</div>
						</div>
					</div>
					<div class="form-group">
              <div class="form-wrapper">
                <label for="">Address:</label>
                <div class="form-holder">
                <i class="zmdi zmdi-pin"></i>
								<!-- <input type="password" class="form-control" placeholder="********"> -->
                <textarea name="txt_address" class="form-control" id="txt_address"cols="45" rows="5" requiredplaceholder="Enter your Address"></textarea></td>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Proof:</label>
							<div class="form-holder">
              <i class="fa-solid fa-photo-film"></i>
								<!-- <input type="password" class="form-control" placeholder="********"> -->
                <input type="file" class="form-control" name="file_proof" id="file_proof"  required="required" style="padding-top:10px"/></td>
							</div>
						</div>
					</div>
          <div class="form-group">
          <div class="form-wrapper">
							<label for="">Password:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline"></i>
								<!-- <input type="password"  placeholder="********"> -->
                <input type="password" class="form-control" name="txt_password" id="txt_password" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   />
							</div>
						</div>
            <div class="form-wrapper">
							<label for="">Security Question</label>
							<div class="form-holder select">
              <i class="fa-solid fa-clipboard-question"></i>
								<select name="txt_question" id="txt_question" required ="required" class="form-control">
                <option value="">Select Question</option>
                <option value="">How old are you?</option>
                <option value="">How many plot you have?</option>
								</select>
							</div>
						</div>
					</div>
          <div class="form-group">
          <div class="form-wrapper">
							<label for="">Answer:</label>
							<div class="form-holder">
              <i class="fa-regular fa-comment"></i>
                <input type="text" class="form-control" name="txt_answer" id="txt_answer"  required="required"/></td>
							</div>
						</div>
            <div class="form-wrapper">
							<!-- <label for="">Password:</label> -->
							<div class="form-holder">
								<!-- <i class="zmdi zmdi-lock-outline"></i> -->
								<!-- <input type="password"  placeholder="********"> -->
                <!-- <input type="password" class="form-control" name="txt_password" id="txt_password" required placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   /> -->
                <div class="button-holder" style="padding-top: 26px;">
                  <button name="btn_register" type="submit">Register Now</button>
                </div>
							</div>
						</div>
          </div>
						
					</div>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


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
