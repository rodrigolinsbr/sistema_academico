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

include_once ("lib/MVC/Model.php");

class ModelRelatorio extends Model
{
	public function __construct()
	{
		parent::__construct(); //esse construct e herdado da classe model..
	}



	public function cadastrarOferta($nomeoferta, $codigooferta, $categoriaoferta){

		$sql = "INSERT INTO sa_oferta_course_categories(
					nomeoferta,
					codoferta,
					categoryid
					)
				VALUES(
					'{$nomeoferta}',
					'{$codigooferta}',
					'{$categoriaoferta}'
	 				);
				";


			$acao = $this->conexao->prepare($sql);
			$retorno['result'] = $acao->execute();
	}

	public function pesquisarTodos(){
		echo "pesquisar todas as ofertas";
		$sql = "SELECT id, nomeoferta, codoferta, categoryid FROM sa_oferta_course_categories";
		$result = $this->conexao->query($sql);
		if ($result) {
			$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
			$linhas = $this->montarListaObjetos($linhas, 'Relatorio');

			return $linhas;
		}else{
			return false;
		}
	}


	public function generateCSV(){
		echo "metodo csv";
		// $filename = 'downloads/'.strtotime("now").'.csv';
		// $sql = "SELECT * FROM sa_user_docs WHERE flag = 1";
 	// 	$result = $this->conexao->query($sql);



 	// 	if ($result) {
		// 	$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
		// 	$linhas = $this->montarListaObjetos($linhas, 'Relatorio');

		// 	$data = fopen($filename, "w");
		// 	fputcsv($data, $linhas);

		// 	return $linhas;
		// }else{
		// 	return false;
		// }
 	}


							//CONTA A QUANTIDADE DE REGISTROS DA TABELA
// public function generateCSV(){
// 		echo "metodo csv";
// 		$sql = "SELECT * FROM sa_user_docs WHERE flag = 1";
// 		$result = $this->conexao->query($sql);
// 		if ($result) {

// 			$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
// 			$linhas = $this->montarListaObjetos($linhas, 'Relatorio');
// 			$countRecords = $result->rowCount(); -----------------------------------------

// 			echo "string".$linhas;
// 			if ($countRecords >= 1) {
// 				echo "<br>quantidade registros: ".$countRecords;
// 			}



// 			return $linhas;
// 		}else{
// 			return false;
// 		}
//  }

}
?>
