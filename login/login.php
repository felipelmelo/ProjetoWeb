<?php
	require_once('../Conexao/conexaoPDO.php');
class loginRepositorio{
	private $conn;
	
	private $stm;
	private static $instancia;
	
	private function __construct(){
		
		$this->conn = ConexaoPDO::getInstancia()->getDb();
		}
	
	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new loginRepositorio();
		return self::$instancia;
	}
	
	function login($login,$senha){
			
	try{
					
			$strSql = "select id_usuario,tipo_usuario from usuario where CPF_usuario = :login and senha_usuario = :senha ";
			$this->stm = $this->conn->prepare($strSql);
			$this->stm->bindValue(":login", $login,PDO::PARAM_STR);
			$this->stm->bindValue(":senha", $senha,PDO::PARAM_STR);
			$this->stm->execute();
			$result = $this->stm->fetch(PDO::FETCH_ASSOC);
				
			if(!$result){			 
				echo "<script type=\"text/javascript\"> 
				alert(\"Login ou senha invalidos\"); 
				window.location.href = \"index.php\"; 			
				</script>";
			}			
			session_start();
			$_SESSION["Login"];
			$_SESSION["Login"] = $result;
			
			return $_SESSION["Login"];
			
			}catch(PDOException$e){
				echo $e->getMessage();
			}
		}
	public function logout(){
		unset($_SESSION["Login"]);
		header("Location: index.php");
	}
}
	
			
?>