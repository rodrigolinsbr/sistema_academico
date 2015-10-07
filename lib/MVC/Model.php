<?
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
* @author Renato Nascimento <renato@r8tecnologia.com.br>
* @copyright [Informações de Direitos de Cópia]
* @license [link da licença] [Nome da licença]
* @link [link de onde pode ser encontrado esse arquivo]
* @version [Versão atual do arquivo]
* @since [Arquivo existe desde: Data ou Versao]
*/

class Model
{
    /**
    * @access private
    * @var conexao_pdo
    */
    protected $conexao = null;

	public function __construct()
	{
		require_once( CAMINHO_PORTAL."conf/Conexao.php" );
		$this->conexao = Conexao::getConexao();
	}

	//O método __call  chamado toda vez que um método  chamado não é encontrado.
	public function __call( $nomeDoMetodo, $argumentos )
	{
		throw new Exception( __FUNCTION__.'<br>Model não encontrado!'.$nomeDoMetodo );
	}

    public function montarListaObjetos($array, $tipoObjeto)
	{
        $resultado = array();

        for ($i=0;$i<count($array);$i++) {
            $arr = $this->montarObjeto($array[$i], $tipoObjeto);
            $resultado[$i] = $arr;
        }

        return $resultado;
    }

    public function montarObjeto($arrayCampos, $tipoObjeto)
	{
		$modulo = strtolower ($tipoObjeto);

        $caminho = "model/". $modulo."/";

        eval('require_once("'.CAMINHO_PORTAL.$caminho.$tipoObjeto.'.php");');

        if (sizeof($arrayCampos)>0) {
			$stringCampos = '';

			foreach($arrayCampos as $valor){
				$stringCampos .= " '" . $valor . "',";
			}

			eval('$temp = new ' . $tipoObjeto . '(' . substr($stringCampos, 0, -1) . ');');
		    return $temp;

        } else {
			return null;
        }
    }

}
