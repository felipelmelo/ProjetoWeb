<?php

class ConexaoPDO {
	
	private static $instancia;
 	private $db;
	 	
	private function __construct() {
			try{
				if(true){
					$host = "localhost";
					$user = "root";
					$pass = "";
					$dbname = "orcamento";
				}
				
				$this->db = new PDO("mysql:host=$host; dbname=$dbname",$user,$pass);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
				// deixa tudo no mysql em portugues... 
				$this->db->exec("SET lc_time_names='pt_br'");
					
			}catch (PDOException $e) {
				throw new BancoException($e);
			}
		}
	
		 /**
			 * Método que recupera a instância da classe ConexaoPdo
			 * @return ConexaoPdo
			 */
		 public static function getInstancia() {
			 if (!isset(self::$instancia)) {
				 self::$instancia = new ConexaoPdo();
			 }
			 return self::$instancia;
		 }
		
			/**
			* Retorna a conexão com o banco
			* @return PDO
			*/
		 public function getDb() {
			 return $this->db;
		 }
		 
		 
 }
?>
