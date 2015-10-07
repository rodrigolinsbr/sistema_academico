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

class ModelUsuario extends Model
{
	public function __construct()
	{
		parent::__construct(); //esse construct e herdado da classe model..
	}


	public function pesquisarTodos(){
		echo "pesquisarTodos..";
		$sql = "SELECT id, nome, cpf, rg, email, telefone, nome_instituicao, uf_atuacao, municipio_atuacao, conselho FROM sa_user_docs WHERE flag = 0";
		$result = $this->conexao->query($sql);
		if ($result) {
			$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
			$linhas = $this->montarListaObjetos($linhas, 'Usuario');

			return $linhas;
		}else{
			return false;
		}
	}


	public function csv(){
		echo "CSV..";
		// $sql = SELECT nome from sa_user_docs
		// FIELDS TERMINATED BY ','
  // 			ENCLOSED BY '"'
  // 			LINES TERMINATED BY 'n' ;
		$result = $this->conexao->query($sql);
		if ($result) {
			$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
			$linhas = $this->montarListaObjetos($linhas, 'Usuario');

			return $linhas;
		}else{
			return false;
		}
	}


	public function pesquisarId($id)
	{
		echo "id dentro de pesquisarId: " .$id. "<br>";
		$sql = "SELECT id, nome, cpf, rg, email, telefone, nome_instituicao, uf_atuacao, municipio_atuacao, conselho,
		num_conselho, uf_conselho, graduacao,
		ano_graduacao, situacao_edicao, data_situacao, dsei, ciclo, etapa, flag from sa_user_docs where id = '$id' ";
		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        	$arr = $this->montarListaObjetos($arr, 'Usuario');  //essa linha prepara os objetos para serem impressos os objetos na tela

        	// print_r($arr);
   			return $arr;

		}else{
			return false;
		}
	}


	public function cadastrarUsuario($nome, $login, $email, $senha, $endereco, $cpf, $sexo, $x, $y, $z, $j)
	{

				$sql = "INSERT INTO usuario(
											nome,
											login,
											email,
											senha,
											endereco,
											cpf,
											sexo,
											telefone_id_telefone,
											administrador_id_admin,
											professor_id_professor,
											aluno_id_aluno
											)
									 VALUES(
									 		'{$nome}',
	 								 		'{$login}',
	 								 		'{$email}',
	 								 		md5('{$senha}'),
	 								 		'{$endereco}',
	 								 		'{$cpf}',
	 								 		'{$sexo}',
	 								 		1,
	 								 		1,
	 								 		1,
	 								 		1); ";

			$acao    = $this->conexao->prepare($sql);
			$retorno['result'] = $acao->execute();


	// 	if(!$this->pesquisarPorEmail($email)){
	// 		//$usu_id = $this->conexao->nextId('usuario_seq');

	// 		$sql  = "
	// 					INSERT INTO usuario(
	// 										nome,
	// 										login,
	// 										email,
	// 										senha,
	// 										endereco,
	// 										cpf,
	// 										sexo,
	// 										telefone_id_telefone,
	// 										administrador_id_admin,
	// 										professor_id_professor,
	// 										aluno_id_aluno,
	// 										telefone_id_telefone
	// 										)
	// 								 VALUES(
	// 								 		'{$nome}',
	// 								 		'{$login}',
	// 								 		'{$email}',
	// 								 		md5('{$senha}'),
	// 								 		'{$endereco}',
	// 								 		'{$cpf}',
	// 								 		'{$sexo}',
	// 								 		'{$telefone}',
	// 								 		1,
	// 								 		1,
	// 								 		1,
	// 								 		1
	// 								 		);
	// 				";

	// 		$acao    = $this->conexao->prepare($sql);
	// 		$retorno['result'] = $acao->execute();
	// 	}else{
	// 		$retorno['result'] = false;
	// 		$retorno['msg']    = 'E-mail já utilizado.';
	// 	}

	// 	return $retorno;
	}

	public function pesquisarPorEmail($email)
	{

		echo "email: " .$email;
		$sql = "SELECT * from usuario where email = '{$email}' ";
		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        	$arr = $this->montarListaObjetos($arr, 'Usuario');
			return $arr;

		}else{
			return false;
		}
	}

	public function alterUserDocs($id){


echo "<br>funcao alterUserDocs...";
		$id = $_POST['id'];
		echo "ID user:".$id. "<br>";
		// echo "Id: " .$id;
		$sql = "UPDATE sa_user_docs ud SET
				ud.nome = '".$_POST['nome']."',
				ud.cpf = '".$_POST['cpf']."',
				ud.rg = '".$_POST['rg']."',
				ud.email = '".$_POST['email']."',
				ud.telefone = '".$_POST['telefone']."',
				ud.nome_instituicao = = '".$_POST['nome_instituicao']."',
				ud.uf_atuacao = '".$_POST['uf_atuacao']."',
				ud.municipio_atuacao = = '".$_POST['municipio_atuacao']."',
				ud.conselho = '".$_POST['conselho']."',
				ud.num_conselho = '".$_POST['num_conselho']."',
				ud.uf_conselho = '".$_POST['conselho']."',
				ud.graduacao = '".$_POST['graduacao']."',
				ud.ano_graduacao = '".$_POST['ano_graduacao']."',
				ud.situacao_edicao = '".$_POST['situacao_edicao']."',
				ud.data_situacao = '".$_POST['data_situacao']."',
				ud.dsei = '".$_POST['dsei']."',
				ud.ciclo = '".$_POST['ciclo']."',
				ud.etapa = '".$_POST['etapa']."',
				ud.flag = '".$_POST['flag']."'
				WHERE id = '{$id}' " or die(mysql_error());

		$acao    = $this->conexao->prepare($sql);
		$retorno['result'] = $acao->execute();
		if ($retorno) {
			echo "atualizado";
			//echo "<script language='JavaScript'> alert('atualizado'); location.href='http://localhost/svn_saber/sistema_academico_mvc/usuario/listar/'</script>";
		}else{
			echo "nao ok";
		}

	}

	public function alterUserOferta($id){

		$sql = "UPDATE sa_user_oferta SET nome = '".$_POST['nome']."' WHERE id = '{$id}' " or die(mysql_error());
		$acao    = $this->conexao->prepare($sql);
		$retorno['result'] = $acao->execute();
		if ($retorno) {
			echo "<script language='JavaScript'> alert('dados atualizados'); location.href='http://localhost/svn_saber/sistema_academico_mvc/usuario/listar/'</script>";
		}else{
			echo "<script alert('os dados não foram atualizados');</script>";
		}

	}

	public function alterUserCourse($id){

		$sql = "UPDATE sa_user_oferta SET nome = '".$_POST['nome']."' WHERE id = '{$id}' " or die(mysql_error());
		$acao    = $this->conexao->prepare($sql);
		$retorno['result'] = $acao->execute();
		if ($retorno) {
			echo "<script language='JavaScript'> alert('dados atualizados'); location.href='http://localhost/svn_saber/sistema_academico_mvc/usuario/listar/'</script>";
		}else{
			echo "<script alert('os dados não foram atualizados');</script>";
		}

	}


    public function consultarPorId($id)
    {
		$sql = "SELECT * from usuario where id_usuario = '{$id}'";
     	$rs  = $this->conexao->query($sql);
		if($rs && $rs->rowCount()){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
			$arr = $this->montarListaObjetos($arr, 'Usuario');
            return $arr[0];
		}else{
			return false;
		}

    }

    public function alterarUsuario($arr)
    {
        if ($arr->senha != "**********"):
            $senha = ", senha = ".md5($arr->senha)."";
        endif;
        $sql = "UPDATE admin SET nome = '".addslashes($arr->nome)."', usu_nome = '".addslashes($arr->login)."' ".$senha." WHERE usu_id = ".$_SESSION['usuario']['id'];
        //echo $sql;
		$acao = $this->conexao->prepare($sql);
		return $acao->execute();
    }

}
?>
