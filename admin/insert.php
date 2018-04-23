<?php
    require 'database.php';

    $db = database::connect();

    $categories = $db->query('SELECT * FROM categories');
    


    $name = $description = $price = $image = '';
    $errors = [];

    if(!empty($_POST)){
     
        
        if(empty($_POST['name'])){
            $errors[] = "Veuillez renseigner le nom de l'item";
        }
        if(empty($_POST['description'])){
            $errors[] = "Veuillez renseigner la description de l'item";
        }
        if(empty($_POST['price'])){
            $errors[] = "Veuillez renseigner le prix de l'item";
        }
        if(empty($_POST['category'])){
            $errors[] = "Veuillez renseigner la categorie de l'item";
        }

      

        if(empty($errors)){
    $query = <<<EOS
INSERT INTO items (
    name,
    description,
    price,
    image,
    category
) VALUES (
    :name,
    :description,
    :price,
    :image,
    :category
)

EOS;
        $stmt = $db->prepare($query);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':price', $_POST['price']);
        $stmt->bindValue(':image', $_POST['image']);
        $stmt->bindValue(':category', $_POST['category']);
        $stmt->execute();

        //header("Location: index.php");

    die;
        }
    } 
       
if (!empty($errors)) :
    
?>
    <div class="alert alert-danger">
        <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
        <?= implode('<br>', $errors); // implode transforme un tableau en chaîne de caractères ?>
    </div>
<?php
endif;
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
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> O'toque Recette <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
                <h1><strong>Ajouter un item</strong></h1>
                <br>
                <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $name; ?>">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?= $description; ?>">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?= $price; ?>">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <select class="form-control" id="category" name="category">
                        <option value=""></option>
                           <?php
                                foreach($categories as $categorie):
                            ?> 
                        <option value="<?= $categorie['id']; ?>"><?= $categorie['name']; ?></option>

                        <?php
                            endforeach;
                        ?>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image"> 
                        <span class="help-inline"></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            
        </div>   



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
  </html>

