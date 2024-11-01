<?php
 require_once 'Banco.php';
class SessaoPA{
	private $conexao;

	public function __construct()
	{
		$this->conexao=new Banco();
	}
	public function cadastrar($sessao)
    {
	$sql='insert into sessao values('.
			$sessao->getCod_se().",".
			$sessao->getCod_fil().",'".
			$sessao->getHora()."',".
			$sessao->getValor().",'".
			$sessao->getData()."')";
	//var_dump($sql);
		return $this->conexao->executar($sql);
	}
    
    public function retornaUltimo()
    {
    	$sql="select max(cod_se) as 'ultimo' from sessao";
    	$consulta=$this->conexao->consultar($sql);
    	if ($consulta) {
    		$linha=$consulta->fetch_row();
    		return $linha[0];
    	}else{
    		return 0;
    	}
    }

    public function listar($limite,$offset)
	{
		$sql="select * from sessao order by cod_se
		limit $limite offset $offset";
		return $this->conexao->consultar($sql);
	}

	public function contar()
	{
		$sql="select count(*) as 'contagem' from sessao";
		$consulta=$this->conexao->consultar($sql);
		$linha=$consulta->fetch_row();
		return $linha[0];
	}

	public function buscar($tipo,$valor){
	
		if($tipo=="hora"){
			$sql="select * from sessao 
			where hora like '%$valor%'";
		}else if($tipo=="valor"){
			$sql="select * from sessao 
			where valor=$valor";
		}else if($tipo=="data"){
			if(count(str_split($valor))>=9){
				$datafor=new DateTime(
					str_replace("/","-",$valor));
				$valor=$datafor->format('Y-m-d');
			}
			$sql="select * from sessao 
			where data like '%$valor%'";
		}else if($tipo=="filme"){
			$sql="select s.* from sessao s join filme f on f.cod_fil=s.cod_fil where f.titulo like '%$valor%'";
		}else{
			$sql="select * from sessao
			where hora like '%$valor%' or 
			valor='$valor' or data like 
			'%$valor%'";
	}
	//var_dump($sql);
     return $this->conexao->consultar($sql);
	}

        public function alterar($sessao)
	{
		$sql="update sessao set hora='".
		$sessao->getHora()."', valor =".
		$sessao->getValor().", data='".
		$sessao->getData()."' where cod_se=".
		$sessao->getCod_se();
		//var_dump($sql);
	   return $this->conexao->executar($sql);
	   }
	   
	   public function listrPorFilme($Cod_fil)
	   {
	   	 $sql="select * from sessao where cod_fil=$Cod_fil ";
	   	 return $this->conexao->consultar($sql);

	   }

	   public function validarSessao($cod_fil,$data,$hora)
	   {
	   		$sql="select * from sessao where cod_fil=$cod_fil and data='$data' and hora='$hora'";
	   		$consulta=$this->conexao->consultar($sql);
    		if ($consulta) {
    			return true;
    		}else{
    			return false;
    		}
	   }
	   public function listarSessoesPorData($codigo)
	   {
	   	$sql="select distinct data from sessao where cod_fil=$codigo";
	   	//var_dump($sql);
	   	return $this->conexao->consultar($sql);
	   }

	   public function listarSessoesPorHora($data,$cod_fil)
	   {
	   	$sql="select cod_se, hora from sessao where cod_fil = $cod_fil and data = '$data'";
	   	return $this->conexao->consultar($sql);
	   }

		public function retornaValores($codigo)
		{
			$sql="select * from sessao where
			cod_se=$codigo";
			return $this->conexao->consultar($sql);
		}
		public function excluir($codigo)
		{
			$sql="delete from sessao where cod_se=$codigo";
			return $this->conexao->executar($sql);
		}

		public function verificarSessao($sessao)
		{
			$sql="select cod_se from sessao
			where cod_fil='$cod_fil'";
			$consulta=$this->conexao->consultar($sql);
			if ($consulta) {
				return true;
			}else{
				return false;
			}
		}
	}
?>