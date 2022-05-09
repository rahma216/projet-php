<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>rahma</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <a href="http://localhost/mini-projet-info1/index.html" >HOME</a> 
    <style>
        h1 {
            border-bottom: 3px solid #cc9900;
            color: #996600;
            font-size: 30px;
        }
        table, th , td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 10px;
        }
        table tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        table tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>
<body onload="refresh()">
<h2><?php echo $bienvenue?></h2>
      
    
     

<h1>Liste des groupes</h1>
<div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                    <table class="table table-bordered">
                         <thead>
                                <tr>
                                    <th>section</th>
                                    <th>niveau</th>
                                    <th>classe</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
<?php 
$con = mysqli_connect("localhost","root","","gestion_etudiant");
$query = "SELECT * FROM groupe " ;
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0)
{
    foreach($query_run as $items)
    {
        ?>
        <tr>
            <td><?= $items['section']; ?></td>
            <td><?= $items['niveau']; ?></td>
            <td><?= $items['classe']; ?></td>
     
  
        </tr>
        <?php
    }
}
?>

</tbody>
                    </table>




</body>
</html>