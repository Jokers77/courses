<?php require_once('bdd.php'); ?>
<?php include_once('header.php'); ?>
 
<?php
$req = $pdo->query("SELECT * FROM produit");
?>

<div class="container marge">
  <h1>Gestion des Produits</h1>
</div>

<div class="container">
  <div class="table-responsive">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Nom du produit</th>
        <th>Unité(s)</th>
        <th>Pack(s)</th>
        <th>Modifier</th>
        <th>Supprimer</th>
        <th><a href="addproduit.php"><i class="fa fa-plus" aria-hidden="true"></i>ADD</a></th>
      </tr>
    </thead>
    <tbody>
      	<?php while ($produit = $req->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td><?php echo $produit['nom']; ?></td>
        <td><?php echo $produit['unite']; ?></td>
        <td><?php echo $produit['pack']; ?></td>
        <td><a href="updateproduit.php?id=<?php echo $produit['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
        <td><a href="supp.php?id=<?php echo $produit['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
        <?php } ?>
    </tbody>
  </table>

  </div>
</div>
