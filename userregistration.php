<?php
$db_host = 'mysql';
$db_user = 'root';
$db_pwd = 'asdf';

$database = 'comments';

$connect = new mysqli($db_host, $db_user, $db_pwd, $database);

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");


if(empty($_POST))
{
echo "";
echo $_POST;
}
else if (!empty($_POST) && $_POST['username'] != "" && $_POST['password'] != "")
{
echo "///"; 

echo "<b>" . $_POST['username'] . "</b>";
$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO Users (email, password) VALUES ('$username', '$password')";
if (mysqli_query($connect, $query)) 
{
echo " has been created successfully";
} 
else 
{
echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
mysqli_close($conn);
}
else if ($_POST['username'] == "" && $_POST['password'] != "")
{
echo "Username field is blank <br>";
}
else if ($_POST['username'] <= 4 && $_POST['username'] >= 11)
{
echo "Username must be between 4 and 11 characters<br>";
}
else if ($_POST['password'] == "" && $_POST['username'] != "")
{
echo "Password field is blank";
}
else if ($_POST['password'] < 6)
{
echo "Password must be longer then 6 characters<br>";
}

else if ($_POST['username'] == "" && $_POST['password'] == "")
{
echo "Username and Password field are blank <br>";
}
else if (mysql_num_rows($query) == 1)
{
echo "Username alread exists";
}
?>

<form id='login' action='userregistration.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Creating New User</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >Email:</label>
<input type='text' name='username' id='username'  maxlength="50" />
 
<label for='password' >Password:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>
</form>