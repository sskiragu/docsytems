
<?php
@session_start();
include_once '../connection.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$sql="SELECT * FROM user where email = '$email' AND password = '$password'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<html>
<head>
<style type="text/css">
#viewdata table{
    border:1px solid #aaa;
}
#viewdata th{background:#aaa;}
#viewdata td{background:#efefef;}
#viewdata th,td{padding:5px;text-align:left;}
</style>
<table id="viewdata">
<tr>
<th>#</th>
<th>First name</th>
<th>Last name</th>
<th>Phone number</th>
<th>Email Address</th>
<th>User Type</th>
<th>Action</th>
</tr>
<?php
while($row=mysqli_fetch_assoc($res))
{

echo "<tr><td>";
echo $row['id'];
echo "</td><td>";
echo $row['fname'];
echo "</td><td>";
echo $row['lname'];
echo "</td><td>";
echo $row['phone'];
echo "</td><td>";
echo $row['email'];
echo "</td><td>";
echo $row['type'];
echo "

<td><a href=\"#\" onclick=\"getPage('Edit.php?data=".$row['id']."')\">Edit</a></td></tr>";
}
mysqli_close($con);
?>
</table>
