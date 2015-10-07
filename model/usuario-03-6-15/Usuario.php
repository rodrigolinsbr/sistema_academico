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

//include ("lib/MVC/Objeto.php");

class Usuario
{

	public $id_user_docs = null;
    public $id_user = null;  //id vindo do moodle
    public $nome = null;
    public $codoferta = null;
    public $cpf = null;
    public $telefone = null;
    public $email = null;
    public $categoryid = null;
    public $uf = null;
    public $ano_graduacao = null;

	public function __construct($id_user_docs = null, $id_user = null, $nome = null, $codoferta = null, $cpf = null, $telefone = null,  $email = null, $categoryid = null, $uf = null, $ano_graduacao = null)
	{
		$this->id_user_docs = $id_user_docs;
        $this->id_user = $id_user;
        $this->nome = $nome;
        $this->codoferta = $codoferta;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->categoryid = $categoryid;
        $this->uf = $uf;
        $this->ano_graduacao = $ano_graduacao;

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
