<?php
class Sessao{
	private $cod_se;
	private $cod_fil;
	private $hora;
	private $valor;
	private $data;

	public function setCod_se($cod_se)
	{
		$this->cod_se=$cod_se;
	}

	public function getCod_se()
	{
		return $this->cod_se;
	}

	public function setCod_fil($cod_fil)
	{
		$this->cod_fil=$cod_fil;
	}

	public function getCod_fil()
	{
		return $this->cod_fil;
	}

	public function setHora($hora)
	{
		$this->hora=$hora;
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function setValor($valor)
	{
		$this->valor=$valor;
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function setData($data)
	{
		$this->data=$data;
	}

	public function getData()
	{
		return $this->data;
	}
}
?>