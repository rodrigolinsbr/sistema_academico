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

class ModelCurso extends Model
{
	public function __construct()
	{
		parent::__construct(); //esse construct e herdado da classe model..
	}



	public function createCourse($nomeoferta, $codigooferta, $categoriaoferta){

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

			if ($retorno) {
				echo "<script language='JavaScript'> alert('Cadastrado com sucesso!'); location.href='http://localhost/svn_saber/sistema_academico_mvc/curso/insert/'</script>";
			}
	}

	public function pesquisarPorEmail($email)
	{

		echo "email: " .$email;
		$sql = "SELECT * from usuario where email = '{$email}' ";
		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        	$arr = $this->montarListaObjetos($arr, 'Curso');
			return $arr;

		}else{
			return false;
		}
	}

	public function alterarRegistro($id){

		echo "funcao alterarRegistro... <br>";
		echo "Id: " .$id;
		$sql = "UPDATE sa_oferta_course_categories SET nomeoferta = ' ".$_POST['nomeoferta']." ' , codoferta = ' ".$_POST['codoferta']." ' , categoryid = ' ".$_POST['categoria']." ' WHERE id = '{$id}' ";
		$acao    = $this->conexao->prepare($sql);
		$retorno['result'] = $acao->execute();

	}

	public function pesquisarTodos(){

		$sql = "SELECT id, nomeoferta, codoferta, categoryid FROM sa_oferta_course_categories";
		$result = $this->conexao->query($sql);
		if ($result) {
			$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
			$linhas = $this->montarListaObjetos($linhas, 'Curso');

			return $linhas;
		}else{
			return false;
		}
	}


	//pesquisa informações de um usuário
	public function pesquisarId($id)
	{
		echo "id dentro de pesquisarId: " .$id;
		$sql = "SELECT id, nomeoferta, codoferta, categoryid FROM sa_oferta_course_categories WHERE id = '$id' ";

		$rs  = $this->conexao->query($sql);
		if($rs){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        	$arr = $this->montarListaObjetos($arr, 'Curso');  //essa linha prepara os objetos para serem impressos os objetos na tela

        	// print_r($arr);
   			return $arr;

		}else{
			return false;
		}
	}







    public function consultarPorId($id)
    {
		$sql = "SELECT * from usuario where id_usuario = '{$id}'";
     	$rs  = $this->conexao->query($sql);
		if($rs && $rs->rowCount()){
        	$arr = $rs->fetchAll(PDO::FETCH_ASSOC);
			$arr = $this->montarListaObjetos($arr, 'Curso');
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
