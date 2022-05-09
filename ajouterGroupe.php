<?php
   session_start();
   @$classe=$_POST["classe"];
   @$section=$_POST["section"];
   @$niveau=$_POST["niveau"];
   @$valider=$_POST["valider"];
   $erreur="";
   $rahma="";
   if(isset($valider)){
      if(empty($classe)) $erreur="classe laissé vide!";
      elseif(empty($section)) $erreur="section laissé vide!";
      elseif(empty($niveau)) $erreur="niveau laissé vide!";
      else{
         include("auth-php-mysql/connexion.php");
         $sel=$pdo->prepare("select id from enseignant where login=? limit 1");
         $sel->execute(array($classe));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="groupe existe déjà!";
         else{
            $ins=$pdo->prepare("insert into groupe(classe,section,niveau) values(?,?,?)");
            if($ins->execute(array($classe,$section,$niveau)))
            $rahma="groupe validé";
         }   
      }
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
   <body>
      <h1>Inscription</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="section" placeholder="section" value="<?php echo $section?>" /><br />
         <input type="text" name="niveau" placeholder="nivaeu" value="<?php echo $niveau?>" /><br />
         <input type="text" name="classe" placeholder="classe" value="<?php echo $classe?>" /><br />
         <input type="submit" name="valider" value="valider" />
      </form>
      <?php echo $rahma ?></div>
      <a href="http://localhost/mini-projet-info1/index.html">HOME</a> 
   </body>
</html>