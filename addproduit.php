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
			$req = $pdo->prepare('INSERT INTO produit SET nom = ?, unite = ?, pack = ?');
			$req->execute([$_POST['nom'], $_POST['unite'], $_POST['pack']]);
			echo "<div class='container alert alert-success' style='color: green;'>Produit ajouté</div>";
		}

		else {
			echo "<div class='container alert alert-danger container' style='color: red;'>Erreurs, veuillez renseinger tous les champs !</div>";
		}

	} 

?>

<div class="container block-gestion marge">
	<h1 class="h1user">Ajout d'un produit</h1>
</div>

<div class="container">
	<form action="" method="post">
		<label for="nom">Nom du produit</label>
		<input type="text" id="nom" class="form-control" name="nom">
		<br>
		<label for="unite">Unité(s)</label>
		<input type="number" id="unite" class="form-control" name="unite">
		<br>
		<label for="pack">Paquet(s)</label>
		<input type="number" id="pack" class="form-control" name="pack">
		<br>
		<input type="submit" value="Enregistrer" class="btn btn-primary">
	</form>
</div>

