<?php
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=cp_php1;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>