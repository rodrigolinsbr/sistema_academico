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

class ControllerHome extends Controller
{
	public function acaoPadrao($parametros) {
		//header("Location: ".URL_PORTAL."usuario/login"); //chama a view/usuario/pagina.html sem a extensao

        $view = new View();
        $view->tipo = 'Home'; // ??
		$view->carregar("home/home.html");
		$view->mostrar();

	}

}

