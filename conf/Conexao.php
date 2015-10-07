<?php
/**
* [Descrição do arquivo].
*
* [mais informações precisa ter 1 [ENTER] para definir novo parágrafo]
*
* [pode usar quantas linhas forem necessárias]
* [linhas logo abaixo como esta, são consideradas mesmo parágrafo]
*
* @package [Nome do pacote de Classes, ou do sistema]
* @category [Categoria a que o arquivo pertence]
* @name [Apelido para o arquivo]
* @author [nome do autor] <[e-mail do autor]>
* @copyright [Informações de Direitos de Cópia]
* @license [link da licença] [Nome da licença]
* @link [link de onde pode ser encontrado esse arquivo]
* @version [Versão atual do arquivo]
* @since [Arquivo existe desde: Data ou Versao]
*/


class Conexao
{
    /**
    * @access private
    * @var PDO_CONNECTION
    */
	private static $con = NULL;

    public static function getConexao()
	{
        if (Conexao::$con == NULL) {

			include "config.inc.php";

			try {
				Conexao::$con = new PDO('mysql:host='.$confBD["host"].';
				                         port=3306;
				                         dbname='.$confBD["base"].'',
				                         $confBD["user"],
				                         $confBD["pass"]);
			}catch (PDOException $e) {
			    //levanta erro

			    var_dump($e);
			    die();
			}
	   	}
		return Conexao::$con;
	}

	public static function nextId($sequence)
	{
	  	$sql = "SELECT nextval('$sequence') AS seq";

		$con = Conexao::getConexao();
		try {
			$arr = $con->query($sql);
			if($arr == ""){
				throw new Exception("Erro");
			}
			$row = $arr->fetch(PDO::FETCH_ASSOC);
			return $row['seq'];
		}catch (Exception $e){
			return 0;
		}

	}

	public static function close()
	{
	  	Conexao::$con = NULL;
	 }

	}
