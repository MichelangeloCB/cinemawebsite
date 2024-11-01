<?php
class Agendamento{
	private $cod_agen;
	private $cod_cli;
	private $data;
	private $hora;
	private $acento;

	public function setCod_agen($cod_agen)
	{
		$this->cod_agen=$cod_agen;
	}

	public function getCod_agen()
	{
		return $this->cod_agen;
	}
	public function setCod_cli($cod_cli)
	{
		$this->cod_cli=$cod_cli;
	}

	public function getCod_cli()
	{
		return $this->cod_cli;
	}
	public function setCod_se($cod_se)
	{
		$this->cod_se=$cod_se;
	}

	public function getCod_se()
	{
		return $this->cod_se;
	}

	public function setData($data)
	{
		$this->data=$data;
	}

	public function getData()
	{
		return $this->data;
	}
	public function setHora($hora)
	{
		$this->hora=$hora;
	}

	public function getHora()
	{
		return $this->hora;
	}


	public function setAcento($acento)
	{
		$this->acento=$acento;
	}

	public function getAcento()
	{
		return $this->acento;
	}
}

?>