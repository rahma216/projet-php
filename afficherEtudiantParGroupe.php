<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>afficher les etudiants d'un groupe </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT distinct* FROM groupe WHERE CONCAT(classe,section,niveau) LIKE '%$filtervalues%' ";
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
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">GROUPE INTROUVABLE</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                    </table>
                        <table class="table table-bordered">

                            <thead>
                        
                                <tr>
                                   
                                    <th>nom </th>
                                    <th> prenom</th>
                                    <th> cin</th>
                                    <th>email </th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","gestion_etudiant");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query1 = "SELECT distinct e.cin, e.nom ,e.prenom,e.email FROM etudiant e,groupe g WHERE e.classe LIKE '%$filtervalues%'  ";
                                        $query_run1 = mysqli_query($con, $query1);

                                        if(mysqli_num_rows($query_run1) > 0)
                                        {
                                        while($row=mysqli_fetch_assoc($query_run1))
                                        {
                                    
                                                ?>
                                                <tr>
                                                   
                                                    <td><?php echo $row['cin'] ?></td>
                                                    <td><?php echo $row['nom'] ?></td>
                                                    <td><?php echo $row['prenom'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                </tr>
                                                <?php
                                          
                                       
                                       }
                                    }
                                       else
                                       {
                                           ?>
                                               <tr>
                                                   <td colspan="4">etudiant introuvale</td>
                                               </tr>
                                           <?php
                                       }
                                }
                               
                                ?>
                            </tbody>
                        </table>
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