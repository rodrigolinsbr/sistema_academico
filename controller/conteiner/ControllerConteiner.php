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
* @author Renato Nascimento <renato@r8tecnologia.com.br>
* @copyright [Informações de Direitos de Cópia]
* @license [link da licença] [Nome da licença]
* @link [link de onde pode ser encontrado esse arquivo]
* @version [Versão atual do arquivo]
* @since [Arquivo existe desde: Data ou Versao]
*/
include_once ("lib/MVC/Controller.php");
include_once ("lib/MVC/View.php");
//include_once ("model/usuario/ModelUsuario.php");

include_once ("model/Conteiner/ModelConteiner.php");

class ControllerConteiner extends Controller
{

	public static function seLogado()
	{
		if(!$_SESSION['usuarioLogado']){
			$controllerUsuario = new controllerUsuario();
			$controllerUsuario->login();
			die();
		}

	}


//funcao de teste
	public function teste(){
		//echo "teste CEDOS";

		$view = new View();
		$view->carregar('conteiner/tela.html'); // Carrega o arquivo a exibido no browser
		$view->mostrar(); //Esta funcao escreve na tela o arquivo carregado. escreve a pagina

	}



	public function acaoPadrao($parametros)
	{
		//$this->usuarioHome($parametros);
		$this->teste();

	}

//metodo de cadastro
	public function chamaModel(){

		echo "entrou no metodo 'chamaModel' <a href='http://localhost/svn_saber/conteiner/'>pagina inicial</a> ";

		$nome = $_POST['nome'];
		$login = $_POST['login'];
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$endereco = $_POST['endereco'];
		$cpf = $_POST['cpf'];
		$sexo = $_POST['sexo'];
		$telefone = $_POST['telefone'];
		$inst_model = new ModelConteiner();
		$execute = $inst_model->inserirUsuario($nome, $login, $senha, $endereco, $telefone, $sexo, $email, $cpf, $administrador_id_admin, $professor_id_professor, $aluno_id_aluno, $telefone_id_telefone);

	}


	public function update(){
		echo "entrou no metodo 'ControllerCedes/update()' <a href='http://localhost/svn_saber/cedes_branch_mirela/cedes/'>pagina inicial</a> ";

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$profissao = $_POST['profissao'];
		$senha = md5($_POST['senha']);
		$inst_model = new ModelConteiner();
		$execute = $inst_model->alterarUsuario($id,$nome, $email, $profissao, $senha);
	}

	public function chamaPesquisar(){

		$email = $_POST['pesquisar'];
		echo "entrou no metodo 'pesquisar..' <a href='http://localhost/svn_saber/cedes_branch_mirela/cedes/'>pagina inicial</a> ";
		$inst_model = new ModelConteiner();
		$execute = $inst_model->pesquisarPorEmail($email);
	}

	public function chamaAlterar($var){

		$id = $var[0];

		// echo "var:".$var[0]."<br>";
		// echo "id dentro de chamaModel: " .$id;
		echo "entrou no metodo 'alterar..' <a href='http://localhost/svn_saber/conteiner/'>pagina inicial</a> ";


		$inst_model = new ModelConteiner();
		$execute = $inst_model->pesquisarId($id);
		//print_r($execute);
		$view = new View();
		$view->tipo = 'int';
        $data = array();
        $data['resultados'] = $execute;
        $view->data = $data;
        $view->carregar("conteiner/resultados.html");
        $view->mostrar();

	}


	public function listar(){

		$objeto_cedes = new ModelConteiner(); //instancio a classe modelCedes
		$execute = $objeto_cedes->pesquisar(); //chamo o metodo da classe ModelCedes.php
		$view = new View();  //instacio a View.php (lib/MVC/View.php)
		$view->tipo = 'int';
		$data = array();
		$data['dados_conteiner'] = $execute; // $dados vai receber os registros de print_dados (que vem do metodo listar que esta em modelCedes)
		$view->data = $data;
		//view/conteiner/listagem
		$view->carregar("conteiner/listagem.html");  //chama o template de padrao da view (lib/MVC/View.php)
		$view->mostrar();


	}

	public function login($parametros = null)
	{

		if(!$_SESSION['usuarioLogado']){
			$view = new View();
			$view->tipo = 'int';
			$data = array();
			$data['concursos'] = 'lista de concursos';
			$view->data = $data;
			$view->carregar("usuario/login.html");
			$view->mostrar();
		}else{
			$this->usuarioHome();
		}

	}

	public function processaLogin($parametros)
	{

        include_once ("model/conteiner/ModelConteiner.php");
        $model = new ModelConteiner();

		$execute = $model->pesquisarPorEmail($parametros[1]);
		$data['result'] = 'ok';
		if ($execute){
			//            campo do form              campo da tabela
			if (md5($_POST['senha']) != $execute[0]['senha']){
				$data['result'] = false;
				$view = new View();
				$view->data = $data;
				$view->carregar("conteiner/login.html");
				$view->mostrar();
			} else {
				$_SESSION['usuario']['id']    = $execute[0]['id'];
				$_SESSION['usuario']['nome']  = $execute[0]['nome'];
				$_SESSION['usuario']['email'] = $execute[0]['email'];
				$_SESSION['usuario']['profissao'] = $execute[0]['profissao'];
				$_SESSION['usuarioLogado'] = TRUE;
				$this->contratoHome();
				$view->carregar("conteiner/login.html");
				$view->mostrar();
			}
		} else {
			$data['result'] = false;
			$data['concursos'] = 'lista de concursos';
			$view = new View();
			//$view->tipo = 'xml';
			$view->data = $data;
			//$view->carregar("cedes/login.html");
			$view->carregar("conteiner/login.html");
			$view->mostrar();

		}

	}

	public function logout()
	{
		ControllerUsuario::seLogado();
        $view = new View();
		$view->carregar("usuario/logout.html");
		$view->mostrar();
	}

}
