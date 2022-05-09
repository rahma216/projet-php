<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("auth-php-mysql/login.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Ajouter Etudiant</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    <title>Title</title>
    <style>
    h1{
        border-bottom: 3px solid #cc9900;
        color: #996600;
        font-size: 30px;
    }
    </style>
</head>
<body>
<h2><?php echo $bienvenue?></h2>
<a href="http://localhost/mini-projet-info1/index.html">HOME</a> 
      [<a href="afficherEtudiants.php">Afficher Etudiant</a>]
    
<h1>Ajouter un etudiant</h1>
<p>
<main role="main">
  

<div class="container">
    <form id="myForm" method="POST"  >
    <div class="form-group">
     <label for="nom">Nom:</label><br>
     <input type="text" id="nom" name="nom" class="form-control" required autofocus>
    </div>
    <div class="form-group">
     <label for="prenom">Prénom:</label><br>
     <input type="text" id="prenom" name="prenom" class="form-control" required>
    </div>
    <div class="form-group">
     <label for="cin">CIN:</label><br>
     <input type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
    </div>
    Mot de passe:
    <br><input type="password" id="pwd" name="pwd" class="form-control"  required/><br>
    Confirmer Mot de passe:
    <br><input type="password" id="cpwd" name="cpwd" class="form-control"  required/><br>
    E-mail:
    <br><input type="email" id="email" name="email" class="form-control"  required/><br>
    Classe:
    <br><input type="text" id="classe" name="classe" class="form-control"  required/><br>
    Adresse:
    <br><input type="text" id="adresse" name="adresse" class="form-control"  required/><br>
    <button type="button" onclick="ajouter()">Ajouter</button>
    
</div>
</main>
</form>

<script  src="./assets/dist/js/inscrire.js"></script>
</p>
<div id="demo"></div>
<script>
    function ajouter()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini-projet-info1/auth-php-mysql/ajouter.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {   
                
                if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="L'ajout de l'étudiant a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'étudiant est déjà inscrit, merci de vérifier le CIN";
                        document.getElementById("demo").style.backgroundColor="#fba";
                    }
                }
            }
        
        
    }
    </script>
</body>
</html>