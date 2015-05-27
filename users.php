<?php
$host = "mysql";
$username = "root";
$pw = "asdf";
$db = "Comments";

$connect = new mysqli($host,$username, $pw, $db);

if ($connect->connect_error)
{
 die("Connection failed: " . $connect->connect_error);
}

$test = "SELECT email FROM User";
$result = $connect->query($test);

if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
  echo "email: " . $row["email"] . "<br>";
 }
}
else
echo "Nothing in table"; 

?>