<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("auth-php-mysql/connexion.php");
      $sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:index.html");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR Se Connecter</title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/signin.css" rel="stylesheet">
    
  </head>
  <body  onLoad="document.fo.login.focus()" class="text-center">


<form id="myForm" class="form-signin" name="fo" method="post" action="">
  <img class="mb-4" src="./assets/brand/user-login.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
  <label for="inputText" class="sr-only">name:</label>
  <input type="text" name="login" placeholder="Login" class="form-control" /><br />

  <label for="inputPassword" class="sr-only">Mot de Passe</label>
  <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
         <input type="submit" class="form-control" name="valider" value="valider" /><br>
         <br />
  <div class="erreur"><?php echo $erreur ?></div><br />
  <br><a  class="form-control" href="auth-php-mysql/inscription.php"> Créer un Compte</a>
  
  <p class="mt-5 mb-3 text-muted">&copy; SOC-Enicar 2021-2022</p>
 
</form>


</script>
  </body>
</html>

