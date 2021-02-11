<?php
include 'database.php';
// hier onder is de eerste insert maar we moeten inloggen
//$obj = new database();
//$obj->insertKlantUser('walid', 'root');

$msg = '';
if(isset($_POST['submit'])){

    $fieldnames = ['username', 'password'];
    $error = false;

    foreach($fieldnames as $fieldname){
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $error = true; 
            $msg = 'error';
        }

    }

    if(!$error){
        $obj = new database();
        $obj->loginklant($_POST['username'], $_POST['password']);
        //login
    }else{
        //niks
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Power</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="foto">
    <img src="ical1d5e17k51.png" class="winkel">
</div>

<div id="container"> 
    <div class="head">
       <h1 id="title"> FlowerPower </h1>
    </div>


</div>

<div class="zijkant">

    <a href="index.php"> <img src="bouquet.png"  width="180" height="150"> </a> <br>

<form method="post" action="klant.php" class="logklant">
                <h3 class="customer">log in als klant: </h3>
                <input type="text" name="username" placeholder="Username.." required/><br> <br>
                <input type="password" name="password" placeholder="Password.." required/><br> <br>
                <button type="submit" class="btn">Login</button><br>
            </form>



</div>





</body>
</html>