<?php
require_once 'cabecalho.php';
require_once 'persistence/GeneroPA.php';
require_once 'model/Genero.php';
$generopa=new GeneroPA();
$genero=new Genero();
$total=$generopa->contar();
if($total<=0){
	echo "<h2 class='msg'>Nenhum genero cadastrado!</h2>";
}else{

	if (isset($_GET['pagina'])) {
		$pagina=$_GET['pagina'];
	}else{
		$pagina=1;
	}

	$limite=3;
	$offset=($pagina-1)*$limite;
	$consulta=$generopa->listar($limite,$offset);
	require_once 'model/cliente.php';
	require_once 'persistence/GeneroPA.php';


	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Nome</th>";
	echo "</tr>";



	while($linha=$consulta->fetch_assoc()){
		$genero->setCod_gen($linha['cod_gen']);
		$genero->setNome($linha['nome']);
		
		echo "<tr>";
		echo "<td>".$genero->getCod_gen()."</td>";
		if(!$generopa->converteCodNome(
			$genero->getCod_gen())){
			echo "<h2>Código do gênero 
			inexistente!</h2>";
		}else{
			echo "<td>".$generopa->converteCodNome(
			$genero->getCod_gen())."</td>";
		}

	}
	echo "</table>";
	echo "<p class='paginas'>";
	if($pagina>1){
		$volta=$pagina-1;
		echo "<a href='
		listargenero.php?pagina=$volta'>
		&lt;&lt;</a>";
	}
	echo " $pagina ";

	$num_paginas=ceil($total/$limite);
	if ($pagina<$num_paginas) {
		$volta=$pagina+1;
		echo "<a href='
		listargenero.php?pagina=$volta'>
		&gt;&gt;</a>";
	}
	echo "</p>";
}
?>
</body>
</html>
