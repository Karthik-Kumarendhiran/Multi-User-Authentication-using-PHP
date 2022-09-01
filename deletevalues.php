<html>
<body>
<style>

table{
 background: linear-gradient(to right, #0066ff 0%, #cc66ff 100%);
}
</style>
<form name="delvalues" onsubmit="return validate()" method="post">
<table align="center" border-radius:20px  bordercolor="white" cellpadding=10 cellspacing=20>
<h1 align="center" style="color:purple;">Deletion Page</h1>
<tr style="font-size:25;color:white"><td>First Name <input type="text"  name="firstname"></tr></td><br>
<tr style="font-size:25;color:white"><td>Last Name <input type="text"  name="lastname"></tr></td>
<tr style="font-size:25;color:white"><td>Age <input type="number" name="age"></tr></td>
<tr style="font-size:25;color:white"><td>Select Gender <select name="gendertype">
    <option>Male</option>
    <option>Female</option>
  </select></td></tr>
<tr align="center"><td><button type="submit">Submit</tr></td>
</form>
</body>

</script>
</html>
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

$firstname = $_POST['firstname'];
mysqli_query($con,"DELETE FROM biodata WHERE firstname='".$firstname."'");
echo"Data Deleted Successfully";
mysqli_close($con);

?>