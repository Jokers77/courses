<?php require_once('bdd.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body ng-app>

  <?php include('header.php'); 
    if (isset($_GET['page'])) {
      if ($_GET['page'] == 'produit.php') {
        include('produit.php');
      }
    }
    if (isset($_GET['page'])) {
      if ($_GET['page'] == 'gestion.php') {
        include('gestion.php');
      }
    }  

  $req = $pdo->query("SELECT * FROM produit ORDER BY id");

  ?>

<div class="container marge">
  <h1>Liste des Produits</h1>
</div>

<div class="container">
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-inverse">
        <tr>
          <th>Nom du produit</th>
          <th>Unités</th>
          <th>Packs</th>
          <th></th>
          <th></th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          <?php while ($produit = $req->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $produit['nom']; ?></td>
          <?php if($produit['unite'] < 2 && $produit['pack'] <= 1) { ?>
              <td class="bg-danger"><?php echo $produit['unite']; ?></td>
          <?php } else {   ?>
            <td><?php echo $produit['unite']; ?></td>
        <?php } ?>
        <?php if($produit['pack'] <= 1 && $produit['unite'] < 2) { ?>
              <td class="bg-danger"><?php echo $produit['pack']; ?></td>
            <?php } else {   ?>
              <td><?php echo $produit['pack']; ?></td>
            <?php } ?>
            <td></td>
            <td></td>
            <td>
              <select ng-model="mySelect" name="produit" ng-change="updateItem(produit.id, mySelect)">
                    <option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10]" >{{ i }}</option>
                </select>
              <select ng-model="mySelect" name="produit" ng-change="updateItem(produit.id, mySelect)">
                  <option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10]" >{{ i }}</option>
              </select>
            </td>
          </tr>
          <?php } ?>
      </tbody>
    </table>



  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

</body>
</html>
