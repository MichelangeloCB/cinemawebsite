<?php
class Genero{
	private $cod_gen;
	private $nome;

	public function setCod_gen($cod_gen)
	{
		$this->cod_gen=$cod_gen;
	}

	public function getCod_gen()
	{
		return $this->cod_gen;
	}

	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}
}
?>