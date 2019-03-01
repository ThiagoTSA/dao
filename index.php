<?php
	require_once("config.php");//Encontra as classes;
	/*
	$sql = new Sql();
	$usuarios = $sql->select("SELECT * FROM usuarios");
	echo json_encode($usuarios);
	*/
	/*
	$user = new Usuario();
	$user->loadById(2);
	echo $user;
	*/
	/*
	$lista = Usuario::getList();
	echo json_encode($lista);
	*/
	/*
	$search = Usuario::search("1");
	echo json_encode($search);
	*/
	/*
	$usuario = new Usuario();
	$usuario->login("555","admin");
	echo $usuario;
	*/
	/*
	$aluno = new Usuario("x", "x");
	$aluno->insert();
	echo $aluno;
	*/
	/*
	$usuario = new Usuario();
	$usuario->loadById(15);
	$usuario->update("bsb","bsb");
	echo $usuario;
	*/
	$usuario = new Usuario();
	$usuario->loadById(11);
	$usuario->delete();
	echo $usuario;
?>