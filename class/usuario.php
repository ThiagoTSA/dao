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
			$this->setData($results[0]);
		}
	}
	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM usuarios ORDER BY id;");
	}
	public static function search($id){
		$sql = new Sql();
		return $sql->select("SELECT * FROM usuarios WHERE id LIKE :SEARCH ORDER BY id", array(
			':SEARCH'=>"%".$id."%"
		));
	}
	public function login($usuario, $senha){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM usuarios WHERE usuario = :USUARIO AND senha = :SENHA", array(
			":USUARIO"=>$usuario,
			":SENHA"=>$senha
		));
		if (count($results) > 0){
			$this->setData($results[0]);			
		}else{
			throw new Exception("Login ou senha inválido");			
		}

	}
	public function setData($data){
		$this->setIdUsuario($data['id']);
		$this->setUsuario($data['usuario']);
		$this->setSenha($data['senha']);
	}
	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
				':LOGIN'=>$this->getUsuario(),
				':PASSWORD'=>$this->getSenha()
		));
		if(count($results) > 0){
			$this->setData($results[0]);
		}

	}
	public function update($user, $pass){
		$this->setUsuario($user);
		$this->setSenha($pass);

		$sql = new Sql();
		$sql->query("UPDATE usuarios SET usuario = :USUARIO, senha = :SENHA WHERE id = :ID", array(
			':USUARIO'=>$this->getUsuario(),
			':SENHA'=>$this->getSenha(),
			':ID'=>$this->getIdUsuario()
		));
	}
	public function delete(){
		$sql = new Sql();
		$sql->query("DELETE FROM usuarios WHERE id = :ID", array(
			':ID'=>$this->getIdUsuario()
		));
		//Zerando os dados no objeto!
		$this->setIdUsuario(0);
		$this->setUsuario("");
		$this->setSenha("");
	}
	public function __construct($usuario = "", $senha = ""){
		$this->setUsuario($usuario);
		$this->setSenha($senha);
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