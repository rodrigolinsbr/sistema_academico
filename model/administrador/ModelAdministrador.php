<?php

include('lib/MVC/Model.php');
include('lib/MVC/Controller.php');


class ModelAdministrador extends Usuario {


	public $id = null;
	public $nome = null;



	function __construct(){

		parent::__construct(); //herdando de Usuario
	}


	public function cadastrarEdital(){

		if (!$this->pesquisarEdital($titulo, $numeroEdital)) {
			$sql = "INSERT INTO edital (numero_edital, nome_edital, area_id_area) VALUES ('{$numero_edital}', '{$nome_edital}', '{$area_id_area}') ";
			$acao = $this->conexao->$prepare($sql);
			$resultado['resultado'] = $acao->execute();
		}else{
			$resultado['resultado'] = false;
			$resultado['numero_edital'] = 'Edital já está cadastrado!';
		}

	}


	// public function cadastrarArea(){

	// 	if (!$this->pesquisarArea($nome_area)) {
	// 		$sql = "INSERT INTO area (nome_area) VALUES ('{$nome_area}')";
	// 		$resultado = $this->conexao->prepare($sq);
	// 		$resultado['dados'] = $acao->execute();
	// 	}else{
	// 		$resultado['dados'] = false;
	// 		$resultado['dados'] = "Esta área já existe em nossa base de dados!";
	// 	}

	// }

	public function listarEdital(){

		$sql = "SELECT * FROM edital";
		$resultado = $this->conexao->$query($sql);
		if ($resultado) {
			$row = $resultado->fetchAll(PDO::FETCH_ASSOC); //percorre todo o array p exibir os dados
			$row = $this->montarListaObjetos($row, 'Administrador');

			return $row;
		}else{
			return false;
		}

		return true;
	}

	public function alterarEdital($id){

		if (pesquisarEdital($titulo, $numeroEdital)) {
			$sql = "UPDATE edital SET numero_edital = '{$numero_edital'}, nome_edital = '{$nome_edital'},  area_id_area = '{$numero_edital}' WHERE numero_edital = '{$id}' ";
		}
	}

	public function pesquisarEdital($titulo, $numeroEdital){

		$sql = "SELECT * FROM edital WHERE numero = {$numeroEdital} or titulo = '{$titulo}' ";
		$resultado = $this->conexao->$query($sql); //objeto conexao 'executa' a query acima
		if ($resultado) {
			$row = $resultado->fetchAll(PDO::FETCH_ASSOC);
			return $row;
		}
		return true;
	}
}
?>
