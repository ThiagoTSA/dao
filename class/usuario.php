<?php
class Usuario{
	private $idUsuario;
	private $usuario;
	private $senha;

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($value){
		$this->idUsuario = $value;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($value){
		$this->usuario = $value;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($value){
		$this->senha = $value;
	}
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM usuarios WHERE id = :ID", array(":ID"=>$id));
		if (count($results) > 0){
			$row = $results[0];
			$this->setIdUsuario($row['id']);
			$this->setUsuario($row['usuario']);
			$this->setSenha($row['senha']);
		}
	}
	public function __toString(){
		return json_encode(array(
			"id"=>$this->getIdUsuario(),
			"usuario"=>$this->getUsuario(),
			"senha"=>$this->getSenha()
		));
	}
}
?>