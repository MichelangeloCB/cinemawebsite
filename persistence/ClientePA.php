<?php

require_once 'Banco.php';

class ClientePA{

	private $conexao;

	public function __construct()
	{
		$this->conexao=new Banco();
	}


	

	public function cadastrar($cliente)
	{
		$sql="insert into cliente values(".
				$cliente->getCod_cli().",'".
				$cliente->getUsuario()."','".
				$cliente->getEndereco()."',".
				$cliente->getCpf().",'".
				$cliente->getSenha()."','".
				$cliente->getTelefone()."','".
				$cliente->getNome()."','".
				$cliente->getNascimento()."')";
				//var_dump($sql);
		return $this->conexao->executar($sql);
	}

	public function retornaUltimo()
	{
		$sql="select max(cod_cli) as 'ultimo' from cliente";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			$linha=$consulta->fetch_row();
			return $linha[0];
		}else{
			return 0;
		}
	}

	public function converte($campo,$valor)
	{
		$sql="select cod_cli from cliente
		where $campo='$valor'";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}

	public function logar($cliente)
	{
		$sql="select usuario,senha from cliente";
		$consulta=$this->conexao->consultar($sql);
		if($consulta){
			while($linha=$consulta->fetch_assoc()){
				if($cliente->getUsuario()==$linha['usuario']){
					if($cliente->getSenha()==$linha['senha']){
						return true;
					}
							}
			}
			return false;
		}else{
			return false;
		}
	}



	public function validarCpf($cpf)
	{
		$sql="select cod_cli from cliente where cpf=$cpf";
		$consulta=$this->conexao->consultar($sql);
		if($consulta){
			return true;
		}else{
			return false;
		}
	}

	public function listarNomes()
	{
		$sql="select nome,cod_cli from cliente order by nome";
		return $this->conexao->consultar($sql);
	}

	public function converteCodNome($codigo)
	{
		$sql="select nome from cliente where cod_cli=$codigo";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			$linha=$consulta->fetch_row();
			return $linha[0];
		}else{
			return false;
		}
	}

	public function buscar($tipo,$valor)
	{
		if($tipo=="usuario"){
			$sql="select * from cliente 
			where usuario like '%$valor%'";
		}else if($tipo=="cpf"){
			$sql="select * from cliente 
			where cpf='$valor'";
		}else if($tipo=="nascimento"){
			if(count(str_split($valor))>=9){
				$datafor=new DateTime(
					str_replace("/","-",$valor));
				$valor=$datafor->format('Y-m-d');
			}
			$sql="select * from cliente 
			where nacimento like '%$valor%'";

		}else{
			if ($valor=='') {
				return false;
			}
			$sql="select * from cliente 
			where usuario like '%$valor%' or 
			cpf='$valor' or nacimento like 
			'%$valor%'";
		}
			//var_dump($sql);
		return $this->conexao->consultar($sql);
		}
	public function buscaParticular($tipo,$valor)
	{
		if ($tipo=="cod_cli") {
			$sql="SELECT * FROM cliente WHERE cod_cli=$valor";
		}
		return $this->conexao->consultar($sql);
	}

	public function converteCodUsuario($codigo)
	{
		$sql="select usuario from cliente 
		where cod_cli=$codigo";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			$linha=$consulta->fetch_row();
			return $linha[0];
		}else{
			return false;
		}
	}
	public function listar($limite,$offset)
	{
		$sql="select * from cliente 
		order by cod_cli
		limit $limite offset $offset";
		return $this->conexao->consultar($sql);
	}

		public function contar()
	{
		$sql="select count(*) as 'contagem' 
		from cliente";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}

	public function retornaValores($codigo)
	{
		$sql="select * from cliente where
		cod_cli=$codigo";
		return $this->conexao->consultar($sql);
	}

	public function alterar($cliente)
	{
		$sql="update cliente set usuario='".
		$cliente->getUsuario()."', endereco='".
		$cliente->getEndereco()."', cpf=".
		$cliente->getCpf().", senha='".
		$cliente->getSenha()."', telefone='".
		$cliente->getTelefone()."', nacimento='".
		$cliente->getNascimento()."' where cod_cli=".
		$cliente->getCod_cli();
		//var_dump($sql);
		return $this->conexao->executar($sql);
	}
	public function excluir($codigo)
	{
		$sql="delete from cliente where cod_cli=$codigo";
		return $this->conexao->executar($sql);
	}
	public function verificarUsuario($usuario)
	{
		$sql="select cod_cli from cliente where usuario='$usuario'";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			return true;
		}else{
			return false;
		}
	}
}
?>