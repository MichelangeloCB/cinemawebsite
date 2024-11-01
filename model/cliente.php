<?php

class Cliente{

	private $cod_cli;
	private $nome;
	private $cpf;
	private $endereco;
	private $usuario;
	private $nascimento;
	private $senha;
	private $telefone;

	public function setCod_Cli($cod_cli)
	{
		$this->cod_cli=$cod_cli;
	}

	public function getCod_Cli()
	{
		return $this->cod_cli;
	}

	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setCPF($cpf)
	{
		$this->cpf=$cpf;
	}

	public function getCPF()
	{
		return $this->cpf;
	}

	public function setEndereco($endereco)
	{
		$this->endereco=$endereco;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function setUsuario($usuario)
	{
		$this->usuario=$usuario;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setNascimento($nascimento)
	{
		$this->nascimento=$nascimento;
	}

	public function getNascimento()
	{
		return $this->nascimento;
	}

	public function setSenha($senha)
	{
		$this->senha=md5($senha);
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setTelefone($telefone)
	{
		$this->telefone=$telefone;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function logar($cod_fun)
	{
		setcookie("cliente",$cod_fun);
	}

	public function logoff()
	{
		setcookie("cliente","");
	}

}

?>