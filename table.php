<html>
<h1 align="center"style="background-color:magenta;">Table Page</h1>
<table border="1" align="center">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender type</th>
</tr>

<?php
$conn=mysqli_connect("localhost","root","","loginis");
$sql="SELECT * FROM biodata;";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo "<tr><td>".$row['firstname']."<td>".$row['lastname']."<td>".$row['age']."<td>".$row['gendertype'];
}
}
else
{
echo"None";
}
$conn->close();
?>
</table>
</html>
