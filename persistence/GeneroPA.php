<?php

require_once 'Banco.php';

class GeneroPA{

	private $conexao;

	public function __construct()
	{
		$this->conexao=new Banco();
	}

	public function cadastrar($genero)
	{
		$sql="insert into genero values(".
		$genero->getCod_gen().",'".
		$genero->getNome()."')";
		//var_dump($sql);
		return $this->conexao->executar($sql);		
	}
	public function retornaUltimo()
	{
		$sql="select max(cod_gen) as 'ultimo'
		from genero";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			$linha=$consulta->fetch_row();
			return $linha[0];
		}else{
			return 0;
		}
	}

	public function buscar($valor)
	{
		$sql="select * from genero 
			where nome like '%$valor%'";

		return $this->conexao->consultar($sql);
	}

	public function alterar($genero)
	{
		$sql="update genero set nome='".
		$genero->getNome()."' where cod_gen=".
		$genero->getCod_gen();
		return $this->conexao->executar($sql);
	}
	public function listarNomes()
	{
		$sql="select cod_gen,nome from genero 
		order by nome";
		return $this->conexao->consultar($sql);
	}
	public function contar()
	{
		$sql="select count(*) as 'contagem' 
		from genero";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}

	public function listar($limite,$offset)
	{
		$sql="select * from genero 
		order by cod_gen
		limit $limite offset $offset";
		return $this->conexao->consultar($sql);
	}
	public function converteCodNome($codigo)
	{
		$sql="select nome from genero where cod_gen=$codigo order by nome";
		$consulta=$this->conexao->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
		//var_dump($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}
}
		public function retornaValores($codigo)
	{
		$sql="select * from genero where
		cod_gen=$codigo";

		return $this->conexao->consultar($sql);
	}

	public function converteNomeCod($nome)
	{
		$sql="select cod_gen from genero where nome = '$nome' order by cod_gen";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}
	public function excluir($codigo)
	{
		$sql="delete from genero where cod_gen=$codigo";
		return $this->conexao->executar($sql);
	}
	public function verificargenero($nome)
	{
		$sql="select cod_gen from genero where nome='$nome'";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta){
			return true;
		}else{
			return false;
		}	
	}
}
?>