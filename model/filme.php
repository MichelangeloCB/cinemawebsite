<?php
	class Filme{

		private $titulo;
		private $diretor;
		private $duracao;
		private $cod_fil;
		private $cod_gen;

		public function setTitulo($titulo)
		{
			$this->titulo=$titulo;
		}

		public function getTitulo()
		{
			return $this->titulo;
		}

		public function setDiretor($diretor)
		{
			$this->diretor=$diretor;
		}

		public function getDiretor()
		{
			return $this->diretor;
		}

		public function setDuracao($duracao)
		{
			$this->duracao=$duracao;
		}

		public function getDuracao()
		{
			return $this->duracao;
		}

		public function setCod_fil($cod_fil)
		{
			$this->cod_fil=$cod_fil;
		}

		public function getCod_fil()
		{
			return $this->cod_fil;
		}

		public function setCod_gen($cod_gen)
		{
			$this->cod_gen=$cod_gen;
		}

		public function getCod_gen()
		{
			return $this->cod_gen;
		}
	}
?>