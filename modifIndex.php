<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rahma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>modifier un etudiant</h4>
                    </div>
                    <div class="card-body">

                        <form action="modifier.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">cin</label>
                                <input type="text" name="stud_id" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">nom</label>
                                <input type="text" name="nom" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">prenom</label>
                                <input type="text" name="prenom" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">adresse</label>
                                <input type="text" name="adresse" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Classe</label>
                                <input type="text" name="classe" class="form-control" >
                            </div>
                           
                            <div class="form-group mb-3">
                                <button type="submit" name="update_stud_data" class="btn btn-primary">Update Data</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <a href="http://localhost/mini-projet-info1/index.html">HOME</a> 
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>