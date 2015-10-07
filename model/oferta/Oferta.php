<?php

class Oferta{

	public $idoferta = null;
	public $nomeoferta = null;
	public $codoferta = null;
	public $categoriaoferta = null;


	public function __construct($idoferta = null, $nomeoferta = null, $codoferta = null, $categoriaoferta = null){
		$this->idoferta = $idoferta;
		$this->nomeoferta = $nomeoferta;
		$this->codoferta = $codoferta;
		$thi->categoriaoferta = $categoriaoferta;
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
