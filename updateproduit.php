<?php require_once('bdd.php'); ?>
<?php require_once('header.php'); ?>

<?php
	
	if (!empty($_POST)) {
		$erreurs = array();
		if (empty($_POST['nom'])) {
			$erreurs['nom'] = "Merci de renseingner votre nom";
		}

		/*if (empty($_POST['unite'])) {
			$erreurs['unite'] = "Merci de renseingner votre unité";
		}*/


		// A REPARER

		/*if (empty($_POST['pack'])) {
			$erreurs['pack'] = "Merci de renseingner votre pack";
		}*/

		if (empty($erreurs)) {
			$req = $pdo->prepare("UPDATE produit SET nom = ?, unite = ?, pack = ? WHERE id = ?");
			$req->execute(array($_POST['nom'], $_POST['unite'], $_POST['pack'], $_POST['id']));
			echo "<div class='container alert alert-success' style='color: green;'>Le produit à bien été modifié</div>";
		}
		else {
			echo "<div class='container alert alert-danger container' style='color: red;'>Erreurs, veuillez renseinger tous les champs !</div>";
		}
	}

	$req = $pdo->prepare("SELECT * FROM produit WHERE id = ?");
	$req->execute([$_GET['id']]);
	$produit = $req->fetch(PDO::FETCH_ASSOC); 
?>

<div class="container block-gestion">
	<h1 class="h1user marge">Modifier le produit</h1>
</div>

<div class="container">
	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
		<label for="nom">Nom du produit</label>
		<input type="text" id="nom" class="form-control" name="nom" value="<?php echo $produit['nom']; ?>">
		<br>
		<label for="unite">Unité(s)</label>
		<input type="number" id="unite" class="form-control" name="unite" value="<?php echo $produit['unite']; ?>">
		<br>
		<label for="pack">Paquet(s)</label>
		<input type="number" id="pack" class="form-control" name="pack" value="<?php echo $produit['pack']; ?>">
		<br>
		<input type="submit" value="Enregistrer" class="btn btn-primary">
	</form>
</div>
