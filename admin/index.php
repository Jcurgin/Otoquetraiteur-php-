
<?php
    require 'database.php';

    $db=database::connect();
    $query = 'SELECT items.name, items.id, items.description, items.price, categories.name AS category FROM items JOIN categories ON items.category = categories.id ORDER BY items.id DESC';
    $stmt = $db->query($query);
    $items = $stmt->fetchAll();
?>





<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
    <title>O'toque Recette</title>
  </head>
  <body>
    <h1 class="text-logo">  <span class="glyphicon glyphicon-cutlery" aria-hidden="true"> O'toque Recette</span class="glyphicon glyphicon-cutlery" aria-hidden="true">  </h1>

        <div class="container admin">
            <div class="row">
                <h4> <strong> Liste des items </strong> </h4><a href="insert.php" class=" btn btn-success"><i class="fas fa-plus"></i> Ajouter</a>

                <table class="table table-stripped table-bordered">
                    <thead>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Action</th>
                    </thead>
                    <?php
	
	                    foreach ($items as $item) :
	                ?>
                    <tbody> 
                        <tr>
                            <td><?= $item['name'];?></td>
                            <td><?= $item['description'];?></td>
                            <td><?= $item['price'];?></td>
                            <td><?= $item['category'];?></td>
                            <td width=350>
                                <a href="view.php?id=<?= $item['id'];?>"class="btn btn-outline-info"><i class="fas fa-eye"></i>Voir</a>
                                <a href="update.php?id=<?= $item['id'];?>" class="btn btn-primary"><i class="fas fa-edit"></i>Modifier</a>
                                <a href="delete.php?id=<?= $item['id'];?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Supprimer</a>
                            </td>
                        </tr> 

                    </tbody>
                    <?php
	
                        endforeach;
                    ?>
                </table>
            </div>



        </div>
























    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
  </html>