<?php
/**
 * Arquivo de configuraзгo do autoload do projeto
 * @package config
 * @author Jose Berardo
 * @version 1.0
 */

/**
 * Classe que irб carregar as outras automaticamente
 */
class Autoload {
	/**
	 * Mйtodo estбtico que executarб o autoload das classes do projeto
	 * @param string $nome Nome da classe a ser carregada
	 */
	public static function load($nome) {
		if (($arquivo = self::pesquisarNoDiretorio($nome, MODELO, true))
			|| ($arquivo = self::pesquisarNoDiretorio($nome, LIB, true))){
			include_once $arquivo;
		}
	}
	
	/**
	 * Rotina de pesquisa pela classe em questгo no diretуrio passado
	 *
	 * @param string $nome Nome da classe pela qual vamos pesquisar
	 * @param string $dir Caminho do diretуrio onde pesquisar
	 * @param boolean $recursivo Se deve ou nгo pesquisar em subdiretуrios do atual
	 * @return string|false Caminho para a classe encontrada ou false
	 */
	private static function pesquisarNoDiretorio($nome, $dir, $recursivo) {
		foreach (new DirectoryIterator($dir) as $arquivo) {
			// Se o arquivo encontrado for um arquivo mesmo
			if ($arquivo->isFile()) {
				// Se o nome do arquivo casar com o esperado para carregar a classe
				if (preg_match("@^$nome(\\.class)?\\.php$@i", $arquivo->getFilename())) {
					return $arquivo->getPathname();
				}
			// Se estiver no modo recursivo e o arquivo encontrado for um diretГіrio
			} elseif ($recursivo &&
					  !$arquivo->isDot() &&
					  $arquivo->isDir()) {
				$retorno = self::pesquisarNoDiretorio($nome, $arquivo->getPathname(), true);
				if ($retorno) return $retorno;
			}
		}
		return false;
	}
	
}

// Aзгoo de registro da nossa funзгo autoload
// como uma das que serГЈo chamadas por __autoload()
spl_autoload_register(array('Autoload','load'));
?>