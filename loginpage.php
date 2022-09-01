<html>
<body>
<style>

table{
 background: linear-gradient(to right, #0066ff 0%, #cc66ff 100%);
}
</style>
<form name="registration" onsubmit="return validate()" method="post" action="loginpage.php">
<table align="center" border-radius:20px  bordercolor="white" cellpadding=10 cellspacing=20>
<h1 align="center" style="color:purple;">Login Page</h1>
<tr style="font-size:25;color:white"><td>Enter your User Name <input type="text" required placeholder="Name" name="name"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your Password <input type="password" required placeholder="Password" name="password"></tr></td>
<tr style="font-size:25;color:white"><td>Select type of user <select name="usertype">
    <option>limited user</option>
    <option>Admin</option>
  </select></td></tr>
<tr style="font-size:25"><td><a href="registrationpage.php"><b>Register as New member</td></tr>
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
if ( !empty($_POST['name']) && !empty($_POST['password'])&& !empty($_POST['usertype'])) 
{
    $name = $_POST['name'];  
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];  
      
$stmt = $pdo->prepare("SELECT * FROM users WHERE name=? and usertype=? and password=?");
$stmt->execute([$name,$usertype,$password]); 
$user = $stmt->fetch();
if ($user) {
              echo"<p style='font-size:25;color:purple;background-color:cyan' align='center''>Valid User";
if($usertype=="Admin")
{
 echo"<tr><td><a href='testtable.php'><b style='font-size:25;color:yellow'>LOGIN</td></tr>"; 
}
if($usertype=="limited user")
{
 echo"<tr><td><a href='table.php'><b style='font-size:25;color:yellow'>LOGIN</td></tr>"; 
}
               
} 


else {
   echo"<p style='font-size:25;color:purple;background-color:cyan' align='center'>Invalid User";
} 
}

?>