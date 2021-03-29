<?php 

include_once ("database2.php");


$artikelen = $conn->query("SELECT * FROM artikel ORDER BY artikelcode ASC"); 


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

    <div id="container"> 
        <div class="head">
          <h1 id="title"> FlowerPower </h1>
    </div>


      <style>
      table {
        font-family: serif, garamond;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #FFFFFF;
        text-align: left;
        padding: 10px;
      }

      tr:nth-child(even) {
        background-color: #a3a9b8;
      }
      tr:nth-child(odd) {
        background-color: #c0c3cc;
      }
      </style>
  <body>

<h2>Artikelen</h2>

<table>
    <thead>
        <th>
                <th scope="col">artikelcode</th>
                <th scope="col">artikel</th>
                <th scope="col">prijs</th>
        </th>
        
    </thead>
      <tbody>

        <?php 
          while($info = $artikelen->fetch(PDO::FETCH_ASSOC)){ 
              echo "<tr>";
              echo "<th>".$info['artikelcode']."</th>";
              echo "<th>".$info['artikel']."</th>";
              echo "<th>".$info['prijs']."</th>";
              echo "<th><a href=\"delete_artikelen.php?id=$info[artikelcode]\" class='btn btn-warning'>Edit</a> | <a href=\"delete_artikelen.php?id=$info[artikelcode]\" onClick=\"return confirm('Weet je zeker dat je wilt verwijderen?')\"class='btn btn-danger'>Delete</a></th>";
          }

          ?>
          
      </tbody>
</table>
    
</body>

</html>