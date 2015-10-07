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
include_once ("model/curso/ModelCurso.php");

class ControllerCurso extends Controller
{
	public static function seLogado()
	{
		if(!$_SESSION['usuarioLogado']){
			$controllerUsuario = new controllerUsuario();
			$controllerUsuario->login();
			die();
		}
	}

	public function acaoPadrao($parametros)
	{
		$this->usuarioHome($parametros);
	}


	public function insert(){

		$view = new View();
		$view->tipo = 'INT';
		//o que $data faz??
		$data = array(); //data e uma variavel global padrao, que esta em lib/MVC/View.php
		$data['arrayOfertasCadastradas'] = $execute;
		$view->data = $data;
		$view->carregar("curso/cadastre.html"); //chama a view. view/oferta/pagina_html
		$view->mostrar();

	}

	public function createRegisterCourse(){
		$nomeoferta = $_POST['nomeoferta'];
		$codigooferta = $_POST['codigooferta'];
		$categoriaoferta = $_POST['categoriaoferta'];
		echo "string :" .$nomeoferta;
		echo "cod:".$codigooferta;
		echo "categoria:".$categoriaoferta;
		$objeto_model = new ModelCurso();
		$execute = $objeto_model->createCourse($nomeoferta, $codigooferta, $categoriaoferta);

	}


	// public function cadastrar(){

	// 	echo "cadastrar..";

	// 	$nome = $_POST['nome'];
	// 	$login = $_POST['login'];
	// 	$senha = $_POST['senha'];
	// 	$endereco = $_POST['endereco'];
	// 	$sexo = $_POST['sexo'];
	// 	$email = $_POST['email'];
	// 	echo "nome: ".$nome;
	// 	echo "login: " .$login;
	// 	$objeto_model = new ModelCurso();
	// 	$execute = $objeto_model->cadastrarUsuario($nome, $login, $email, $senha, $endereco, $cpf, $sexo, $x, $y, $z, $j);
	// }


	public function pesquisar(){

		$email = $_POST['email'];
		$objeto = new ModelCurso();
		$execute = $objeto->pesquisarPorEmail($email);
	}


	public function listar(){

		$objeto_model = new ModelCurso();
		$execute = $objeto_model->pesquisarTodos();
		//montando a view
		$view = new View();
		$view->tipo = 'INT';
		$data = array(); //data e uma variavel global padrao, que esta em lib/MVC/View.php
		$data['courses'] = $execute; //o array dados tem o indice 'alunos'. isso vai ser tratado em listagem.html no foreach..
		$view->data = $data;
		$view->carregar("curso/list.html");
		$view->mostrar();
	}

	public function form(){

		$objeto_model = new ModelCurso();
		$execute = $objeto_model->pesquisarTodos();
		//montando a view
		$view = new View();
		$data = array(); //data e uma variavel global padrao, que esta em lib/MVC/View.php
		$data['alunos'] = $execute; //o array dados tem o indice 'alunos'. isso vai ser tratado em listagem.html no foreach..
		$view->data = $data;
		$view->carregar("curso/cadastro.html"); //chama a view
		$view->mostrar();
	}

	public function edit($parametros){
		echo "funcao edit no controller <br>";

		$id = $parametros[0]; //array de valores.

		echo "id alterar:" .$id;
		$objeto_model = new ModelCurso();
		$execute = $objeto_model->pesquisarId($id);
		$view = new View();
		$view->tipo = 'int';
		$data = array();
		$data['return_course'] = $execute;
		$view->data = $data;
		$view->carregar("curso/altercourse.html");
		$view->mostrar();
	}

	public function update($parametros){

		//$id = $_POST['id'];
		//$id = $parametros[0];

		echo "ID metodo update: " .$id;
		$objeto_model = new ModelCurso();
		$execute = $objeto_model->alterarRegistro($id);
	}

	public function login($parametros = null)
	{

		if(!$_SESSION['usuarioLogado']){
			$view = new View();
			$view->tipo = 'int';
			$data = array();
			$data['concursos'] = 'lista de concursos';
			$view->data = $data;
			//$view->carregar("usuario/login.html");
			$view->carregar("curso/login.html");
			$view->mostrar();
		}else{
			$this->usuarioHome();
		}

	}

	public function processaLogin($parametros)
	{
	   echo "na fucnao";
	   echo "<br>";
	   echo "var1: " .$parametros;
	   echo "<br>";
	   echo "var1: " .$parametros[2];
	   echo "<br>";
	   echo "var2: " .$parametros[1];

        $model = new ModelCurso();
		$execute = $model->pesquisarPorEmail($parametros[3]); //esta variavel chama a fucnao e passa o email como parametro

		$data['result'] = 'ok';
		if ($execute){
						//formulario            nome da tabela
			if (md5($_POST['senha']) != $execute[0]['senha']){
				$data['result'] = false;
				$view = new View();
				$view->data = $data;
				$view->carregar("usuario/xmlLogin.html");
				$view->mostrar();
			} else {//confirmacao senha correta
				$_SESSION['usuario']['id']    = $execute[0]['id'];
				$_SESSION['usuario']['nome']  = $execute[0]['nome'];
				$_SESSION['usuario']['email'] = $execute[0]['email'];
				$_SESSION['usuario']['profissao'] = $execute[0]['profissao'];
				$_SESSION['usuario']['senha'] = $execute[0]['senha'];
				$_SESSION['usuarioLogado']    = TRUE;
				$this->contratoHome();
				$view->carregar("usuario/xmlLogin.html");
				$view->mostrar();
			}
		} else {
			$data['result'] = false;
			$data['concursos'] = 'lista de concursos';
			$view = new View();
			$view->tipo = 'xml';
			$view->data = $data;
			$view->carregar("usuario/xmlLogin.html");
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
