<?php
/**
 * Classe de validacao
 * @author Tulio Carvalho <tulioyqr@gmail.com>
 * @version 1.0
 */
class Validacao{
	
	private $values = array();
	
	private $rules = array();
	
	private $fields = array();
	
	private $key = null;
	
	private $error;
	
	private $exteption = false;
	
	/**
	 * Construtor da classe de validacao
	 * @access public
	 */
	public function __construct(){
		$this->error = array();
	}
	
	/**
	 * Metodo responsavel por setar as regras de validacao para cada campo associado
	 * @param string $value
	 * @param string $rules
	 * @param string $field
	 * @access public
	 */
	public function setRules(&$value,$rules,$field){
		$this->maketrim($value,$rules);
		$this->addValue($value);
		$this->addRules($rules);
		$this->addField($field);	
	}
	/**
	 * Método responsável por adicionar os valores a serem validados em um array
	 * @param string $value
	 */
	private function addValue($value){
		$this->value[] = $value;
	}
	/**
	 * Método responsável por adicionar as regras a serem tratadas em um array
	 * @param string $rules
	 */
	private function addRules($rules){
		$this->rules[] = $rules;
	}
	/**
	 * Método responsável por adicionar o nome dos campos a serem validados em um array
	 * @param string $field
	 */
	private function addField($field){
		$this->fields[] = $field;
	}
	
	private function maketrim(&$value,&$rules){
		
		$regras = explode("|", $rules);
		$array = array();
		foreach($regras as $regra){
			if($regra == "trim")
				$value = trim($value);
			else
				$array[] = $regra;	
		}
		$rules = implode("|", $array);
	}
	
	public function close(){
		unset($_SESSION["_validacao_erros_"]);
		unset($_SESSION["_validacao_last_value_"]);
	}
	
	/**
	 * Método invocado apos todas as definições das regras, que é responsável por rodar a validação
	 * @throws ValidacaoException
	 */
	public function run(){
		foreach($this->value as $this->key=>$value){
			$value = addslashes($value);
			
			$rules = explode("|", $this->rules[$this->key]);
			foreach($rules as $rule){
				$parameter = "";
				if(!strpos($rule, "[") === false && !strpos($rule, "]") === false){
					$array = explode("[", $rule);
					$rule = $array[0];
					$parameter = str_replace("]", "", $array[1]);	
				}
				
				eval("\$this->_" . $rule . "(\"$value\",\"$parameter\");");
			}
		}
		//if($this->exception) throw new ValidacaoException();
	}
	
	public function get($field){
		if(isset($_SESSION["_validacao_last_value_"][$field]))return $_SESSION["_validacao_last_value_"][$field]; else return"";
	}
	
	/**
	 * Método publico, usado para receber os erros associados a um campo específico
	 * @param string $field
	 */
	public function getError($field){
		if(!isset($_SESSION["_validacao_erros_"]))
	 		if(!isset($this->error[$field])) return ""; else return $this->error[$field];
	 	else
	 		if(!isset($_SESSION["_validacao_erros_"][$field])) return ""; else return $_SESSION["_validacao_erros_"][$field];
	}
	/**
	 * Método utilizado para setar as mensagens de erros para cada campo
	 * @param string $strError
	 */
	private function setError($strError){
		throw new ValidacaoException("Campo \"{$this->fields[$this->key]}\" $strError");		
	}
	
	public function getAllErrors(){
		if(!isset($_SESSION["_validacao_erros_"])){
	 		if(!isset($this->error)) 
	 			return ""; 
	 		else
	 			$array = $this->error;
		}else{
			$array = $_SESSION["_validacao_erros_"];
		}
		
		foreach($array as $key=>$msg){
			echo $key . " - " . $msg . "<br>";
		}
	}
	
	
	/* Validações */
	
	private function _required($value){
		if($value == "") $this->setError("é obrigatório");
	}
	private function _valid_email($strEmail){
		/* Caso o campo não seja obrigatório, ele não precisa ser validado */
		if(empty($strEmail)) return;
		$strEmail = strtolower(trim($strEmail));
		if (preg_match('/^([_\.0-9a-z-]+)@(([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})$/', $strEmail, $arrEmail)) {
			$strHost	= $arrEmail[2];
			$strIP		= gethostbyname($strHost);
		}else{
			$this->setError("inválido");
		}
	}
	private function _maxlength($value,$tam){
		/* Caso o campo não seja obrigatório, ele não precisa ser validado */
		if(empty($value)) return;
		if(strlen($value) > $tam) $this->setError("ultrapassou o tamanho máximo permitido [$tam]");
	}
	private function _minlength($value,$tam){
		/* Caso o campo não seja obrigatório, ele não precisa ser validado */
		if(empty($value)) return;
		if(strlen($value) < $tam) $this->setError("não atingiu o tamanho mínimo permitido [$tam]");
	}
	private function _numeric($value){
		/* Caso o campo não seja obrigatório, ele não precisa ser validado */
		if(empty($value)) return;
		if(!is_numeric($value)) $this->setError("deve ser numérico");
	}
	private function _cep($value){
		/* Caso o campo não seja obrigatório, ele não precisa ser validado */
		if(empty($value)) return;
		if (!(isset($value) && preg_match("/^[0-9]{5}-[0-9]{3}$/",$value))) $this->setError("inválido");
	}
	private function _confirm($value,$valueToConfirm){
		if ($value != $valueToConfirm) $this->setError("confirmação inválida");
	}
	private function _date($value,$mode){
		if($mode == "ptbr"){
			if (!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $value))
				$this->setError("formato inválido");
		}else if($mode == "usa"){
			if (!preg_match('/^\d{1,4}-\d{1,2}-\d{2}$/', $value))
				$this->setError("formato inválido");
		}
	}
	private function _cpf($value) {
		/* Caso o campo não seja obrigatório, ele não precisa ser validado */
		if(empty($value)) return;
		if (!(isset($value) && preg_match("/^([0-9]{3}\.){2}[0-9]{3}-[0-9]{2}$/",$value))){
			$this->setError("inválido");
		}else{
			// Verifiva se o número digitado contém todos os digitos
	    	$value = str_pad(preg_replace('/[^0-9]/', '', $value), 11, '0', STR_PAD_LEFT);
			// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		    if (strlen($value) != 11 || $value == '00000000000' || $value == '11111111111' || $value == '22222222222' || $value == '33333333333' || $value == '44444444444' || $value == '55555555555' || $value == '66666666666' || $value == '77777777777' || $value == '88888888888' || $value == '99999999999')
			{
				$this->setError("inválido");
		    }
			else
			{   // Calcula os números para verificar se o CPF é verdadeiro
		        for ($t = 9; $t < 11; $t++) {
		            for ($d = 0, $c = 0; $c < $t; $c++) {
		                $d += $value{$c} * (($t + 1) - $c);
		            }
		            $d = ((10 * $d) % 11) % 10;
		            if ($value{$c} != $d) {
		               $this->setError("inválido");
		            }
		        }
			}
		}
	}

}
?>