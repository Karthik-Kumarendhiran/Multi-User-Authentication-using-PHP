<?php
$host="localhost";
$db="loginis";

try{

$pdo= new PDO("mysql:host=$host;dbname=$db","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){

echo "not connected ".$e->getMessage();
die();
}

$con=mysqli_connect("localhost","root","","loginis");

if(!empty($_POST['id'])){
$id = $_POST['id'];
mysqli_query($con,"DELETE FROM users WHERE id='".$id."'");
echo"Data Deleted Successfully";
mysqli_close($con);
}
?>

<html>
<body>
<style>

table{
 background: linear-gradient(to right, #0066ff 0%, #cc66ff 100%);
}
</style>
<form name="registration" action="deleteusers.php" method="post">
<table align="center" border-radius:20px  bordercolor="white" cellpadding=10 cellspacing=20>
<h1 align="center" style="color:purple;">Registration</h1>
<tr style="font-size:25;color:white"><td>Enter ID <input type="number" required placeholder="ID" name="id" maxlength="10"></td></tr><br>
<tr style="font-size:25;color:white"><td>Enter your User Name <input type="text" required placeholder="Name" name="name"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your Password <input type="password" required placeholder="Password" name="password"></tr></td>
<tr style="font-size:25;color:white"><td>Select type of user <select name="usertype">
    <option>limited user</option>
    <option>Admin</option>
  </select></td></tr>
<tr style="font-size:25;color:white"><td><input type="checkbox" onclick="show()">Show Password</tr></td>
<tr align="center"><td><button type="submit">Submit</tr></td>
</form>
</body>


</html>