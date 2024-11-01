<?php

class Admin {
	private $cod_adm;
	private $usuario;
	private $senha;

public function setCod_adm($cod_adm)
	{
		$this->cod_adm=$cod_adm;
	}
public function getCod_adm()
{
	return $this->cod_adm;
}
public function setUsuario($usuario)
{
	$this->usuario=$usuario;
}
public function getUsuario()
{
	return $this->usuario;
}
public function setSenha($senha)
{
	$this->senha=md5($senha);
}
public function getSenha()
{
	return $this->senha;
}

public function logar($cod_adm)
	{
		setcookie("admin",$cod_adm);
	}

	public function logoff()
	{
		setcookie("admin","");
	}
}

?>