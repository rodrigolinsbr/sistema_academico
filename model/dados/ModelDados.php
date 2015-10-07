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


class ModelDados extends Model
{
	public function __construct()
	{
		parent::__construct(); //esse construct e herdado da classe model..
	}


	//public function uploadCSV($nomeoferta, $codigooferta, $categoriaoferta)
	public function uploadCSV(){

		echo "entrou em upload";
		if ($_FILES[csvFileInput][size] > 0) {  //verifica se existe algum arquivo a ser upado

				$arquivo = $_FILES[csvFileInput][tmp_name]; //a variavel arquivo pega o nome originanl do arquivo e usa temporariamente

				if (($handle = fopen($arquivo, "r")) !== FALSE) { //se existir um aquivo no momento da leitura do arquivo

					//ele vai iterar pelos dados
					while (($dados = fgetcsv($handle, 1000, ",")) !== FALSE) {

						$query = mysql_query("SELECT id, cpf FROM sa_user_docs WHERE cpf = ".$dados[1]." ") or die(mysql_error());
	          			$result = mysql_num_rows($query);



	          			if ($result == 0) {
	              			echo "<script>alert('nao achou cpf duplicado');</script>";


						$insert_user = "INSERT INTO sa_user_docs (
								nome,
				                cpf,
				                rg,
				                email,
				                telefone,
				                nome_instituicao,
				                uf_atuacao,
				                municipio_atuacao,
				                conselho,
				                num_conselho,
				                uf_conselho,
				                graduacao,
				                ano_graduacao,
				                situacao_edicao,
				                data_situacao,
				                dsei,
				                ciclo,
				                etapa,
				                flag)
							VALUES
							(
			                    '".addslashes($dados[0])."',
			                    '".addslashes($dados[1])."',
			                    '".addslashes($dados[2])."',
			                    '".addslashes($dados[3])."',
			                    '".addslashes($dados[4])."',
			                    '".addslashes($dados[5])."',
			                    '".addslashes($dados[6])."',
			                    '".addslashes($dados[7])."',
			                    '".addslashes($dados[8])."',
			                    '".addslashes($dados[9])."',
			                    '".addslashes($dados[10])."',
			                    '".addslashes($dados[11])."',
			                    '".addslashes($dados[12])."',
			                    '".addslashes($dados[13])."',
			                    '".addslashes($dados[14])."',
			                    '".addslashes($dados[15])."',
			                    '".addslashes($dados[16])."',
			                    '".addslashes($dados[17])."',
			                    0
			                )" or die(mysql_error());

							$last_id = mysql_insert_id(); //recupero o id do ultimo registro inserido
							echo "<script language='JavaScript'> alert(".$last_id.");</script>";

							$acao = $this->conexao->prepare($insert_user);
							$retorno['result'] = $acao->execute();

							if ($retorno) {
								echo "cadastrado com sucesso";
							}else{
								echo "nao cadastrou";
							}

						}else{
							echo "o usuario ja esta cadastrado";
						}

					} //while

				} //if interno

			} //if externo

}


	public function insert_user($data){

		$this->db->insert(PREFIX.'members',$data);
		return $this->_db->lastInsertId('memberID');
	}

	public function pesquisarTodos(){

		$sql = "SELECT id, nomeoferta FROM sa_oferta_course_categories";
		$result = $this->conexao->query($sql);
		if ($result) {
			$linhas = $result->fetchAll(PDO::FETCH_ASSOC);
			$linhas = $this->montarListaObjetos($linhas, 'Oferta');

			return $linhas;
		}else{
			return false;
		}
	}
}
?>
