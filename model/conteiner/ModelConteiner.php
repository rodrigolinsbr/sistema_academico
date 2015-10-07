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

class ModelConteiner extends Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function inserirUsuario($nome, $login, $senha, $endereco, $telefone, $sexo, $email, $cpf, $administrador_id_admin, $professor_id_professor, $aluno_id_aluno, $telefone_id_telefone)
	{

		if(!$this->pesquisarPorEmail($email)){
			//$usu_id = $this->conexao->nextId('usuario_seq');

			$sql  = "
						INSERT INTO usuario(
											nome,
											login,
											senha,
											endereco,
											telefone,
											sexo,
											email,
											cpf,
											administrador_id_admin,
											professor_id_professor,
											aluno_id_aluno,
											telefone_id_telefone
											)
									 VALUES(
									 		'{$nome}',
									 		'{$login}',
									 		'{$senha'},
									 		'{$endereco}',
									 		'{$telefone}',
									 		'{$sexo}',
									 		'{$email}',
									 		'{$cpf}',
									 		1,
									 		1,
									 		1,
									 		1
									 		);
					";
			$acao    = $this->conexao->prepare($sql);
			$retorno['result'] = $acao->execute();
		}else{
			$retorno['result'] = false;
			$retorno['msg']    = 'E-mail já utilizado.';
		}

		return $retorno;


		// $sql  = "
			// 			INSERT INTO usuarios(
			// 								nome,
			// 								email,
			// 								profissao,
			// 								senha
			// 								)
			// 						 VALUES(
			// 						 		'{$nome}',
			// 						 		'{$email}',
			// 						 		'{$profissao}',
			// 						 		'{$senha}'
			// 						 		);
			// 		";
			// $acao    = $this->conexao->prepare($sql);
			// $retorno['result'] = $acao->execute();
	}


	public function pesquisar()
	{

		echo "entrou em pesquisar!!";
		$sql = "SELECT * from usuario";
		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        	$arr = $this->montarListaObjetos($arr, 'Conteiner');


   //      	echo "<br><br>";
			// echo "array ->";

   //      	print_r($arr);

   //      	echo "<br><br><br><br>";
   //      	echo "EXIBINDO REGISTROS!!";


   //      	while ($linha = array_shift($arr)) {
   //      		echo "<br>";
   //      		echo 'Nome:'.$x = $linha['nome'];
   //      	}

			return $arr;

		}else{
			return false;
		}
	}

	public function pesquisarPorEmail($email)
	{

		$sql = "SELECT * from usuario where email = '$email'";
		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);

        	echo "<br>";
        	echo "sql -> ";
        	print_r($sql);


        	echo "<br><br>";
			echo "array ->";

        	print_r($arr);


        	echo "<script>alert('visualize o resgistro');</script>";


			return $arr;

		}else{
			return false;
		}
	}


	public function pesquisarId($id)
	{
		echo "id dentro de pesquisarId: " .$id;
		$sql = "SELECT * from usuario where id = '$id' ";
		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        	$arr = $this->montarListaObjetos($arr, 'Conteiner');  //essa linha prepara os objetos para serem impressos os objetos na tela

        	// print_r($arr);
   			return $arr;

		}else{
			return false;
		}
	}


    public function consultarPorId($id)
    {
		$sql = "SELECT * from usuario where id = '{$id}'";
     	$rs  = $this->conexao->query($sql);
		if($rs && $rs->rowCount()){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
			$arr = $this->montarListaObjetos($arr, 'Conteiner');
            return $arr[0];
		}else{
			return false;
		}

    }

    public function alterarUsuario($id,$nome, $email, $profissao, $senha)
    {

    	echo "nome:".$nome;
    	echo "email:".$email;
    	echo "prof:".$profissao;

    	$sql  = "UPDATE usuario SET nome = '$nome', email = '$email', profissao = '$profissao', senha = '$senha'' WHERE id = '$id' ";
			$acao    = $this->conexao->prepare($sql);
			$retorno['result'] = $acao->execute();


		return $retorno;


  //       if ($arr->senha != "**********"):
  //           $senha = ", senha = ".md5($arr->senha)."";
  //       endif;

  //       echo "alterar";
  //       //$sql = "UPDATE usuarios SET nome = '".addslashes($arr->nome)."', email = '".addslashes($arr->email)."' ".$senha." WHERE id = ".$id;
  //       $sql = "UPDATE usuarios SET nome = '".addslashes($arr->nome)."', email = '".addslashes($arr->email)."' ".$senha." WHERE id = ".$id;
  //       //echo $sql;
		// $acao = $this->conexao->prepare($sql);
		// return $acao->execute();
    }



  //   public function alterarUsuario($arr)
  //   {
  //       if ($arr->senha != "**********"):
  //           $senha = ", senha = ".md5($arr->senha)."";
  //       endif;

  //       echo "alterar";
  //       $sql = "UPDATE admin SET usu_nome = '".addslashes($arr->nome)."', usu_nome = '".addslashes($arr->login)."' ".$senha." WHERE usu_id = ".$_SESSION['usuario']['id'];
  //       //echo $sql;
		// $acao = $this->conexao->prepare($sql);
		// return $acao->execute();
  //   }

}
?>
