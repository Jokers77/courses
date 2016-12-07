<?php 
require_once('bdd.php');

$req = $pdo->prepare("DELETE FROM produit WHERE id = ?");
$req->execute([$_GET['id']]);
header('Location: gestion.php');

?>