<?php
session_start();
$con = mysqli_connect("localhost","root","","gestion_etudiant");

if(isset($_POST['update_stud_data']))
{
    $cin = $_POST['stud_id'];

    $no = $_POST['nom'];
    $preno = $_POST['prenom'];
    $emai = $_POST['email'];
    $adress = $_POST['adresse'];
    $clas = $_POST['classe'];


    $query = "UPDATE etudiant SET cin='$cin', nom='$no', prenom='$preno',email='$emai' , adresse='$adress'  , classe='$clas' WHERE cin='$cin' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: modifIndex.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: modifIndex.php");
    }
}

?>

