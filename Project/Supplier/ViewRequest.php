<?php
ob_start();
include("Head.php");
		include("../Assets/Connection/Connection.php");
		session_start();			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Request</title>
</head>

<body>
<table border="1">
    <tr>
      <td>-Sl No</td>
      <td>Photo</td>
      <td>Discription</td>
      <td>Farmer Name</td>
      <td>Contact No</td>
    </tr>
 <?php
	$i=0;
	$selQry = "select * from tbl_advertisement a inner join tbl_farmer f on a.farmer_id=f.farmer_id  where a.farmer_id !='' and supplier_id='".$_SESSION['sid']."'";
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
?>

    <tr>
      <td><?php echo $i; ?></td>
      <td><img src="../Assets/Files/UserDocs/<?php echo $data['adv_photo']?>"  width="70" height="70" /></td>
       <td><?php echo $data['adv_discription'] ?></td>
      <td><?php echo $data['farmer_name'] ?></td>
      <td><?php echo $data['farmer_contact'] ?></td>
<?php
	}
?>
  </table>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>