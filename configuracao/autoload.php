<?php
/**
 * Arquivo de configura��o do autoload do projeto
 * @package config
 * @author Jose Berardo
 * @version 1.0
 */

/**
 * Classe que ir� carregar as outras automaticamente
 */
class Autoload {
	/**
	 * M�todo est�tico que executar� o autoload das classes do projeto
	 * @param string $nome Nome da classe a ser carregada
	 */
	public static function load($nome) {
		if (($arquivo = self::pesquisarNoDiretorio($nome, MODELO, true))
			|| ($arquivo = self::pesquisarNoDiretorio($nome, LIB, true))){
			include_once $arquivo;
		}
	}
	
	/**
	 * Rotina de pesquisa pela classe em quest�o no diret�rio passado
	 *
	 * @param string $nome Nome da classe pela qual vamos pesquisar
	 * @param string $dir Caminho do diret�rio onde pesquisar
	 * @param boolean $recursivo Se deve ou n�o pesquisar em subdiret�rios do atual
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
			// Se estiver no modo recursivo e o arquivo encontrado for um diretório
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

// A��oo de registro da nossa fun��o autoload
// como uma das que serão chamadas por __autoload()
spl_autoload_register(array('Autoload','load'));
?>