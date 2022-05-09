<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'gestion_etudiant');
if(isset($_POST['delete'])){
    $delete=$_POST["delete"];
    $classe=$_POST['classe'];
    $query="DELETE FROM `groupe` WHERE classe='$classe' ";
    $query_run=mysqli_query($connection,$query);
    
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
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
<input type="text" name="classe" placeholder="classe"  /><br />
<input type="submit" name="delete" value="delete" />
<br />


</form>
<a href="http://localhost/mini-projet-info1/index.html">HOME</a> 
</html>