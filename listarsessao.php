<?php
require_once 'cabecalho.php';
require_once 'persistence/SessaoPA.php';
$sessaopa=new SessaoPA();
$total=$sessaopa->contar();
if ($total<=0) {
	echo "<h2 class='msg'>Nenhuma Sessão cadastrada!</h2>";
}else{
	if(isset($_GET['pagina'])){
		$pagina=$_GET['pagina'];
	}else{
		$pagina=1;
	}

	$limite=1;
	$offset=($pagina-1)*$limite;
	$consulta=$sessaopa->listar($limite,$offset);
	require_once 'model/sessao.php';
	require_once 'persistence/FilmePA.php';
	$filmepa=new FilmePA();
	$sessao=new sessao();

	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Filme</th>";
	echo "<th>Hora</th>";
	echo "<th>Valor</th>";
	echo "<th>Data</th>";
	echo "</tr>";

	while ($linha=$consulta->fetch_assoc()) {
		$sessao->setCod_se($linha['cod_se']);
		$sessao->setCod_fil($linha['cod_fil']);
		$sessao->setCod_fil($linha['cod_fil']);
		$sessao->setHora($linha['hora']);
		$sessao->setValor($linha['valor']);
		$sessao->setData($linha['data']);

		echo "<tr>";
		echo "<td>".$sessao->getCod_se()."</td>";
		if (!$filmepa->converteCodNome($sessao->getCod_fil())) {
			echo "<h2>Código do Filme inexistente!</h2>";
		}else{
			echo "<td>".$filmepa->converteCodNome($sessao->getCod_fil())."</td>";
		}
		echo "<td>".$sessao->getData()."</td>";
		echo "<td>".$sessao->getValor()."</td>";
		echo "<td>".$sessao->getData()."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p class='paginas'>";
	if($pagina>1){
		$volta=$pagina-1;
		echo "<a href='
		listarsessao.php?pagina=$volta'>
		&lt;&lt;</a>";
	}
	echo " $pagina ";

	$num_paginas=ceil($total/$limite);
	if ($pagina<$num_paginas) {
		$volta=$pagina+1;
		echo "<a href='
		listarsessao.php?pagina=$volta'>
		&gt;&gt;</a>";
	}
	echo "</p>";
}
?>
</body>
</html>