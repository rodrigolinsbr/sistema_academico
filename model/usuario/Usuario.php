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

include ("lib/MVC/Objeto.php");

class Usuario
{

 //    public $id_user = null;
 //    public $nome = null;
 //    public $email = null;
 //    public $cpf = null;
 //    public $rg = null;
 //    public $conselho = null;

	// public function __construct($id_user = null, $nome = null,
	// 	$email = null, $cpf = null, $rg = null, $conselho = null)
	// {
 //        $this->id_user = $id_user;
 //        $this->nome = $nome;
 //        $this->email = $email;
 //        $this->cpf = $cpf;
 //        $this->rg = $rg;
 //        $this->cpf = $cpf;
 //        $this->conselho = $conselho;

	// }





 	public $id_user = null;
    public $nome = null;
    public $cpf = null;
    public $rg = null;
    public $email = null;
    public $telefone = null;
    public $nome_instituicao = null;
    public $uf_atuacao = null;
    public $municipio_atuacao = null;
    public $conselho = null;
    public $num_conselho = null;
    public $uf_conselho = null;
    public $graduacao = null;
    public $ano_graduacao = null;
    public $situacao_edicao = null;
    public $data_situacao = null;
    public $dsei = null;
    public $ciclo = null;
    public $etapa = null;

	public function __construct($id_user = null, $nome = null, $cpf = null, $rg = null, $email = null,
		$telefone = null, $nome_instituicao = null, $uf_atuacao = null, $municipio_atuacao = null,
		$conselho = null,
		$num_conselho = null, $uf_conselho = null, $graduacao = null, $ano_graduacao = null,
		$situacao_edicao = null,
		$data_situacao = null, $dsei = null, $ciclo = null, $ciclo = null, $etapa = null)
	{

        $this->id_user = $id_user;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->email = $email;
        $this->telefone = $telefone;
    	$this->nome_instituicao = $nome_instituicao;
    	$this->uf_atuacao = $uf_atuacao;
        $this->municipio_atuacao = $municipio_atuacao;
        $this->conselho = $conselho;
		$this->num_conselho = $num_conselho;
        $this->uf_conselho = $uf_conselho;
		$this->graduacao = $graduacao;
		$this->ano_graduacao = $ano_graduacao;
		$this->situacao_edicao = $situacao_edicao;
		$this->data_situacao = $data_situacao;
		$this->dsei = $dsei;
		$this->ciclo = $ciclo;
		$this->etapa = $etapa;

	}





















	// o método __set é responsável por setar o valor de uma propriedade.
	public function __set( $chave, $valor )
	{
	    $this->{$chave} = $valor;
	}

	//o método __get é responsável por interceptar o retorno de uma propriedade.
	public function __get( $chave )
	{
		return $this->{$chave};
	}

	//Os métodos __isset e __unset interferem nas chamadas às funções isset() e unset() respectivamente.
	public function __isset( $chave )
	{
	    return isset( $this->{$chave} );
	}

	public function __unset( $chave )
	{
	    unset( $this->{$chave} );
	}

	//O método __call é chamado toda vez que um método é chamado e não encontrado.
	public function __call( $nomeDoMetodo, $argumentos )
	{
	   // vai reportar para alguém
	}


}
