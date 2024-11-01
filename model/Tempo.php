<?php

class Tempo{

	public function minimo()
	{
		return date('Y-m-d', strtotime('-110 years'));
	}
	public function maximo()
	{
		return date('Y-m-d', strtotime('-18 years'));
	}


}
?>
