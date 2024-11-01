<?php
require_once 'cabecalho.php';
require_once 'persistence/FilmePA.php';
$filmepa=new FilmePA();
$total=$filmepa->contar();
if ($total<=0) {
	echo "<h2 class='msg'>Nenhum Filme cadastrado!</h2>";
}else{
	if (isset($_GET['pagina'])) {
		$pagina=$_GET['pagina'];
	}else{
		$pagina=1;
	}

	$limite=1;
	$offset=($pagina-1)*$limite;
	$consulta=$filmepa->listar($limite,$offset);
	require_once 'model/filme.php';
	require_once 'persistence/GeneroPA.php';
	$generopa=new GeneroPA();
	$filme=new filme();

	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Genero</th>";
	echo "<th>Titulo</th>";
	echo "<th>Diretor</th>";
	echo "<th>Duração</th>";
	echo "</tr>";

	while($linha=$consulta->fetch_assoc()){
		$filme->setTitulo($linha['titulo']);
		$filme->setDiretor($linha['diretor']);
		$filme->setDuracao($linha['duracao']);
		$filme->setCod_fil($linha['cod_fil']);
		$filme->setCod_gen($linha['cod_gen']);

		echo "<tr>";
		echo "<td>".$filme->getCod_fil()."</td>";
		if($generopa->converteCodNome($filme->getCod_gen())){
			echo "<td>".$generopa->converteCodNome($filme->getCod_gen())."</td>";
		}else{
			echo "<td>".$filme->getCod_gen()."</td>";
		}
		
		echo "<td>".$filme->getTitulo()."</td>";
		echo "<td>".$filme->getDiretor()."</td>";
		echo "<td>".$filme->getDuracao()."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p class='paginas'>";
	if($pagina>1){
		$volta=$pagina-1;
		echo "<a href='
		listarfilme.php?pagina=$volta'>
		&lt;&lt;</a>";
	}
	echo " $pagina ";
	
	$num_paginas=ceil($total/$limite);
	if ($pagina<$num_paginas) {
		$volta=$pagina+1;
		echo "<a href='
		listarfilme.php?pagina=$volta'>
		&gt;&gt;</a>";
	}
	echo "</p>";
}
?>
</body>
</html>