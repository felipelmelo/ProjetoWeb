<?php
	
class Conexao{
	
	private $host;
	private $username;
	private $password;
	private $database;
	
	public function __construct() {
		$this->conectar();
	}
	
	
	public function conectar(){

		
		$this->host =  "localhost";
		$this->username = "root";
		$this->password = "";
				
		$conectando = mysql_connect($this->host,$this->username,$this->password);
		if(!$conectando){
			echo "Coneção com o banco de dados falhou: " . mysql_error();
		}
	
		$sql="CREATE DATABASE exercicio3";		
		if (mysql_query($sql,$conectando)){
			echo "Banco criado com sucesso";
		}else{
			echo "Erro ao criar o banco de dados";
		}
		
		$sql2="CREATE TABLE Pessoa (nome char(100), idade int, endereco char (200), CEP char(10), sexo char(10), id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id));";
		
		if (mysql_query($sql2,$conectando)){
				echo "Tabela criada com sucesso";
			}else{
				echo "Erro ao criar a tabela";
				}
		}
}
	


$conexao = new Conexao();
 
?>
	
		