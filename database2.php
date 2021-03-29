<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "flowerpower";
 
try {
  $dsn = 'mysql:host='. $host .'; dbname='.$dbname;
  $conn = new PDO($dsn, $user, $password);
  
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  
} 
catch(PDOException $e) 
{
  $error->getMessage();
  echo '<h1>Database failed to connect</h1>';
}
?> 