<?php

class Administrador{

	private $id = null;
	private $nome = null;



	public function __construct($id = null, $nome = null){

		$this->nome = $nome;
		$this->id = $id;
	}



	// o método __set é responsável por setar o valor de uma propriedade.
	public function __set( $chave, $valor )
	{
	    $this->{$chave} = $valor;
	}

	//o método __get é responsável por interceptar o retorno de uma propriedade.
	public function __get( $chave )
	{
		return $this->{$chave};
	}

	//Os métodos __isset e __unset interferem nas chamadas às funções isset() e unset() respectivamente.
	public function __isset( $chave )
	{
	    return isset( $this->{$chave} );
	}

	public function __unset( $chave )
	{
	    unset( $this->{$chave} );
	}

	//O método __call é chamado toda vez que um método é chamado e não encontrado.
	public function __call( $nomeDoMetodo, $argumentos )
	{
	   // vai reportar para alguém
	}

}
?>
