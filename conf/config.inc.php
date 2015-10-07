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
* @author [nome do autor] <[e-mail do autor]>
* @copyright [Informações de Direitos de Cópia]
* @license [link da licença] [Nome da licença]
* @link [link de onde pode ser encontrado esse arquivo]
* @version [Versão atual do arquivo]
* @since [Arquivo existe desde: Data ou Versao]
*/
$pasta = getcwd();
$pasta = str_replace("\\", "/", $pasta);
$pasta = str_replace($_SERVER['DOCUMENT_ROOT'], "", $pasta);
define("CAMINHO_PORTAL",$_SERVER['DOCUMENT_ROOT'].$pasta.'/');
define("URL_PORTAL", "http://" . $_SERVER['SERVER_NAME'] .$pasta.'/');
// echo $pasta."<br>";
define("PASTA_VIEW", "view/");

define("TEMPLATE", "padrao"); // template

define('SMTP_HOST', "smtp.mail.yahoo.com");// host do smtp
define('SMTP_USER', "email_autenticacao@emil.com");// usuário do smtp
define('SMTP_SENHA', "minha_senha");// senha do smtp
define('SMTP_EMAIL', "meu@email.com");// endereço de e-mail de quem está enviando
define('SMTP_NOME', "SEu Nnme");// Nome de quem está enviando

define('TIPO_EMAIL', "SMTP");

$confBD['host'] = "localhost";
$confBD['type'] = "mysql";
$confBD['user'] = "root";
$confBD['pass'] = "sa_homolog";
$confBD['base'] = "sa_homolog";
