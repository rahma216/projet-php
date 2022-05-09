<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'gestion_etudiant');
if(isset($_POST['delete'])){
    $delete=$_POST["delete"];
    $nom=$_POST['nom'];
    $query="DELETE FROM `etudiant` WHERE nom='$nom' ";
    $query_run=mysqli_query($connection,$query);
    
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
   </head>
<form name="fo" method="POST" action="">
<input type="text" name="nom" placeholder="nom"  /><br />
<input type="submit" name="delete" value="delete" /><br/>

</form>
<a href="http://localhost/mini-projet-info1/index.html">HOME</a> 
</html>