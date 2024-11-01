<?php

require_once 'Banco.php';

class AgendamentoPA {
	private $conexao;

	public function __construct()
	 {
	 	$this->conexao=new Banco();
	 }

	 public function cadastrar($agendamento)
	 {
	 	$sql="insert into agendamento values(".
	 	$agendamento->getCod_agen().",".
	 	$agendamento->getCod_cli().",".
	 	$agendamento->getCod_se().",'".
	 	$agendamento->getData()."','".
	 	$agendamento->getHora()."',".
	 	$agendamento->getAcento().")";
	 	//var_dump($sql);
	 	return $this->conexao->executar($sql);
	 }

	 public function retornaUltimo()
	 {
	 	$sql="select max(cod_agen) as 'ultimo' from agendamento";
	 	$consulta=$this->conexao->consultar($sql);
	 	if($consulta){
	 		$linha=$consulta->fetch_row();
	 		return $linha[0];
	 	}else{
	 		return 0;
	 	}
	 }


	 	public function validarAcento($cpf)
	 	{
	 		$sql="select a.cod_agen from agendamento a join cliente c 
	 		on a.cod_cli = c.cod_cli where c.cpf=$cpf";
	 		$consulta=$this->conexao->consultar($sql);
	 		if ($consulta) {
	 			$linha=$consulta->fetch_row();
	 			return $linha[0];
	 		}else{
	 			return 0;
	 		}
	 	}
	 	public function retornaCodSessao($hora,$cod_fil)
	 	{
	 		$sql="select cod_se from sessao where cod_fil = $cod_fil and hora = '$hora'";
	 		$consulta=$this->conexao->consultar($sql);
	 		$linha=$consulta->fetch_row();
	 		return $linha[0];
	 	}

	 	public function verificaAcento($acento)
	 	{
	 		$sql="select cod_agen from agendamento where assento = $acento";
	 		$consulta=$this->conexao->consultar($sql);
	 		if (!$consulta) {
	 			return true;
	 		}else{ 
	 			return false;
	 		}
	 	}

	 	public function contar()
	{
		$sql="select count(*) as 'contagem' from agendamento";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}
	public function listar($limite,$offset)
	{
		$sql="select * from agendamento order by cod_agen limit $limite offset $offset";
		//var_dump($sql);
		return $this->conexao->consultar($sql);
	}
	public function buscar($tipo,$valor){
	
		if($tipo=="hora"){
			$sql="select * from agendamento 
			where hora like '%$valor%'";
			//var_dump($sql);
		}else if($tipo=="data"){
			if(count(str_split($valor))>=9){
				$datafor=new DateTime(
					str_replace("/","-",$valor));
				$valor=$datafor->format('Y-m-d');
			}
			$sql="select * from agendamento 
			where data like '%$valor%'";
		}else if($tipo=="filme"){
			$sql="select s.* from agendamento s join filme f on f.cod_agen=s.cod_agen where f.titulo like '%$valor%'";
		}else{
			$sql="select * from agendamento
			where hora like '%$valor%' or 
			valor='$valor' or data like 
			'%$valor%'";

	}
	return $this->conexao->consultar($sql);
}
	public function retornaValores($codigo)
	{
		$sql="select * from agendamento where
		cod_agen=$codigo";
		return $this->conexao->consultar($sql);
	}
	public function excluir($codigo)
	{
		$sql="delete from agendamento where cod_agen=$codigo";
		return $this->conexao->executar($sql);
	}
}
?>