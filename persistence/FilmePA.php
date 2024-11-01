<?php
require_once 'Banco.php';
class FilmePA{

	private $conexao;

	public function __construct()
	{
		$this->conexao=new Banco();
	}

	public function cadastrar($filme)
	{
		$sql="insert into filme values(".
		$filme->getCod_fil().",".
		$filme->getCod_gen().",'".
		$filme->getTitulo()."','".
		$filme->getDiretor()."','".
		$filme->getDuracao()."')";
		//var_dump($sql);
		return $this->conexao->executar($sql);
	}
	

	public function retornaUltimo()
	{
		$sql="select max(cod_fil) as 'ultimo' from filme";
		$consulta=$this->conexao->consultar($sql);
		if($consulta) {
			$linha=$consulta->fetch_row();
			return $linha[0];
		}else{
			return 0;
		}
	}

	public function listar($limite,$offset)
	{
		$sql="select * from filme order by cod_fil limit $limite offset $offset";
		return $this->conexao->consultar($sql);
	}

	public function contar()
	{
		$sql="select count(*) as 'contagem' from filme";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}

	public function buscar($tipo,$valor)
	{
		if($tipo=="titulo"){
			$sql="select * from filme where titulo like '%$valor%'";
		}else if($tipo=="diretor"){
			$sql="select * from filme where diretor like '%$valor%'";
		}else if($tipo=="duracao"){
			$sql="select * from filme where duracao='%$valor%'";
		}else if($tipo=="genero"){
			$sql="select * from filme where cod_gen= $valor";
		}else{
			$sql="select * from filme where titulo like '%$valor%' or diretor='$valor' or duracao like '%$valor%'";
		}
		return $this->conexao->consultar($sql);
	}

	public function alterar($filme)
	{
		$sql="update filme set titulo='".
		$filme->getTitulo()."', diretor='".
		$filme->getDiretor()."', duracao='".
		$filme->getDuracao()."' where cod_fil=".
		$filme->getCod_fil();
		//var_dump($sql);
		return $this->conexao->executar($sql);
	}

	public function listarNomes()
	{
		$sql="select cod_fil,titulo from filme order by titulo";
		return $this->conexao->consultar($sql);
	}
	public function converteCodNome($codigo)
	{
		$sql="select titulo from filme where cod_fil=$codigo";
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			$linha=$consulta->fetch_row();
			return $linha[0];
		}else{
			return false;
		}

	}
	public function retornaValores($codigo)
	{
		$sql="select * from filme where cod_fil=$codigo";
		return $this->conexao->consultar($sql);
	}

	public function excluir($codigo)
	{
		$sql="delete from filme where cod_fil=$codigo";
		return $this->conexao->executar($sql);
	}

	public function validarTitulo($titulo)
	{
		$sql="select cod_fil from filme 
		where titulo='$titulo'";
		//var_dump($sql);
		$consulta=$this->conexao->consultar($sql);
		if ($consulta) {
			return true;
		}else{
			return false;
		}
}
}
?>