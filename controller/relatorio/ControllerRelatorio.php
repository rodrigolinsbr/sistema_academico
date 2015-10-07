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
include_once ("model/relatorio/ModelRelatorio.php");

class ControllerRelatorio extends Controller
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


	public function gerarRelatorio(){
		echo "relatorios";
		$objeto_model = new ModelRelatorio();
		$execute = $objeto_model->generateCSV();

		//montando a view
		$view = new View();
		$view->tipo = 'INT';
		$data = array(); //data e uma variavel global padrao, que esta em lib/MVC/View.php
		$data['ofertas'] = $execute; //o array dados tem o indice 'alunos'. isso vai ser tratado em listagem.html no foreach..
		$view->data = $data;
		$view->carregar("relatorio/relatoriosAcad.html"); //chama a view
		$view->mostrar();
	}

	public function generateInfoAcad(){

		$obj = new ModelRelatorio();
		$execute = $obj->generateCSV();
	}

}
?>
