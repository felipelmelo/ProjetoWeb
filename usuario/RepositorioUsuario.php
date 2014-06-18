<?php
	require_once('Usuario.php');
	require_once('../Conexao/conexaoPDO.php');
	class RepositorioUsuario{

	private $conn;
	
	private $stm;
	private static $instancia;
	
	private function __construct(){
		
		$this->conn = ConexaoPDO::getInstancia()->getDb();
	}
	
	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new RepositorioUsuario();
		return self::$instancia;
	}
	
	
	private function retornaObjeto($array){
		return new Usuario($array["id_usuario"],$array["nome_usuario"],$array["CPF_usuario"],$array["email_usuario"],$array["senha_usuario"],$array["tipo_usuario"]);
	}
	
		
	public function inserir($id,$nome,$Cpf,$email,$senha,$tipo_usuario){
	
		
		try{
				
			$objUsuario = new Usuario(null,$nome,$Cpf,$email,$senha,$tipo_usuario);
			$sql = "INSERT INTO usuario (nome_usuario,CPF_usuario,email_usuario,senha_usuario,tipo_usuario)
						 values(:nome,:Cpf,:email,:senha,:tipo_usuario)";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome", $objUsuario->getNome());
			$this->stm->bindValue(":Cpf", $objUsuario->getCpf());
			$this->stm->bindValue(":email", $objUsuario->getEmail());
			$this->stm->bindValue(":senha", md5($objUsuario->getSenha()));
			$this->stm->bindValue(":tipo_usuario", $objUsuario->getTipo_usuario());
			
			$this->stm->execute();
			
			header("Location: listar.php");
			
					
			}catch(PDOException$e){
				echo$e->getMessage();
			}
		}
	
	public function Alterar($id,$nome,$Cpf,$email,$senha,$tipo_usuario)	{
		
		try{
			$objUsuario = new Usuario($id,$nome,$Cpf,$email,$senha,$tipo_usuario);
			
			$usuario = new Usuario($_POST["id"],$_POST["nome"],$_POST["Cpf"],$_POST["email"],$_POST["senha"],
			$_POST["tipo_usuario"]);
			
			$senha;
			if ($objUsuario->getSenha()!= ""){
							
				$senha = " senha_usuario = :senha, ";
				$this->stm->bindValue(":senha", md5($objUsuario->getSenha()));
			
	
			}
			
			
			$sql = "update usuario set  nome_usuario = :nome, CPF_usuario = :Cpf, email_usuario = :email, 
			" . $senha ." tipo_usuario = :tipo_usuario where id_usuario = :id";

			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objUsuario->getId());
			$this->stm->bindValue(":nome", $objUsuario->getNome());
			$this->stm->bindValue(":Cpf", $objUsuario->getCpf());
			$this->stm->bindValue(":email", $objUsuario->getEmail());
			if ($objUsuario->getSenha()!= ""){
				$this->stm->bindValue(":senha", md5($objUsuario->getSenha()));
			}
			$this->stm->bindValue(":tipo_usuario", $objUsuario->getTipo_usuario());
			$this->stm->execute();
			
			header("Location: listar.php");
			
					
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function excluir($id)	{
		
		try{
			$objUsuario = new Usuario($id,null,null,null,null,null);
		
			$sql = "delete from usuario where id_usuario = :id";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objUsuario->getId());
			$this->stm->execute();

			header("Location: listar.php");
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	
	public function listar()
	{
		try{
			$retorno = null;
			
			$sql = "select * from usuario";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function vizualizar($id)
	{
		try{
			$retorno = null;
			
			$objUsuario = new Usuario($id,null,null,null,null,null);
			
			$sql = "select * from usuario where id_usuario = :id";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objUsuario->getId());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw $e->getMessage();
		}
	}
	public function VerificaCpf($cpf)
	{
		try{
			$objUsuario = new Usuario(null,null,$cpf,null,null,null);
			
	
			$sql = "select id_usuario from usuario where CPF_usuario = :cpf";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":cpf", $objUsuario->getCpf());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno= $result;
			}
			
			return $retorno;
				
			
			
		}catch(PDOException $e){
			throw $e->getMessage();
		}
	}
}
	?>