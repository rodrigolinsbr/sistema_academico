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

class View
{
	private $html;
	private $data;
	private $tipo;

	public function __construct() {
		$this->tipo = 'INT';
		$this->html = '';
		$this->data = null;
	}

	public function carregar($template) {
		$this->html = CAMINHO_PORTAL.PASTA_VIEW.$template;
		if(!is_file($this->html)){
			throw new Exception( 'View não encontrada!' );
		}
	}

	// o mtodo __set  responsvel por setar o valor de uma propriedade.
	public function __set( $chave, $valor )
	{
		$this->{$chave} = $valor;
	}

	//o mtodo __get  responsvel por interceptar o retorno de uma propriedade.
	public function __get( $chave )
	{
		return $this->{$chave};
	}

	//Os mtodos __isset e __unset interferem nas chamadas s funes isset() e unset() respectivamente.
	public function __isset( $chave )
	{
		return isset( $this->{$chave} );
	}

	public function __unset( $chave )
	{
		unset( $this->{$chave} );
	}

	//O método __call  chamado toda vez que um método  chamado não é encontrado.
	public function __call( $nomeDoMetodo, $argumentos )
	{
		throw new Exception( 'Método não encontrado!' );
	}

	public function mostrarCabecalho()
	{
		switch (strtoupper($this->tipo)) {
		    case 'INT':
		        include(CAMINHO_PORTAL."templates/" . TEMPLATE . "/topo.php");
		        break;
		    default:
		        include(CAMINHO_PORTAL."templates/" . TEMPLATE . "/topo.php");
		        break;
		}
	}

	public function mostrarRodape()
	{
		switch (strtoupper($this->tipo)) {
		    case 'INT':
		        include(CAMINHO_PORTAL."templates/" . TEMPLATE . "/rodape.php");
		        break;
		    default:
		        include(CAMINHO_PORTAL."templates/" . TEMPLATE . "/rodape.php");
		        break;
		}
	}

	public function mostrar() {

		if($this->data)
			extract($this->data);

		extract($_SESSION);

		$this->mostrarCabecalho();
		include($this->html);
		$this->mostrarRodape();


	}

}

?>
