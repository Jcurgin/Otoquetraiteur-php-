<?php
    require 'database.php';

    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }
    $db = database::connect();
    $stmt = $db->prepare('SELECT items.name, items.id, items.description,items.image, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?');
    $stmt->execute(array($id));
    $item = $stmt->fetch();    
    database::disconnect();

    
  function checkInput($data){
    $data =trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
    
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
                <div class="col-sm-6">
                        <h4><strong>Voir un item</strong></h4>
                        <br>
                        <form action="">
                            <div class="form-group">
                                <label>Nom :</label><?= $item['name'];?>
                            </div>
                            <div class="form-group">
                                <label>Description :</label><?= $item['description'];?>
                            </div>
                            <div class="form-group">
                                <label>Prix :</label><?= number_format((float)$item['price'], 2, '.', '').'€';?>
                            </div>
                            <div class="form-group">
                                <label>Catégorie :</label><?= $item['category'];?>
                            </div>
                            <div class="form-group">
                        <label>Image:</label><?php echo '  '.$item['image'];?>
                      </div>
                      <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                        </form>
                </div>
                <div class="col-sm-6 site">
                <div class="card mb-3" >
                        <div class="card p-2" >
                        <img src="<?php echo '../images/'.$item['image'];?>" alt="...">
                        <div class="price"><?= number_format((float)$item['price'], 2, '.', '').'€';?></div>
                        <div class="caption">
                            <h4><?= $item['name'];?></h4>
                            <p><?= $item['description'];?></p>
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><i class="fas fa-shopping-cart"></i>Commander</a>
                        </div>
                        </div>
                </div> 
                </div>
     
            </div>



        </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
  </html>



