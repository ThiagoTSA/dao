<?php
	require_once("config.php");//Encontra as classes;
	$sql = new Sql();
	$usuarios = $sql->select("SELECT * FROM usuarios");
	echo json_encode($usuarios);
?>