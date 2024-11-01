<?php

	class Banco{

		private $conexao;
		private $url;
		private $usuario;
		private $senha;
		private $banco;

		public function __construct()
		{
			$this->url="localhost";
			$this->usuario="root";
			$this->senha="";
			$this->banco="cinemax";
			$this->conexao=new mysqli($this->url,$this->usuario,$this->senha,$this->banco);
			$this->conexao->set_charset("utf8mb4");
		}

		public function executar($sql)
		{
			if($this->conexao->query($sql)){
				return true;
			}else{
				return false;
			}
		}

		public function consultar($sql)
		{
			$consulta=$this->conexao->query($sql);
			$linhas=$consulta->num_rows;
			if($linhas>0){
				return $consulta;
			}else{
				return false;
			}
		}
	}

?>