<?php
require_once 'Banco.php';

class AdminPA{
	private $conexao;

	public function __construct()
	{
		$this->conexao=new Banco();
	}

	public function logar($admin)
	{
		$sql="select usuario,senha from admin";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta){
			while ($linha=$consulta->fetch_assoc()){
				if ($admin->getUsuario()==$linha['usuario']){
					if ($admin->getSenha()==$linha['senha']){
						return true;
					}
				}
			}
			return false;
		}else{
			return false;
		}
	}
	public function converte($campo,$valor)
	{
		$sql="select cod_adm from admin
		where $campo='$valor'";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}
	public function retornaValores($codigo)
	{
		$sql="select * from admin where
		cod_adm=$codigo";
		return $this->conexao->consultar($sql);
	}
	public function listarNomes()
	{
		$sql="select cod_adm,nome from admin order by nome";
		return $this->conexao->consultar($sql);
	}
	public function alterar($admin)
	{
		$sql="update admin set senha='".
		$admin->getSenha()."', usuario='".
		$admin->getUsuario()."' where cod_adm=".
		$admin->getCod_adm();
		//var_dump($sql);
		return $this->conexao->executar($sql);
	}
}
?>