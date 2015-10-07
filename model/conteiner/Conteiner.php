<?php


class Conteiner{

	public $id_user = null;
	public $nome = null;
	public $login = null;
	public $email = null;
	public $senha = null;
	public $endereco = null;
	public $cpf = null;
	public $sexo = null;
	public $telefone = null;


	public function __construct($id_user = null, $nome = null, $login = null, $email = null,  $senha = null, $endereco = null, $cpf = null, $sexo = null, $telefone = null)
	{
        $this->id_user = $id_user;
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
        $this->endereco = $endereco;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->telefone = $telefone;
	}


	public function __set($chave, $valor){
		$this->{$chave} = $valor;
	}

	public function __get($chave){
		$this->{$chave};
	}


	//Os métodos __isset e __unset interferem nas chamadas às funções isset() e unset() respectivamente.
	public function __isset($chave)
	{
	    return isset($this->{$chave});
	}

	public function __unset($chave)
	{
	    unset($this->{$chave});
	}

	//O método __call é chamado toda vez que um método é chamado e não encontrado.
	public function __call($nomeDoMetodo, $argumentos)
	{
	   // vai reportar para alguém
	}


//$nomeDoMetodo - este argumento e padronizado pela classe Model.php lib/MVC/Model.php

}
?>
