<?php
require_once 'cabecalho.php';
require_once 'persistence/clientePA.php';
if (isset($_COOKIE['admin'])){
	// vou mostrar a pagina
?>
<?php
$clientePA=new clientePA();
$total=$clientePA->contar();
if($total<=0){
	echo "<h2 class='msg'>Nenhum cliente cadastrado!</h2>";
}else{

	if (isset($_GET['pagina'])) {
		$pagina=$_GET['pagina'];
	}else{
		$pagina=1;
	}

	$limite=10;
	$offset=($pagina-1)*$limite;
	$consulta=$clientePA->listar($limite,$offset);
	require_once 'model/cliente.php';
	require_once 'persistence/ClientePA.php';
	$clientepa=new ClientePA();
	$cliente=new cliente();

	echo "<table>";
	echo "<tr>";
	echo "<th>cod_cli</th>";
	echo "<th>Nome</th>";
	echo "<th>cpf</th>";
	echo "<th>endereco</th>";
	echo "<th>usuario</th>";
	echo "<th>Nascimento</th>";
	echo "<th>telefone</th>";
	echo "</tr>";



	while($linha=$consulta->fetch_assoc()){
		$cliente->setCod_cli($linha['cod_cli']);
		$cliente->setNome($linha['nome']);
		$cliente->setCpf($linha['cpf']);
		$cliente->setEndereco($linha['endereco']);
		$cliente->setUsuario($linha['usuario']);
		$cliente->setNascimento($linha['nacimento']);
		$cliente->setTelefone($linha['telefone']);

		echo "<tr>";
		echo "<td>".$cliente->getCod_cli()."</td>";
		if(!$clientepa->converteCodNome(
			$cliente->getCod_cli())){
			echo "<h2>Código de Cliente 
			inexistente!</h2>";
		}else{
			echo "<td>".$clientepa->converteCodNome(
			$cliente->getCod_cli())."</td>";
		}
		echo "<td>".$cliente->getCpf()."</td>";
		echo "<td>".$cliente->getEndereco()."</td>";
		echo "<td>".$cliente->getUsuario()."</td>";
		$datafor=new DateTime($cliente->getNascimento());
		echo "<td>".$datafor->format('d/m/Y')."</td>";
		echo "<td>".$cliente->getTelefone()."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p class='paginas'>";
	if($pagina>1){
		$volta=$pagina-1;
		echo "<a href='
		listarcliente.php?pagina=$volta'>
		&lt;&lt;</a>";
	}
	echo " $pagina ";

	$num_paginas=ceil($total/$limite);
	if ($pagina<$num_paginas) {
		$volta=$pagina+1;
		echo "<a href='
		listarcliente.php?pagina=$volta'>
		&gt;&gt;</a>";
	}
	echo "</p>";
}
}else{
	echo "<h2 class='msg'>Você não esta logado!<h2>";
	echo "<a href='index.php'>Volte ao início!</a>";
}
?>
</body>
</html>
