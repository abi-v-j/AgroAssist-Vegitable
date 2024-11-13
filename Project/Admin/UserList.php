<?php 
include("../Assets/Connection/Connection.php");


if(isset($_GET['acid']))
{
	$upQry = "update tbl_user set user_status='1' where user_id = ".$_GET['acid'];
	if($Con -> query($upQry))
	{
?>
        <script>
		alert("Accepted");
		window.location ="UserList.php";
		</script>
<?php
	}
}
	
	
	
	
if(isset($_GET['rejid']))
{
	$upQry = "update tbl_user set user_status='2' where user_id = ".$_GET['rejid'];
	if($Con -> query($upQry))
	{
?>
        <script>
		alert("Rejected");
		window.location ="UserList.php";
		</script>
<?php
	}
}
	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserList</title>
</head>

<body>
<h3>NewList</h3>
<table width="200" border="1">
  <tr>
    <td>SI No</td>
    <td>District</td>
    <td>Place</td>
    <td>Photo</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Action</td>
  </tr>
  <?php
	$i=0;
	$selQry = "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.user_status='0'";
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/Files/UserDocs/<?php echo $data['user_photo'] ?>" width="70" height="70" /></td>
      <td><?php echo $data['user_name'] ?></td>
      <td><?php echo $data['user_contact'] ?></td>
      <td><a href="UserList.php?acid=<?php echo $data['user_id']?>">Accept</a>/<a href="UserList.php?rejid=<?php echo $data['user_id']?>">Reject</a></td>
    </tr>
<?php
	}
?>
</table>
 
 
 
 
<h3>AcceptedList</h3>
<table width="200" border="1">
  <tr>
    <td>SI No</td>
    <td>District</td>
    <td>Place</td>
    <td>Photo</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Action</td>
  </tr>
  <?php
	$i=0;
	$selQry = "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.user_status='1'";
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/Files/UserDocs/<?php echo $data['user_photo'] ?>" width="70" height="70" /></td>
      <td><?php echo $data['user_name'] ?></td>
      <td><?php echo $data['user_contact'] ?></td>
      <td><a href="UserList.php?rejid=<?php echo $data['user_id']?>">Reject</a></td>
    </tr>
<?php
	}
?>
</table>



<h3>RejectedList</h3>
<table width="200" border="1">
  <tr>
    <td>SI No</td>
    <td>District</td>
    <td>Place</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Action</td>
  </tr>
  <?php
	$i=0;
	$selQry = "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.user_status='2'";
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/Files/UserDocs/<?php echo $data['user_photo'] ?>" width="70" height="70" /></td>
      <td><?php echo $data['user_name'] ?></td>
      <td><?php echo $data['user_contact'] ?></td>
      <td><a href="UserList.php?acid=<?php echo $data['user_id']?>">Accept</a></td>
    </tr>
<?php
	}
?>
</table>
</body>
</html>