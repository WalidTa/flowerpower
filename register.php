<?php

include 'database.php';

if(isset($_POST['submit'])){

  // maak een array met alle name attributes
  $fields = [
    	"uname",
      "fname",
      "lname",
      "pwd",
      "email"
  ];

$obj = new HelperFunctions();
$no_error = $obj->has_provided_input_for_required_fields($fields);

  // in case of field values, proceed, execute insert
  if($no_error){
    $username = $_POST['uname'];
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $password =$_POST['pwd'];
    $email = $_POST['email'];

    $db = new database('localhost', 'root', '', 'project1', 'utf8');
    $db->create_or_update_user($username, $firstname, $middlename, $lastname, $password, $email);
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
    <form method="post" action='register.php' method='post' accept-charset='UTF-8'>
      <fieldset >
        <legend>Registreer</legend>
        <input type="text" name="username" placeholder="Gebruikersnaam" required/> <br>
        <input type="text" name="firstname" placeholder="Voornaam" required/> <br>
      	<input type="text" name="lastname" placeholder="Achternaam" required/><br/>
        <input type="password" name="pwd" placeholder="Wachtwoord" required/> <br> 
        <input type="submit" name='submit' value="Sign up"/>
      </fieldset>
      <a href="loginCustomer.php">log in plaats daarvan in</a>
    </form>
    </div>
    

    <div id="container"> 
    <div class="head">
       <h1 id="title"> FlowerPower </h1>
    </div>


<div class="zijkant">

<a href="index.php"> <img src="bouquet.png"  width="180" height="150"> </a> <br>
<ul>
<a href="loginEmployee.php">Inloggen medewerkers</a> <br>
<a href="contact.php">Contactpagina</a> <br>
<a href="loginCustomer.php">Inloggen klanten </a>  <br> 
<a href="register.php">Registreren </a> 
</ul>



  	
  </body>
</html>