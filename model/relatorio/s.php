<?php

$filename = 'downloads/'.strtotime("now").'.csv';
//echo $filename;

$sql = mysql_query("SELECT * FROM sa_user_docs WHERE flag = 1") or die(mysql_error());
$num_rows = mysql_num_rows($sql);

if ($num_rows >= 1) {

	$row = mysql_fetch_assoc($sql);
	$openFile = fopen($filename, "w");
	$separator = "";
	$comma = "";

	//itero pelo array com os dados vindo de ($row). ADICIONA O NOME DAS COLUNAS NO CABEÇALHO
	foreach ($row as $columnName => $value) {
		$separator .= $comma. '' .str_replace('', ' "" ', $columnName);
		$comma = ",";
	}
	$separator .= "\n";
	//echo $separator;
	fputs($openFile,$separator);

	mysql_data_seek($sql, 0); //pega os dados do banco e

	//OS VALORES DAS TABELAS E ESCREVE NO ARQUIVO
	while ($row = mysql_fetch_assoc($sql)){
		$separator = "";
		$comma = "";
		foreach ($row as $columnName => $value) {
			$separator .= $comma. '' .str_replace('', ' "" ', $value);
			$comma = ",";
		}
		$separator .= "\n";
		fputs($openFile,$separator);
		}

	fclose($openFile);

}else{
	echo "Sem dados cadastrados no banco de dados!";
}
?>
