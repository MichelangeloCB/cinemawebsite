<?php require_once 'cabecalho.php';
if (isset($_COOKIE['admin'])){
	// vou mostrar a pagina
?>
<form action="buscarcliente.php" method="GET">
	<h1>Buscar cliente</h1>
	<p><input type="search" name="busca"></p>
	<p>Tipo:
		<input type="radio" name="tipo"
		value="usuario">Nome de usuário
		<input type="radio" name="tipo"
		value="cpf">Cpf
		<input type="radio" name="tipo"
		value="nascimento">Nascimento
	</p>
	<p><input type="submit" name="botao"
		value="Buscar"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		require 'persistence/ClientePA.php';
		$clientepa=new ClientePA();
		if (isset($_GET['tipo'])&&
			$_GET['tipo']=="cpf") {
			$consulta=$clientepa->buscar($_GET['tipo'],
				$_GET['busca']);
		}else if (isset($_GET['tipo'])&&
			$_GET['busca']) {
			$consulta=$clientepa->buscar($_GET['tipo'],
			$_GET['busca']);			
		}else{
			$consulta=$clientepa->buscar("geral",
				$_GET['busca']);
		}
		if (!$consulta) {
			echo "<h2 class='msg'>Nenhum cliente correspondente!</h2>";
		}else{
			echo "<table>";
			echo "<tr>";
			echo "<th>Código</th>";
			echo "<th>Usuário</th>";
			echo "<th>Cpf</th>";
			echo "<th>Nascimento</th>";
			if (isset($_COOKIE['admin'])) {
				echo "<th>Alterar</th>";
				echo "<th>Excluir</th>";
			}
			echo "</tr>";

			require_once 'model/cliente.php';
			$cliente=new Cliente();

			while($linha=$consulta->fetch_assoc()){
				$cliente->setCod_cli($linha['cod_cli']);
				$cliente->setusuario($linha['usuario']);
				$cliente->setCpf($linha['cpf']);
				$cliente->setNascimento($linha['nacimento']);

				echo "<tr>";
				echo "<td>".$cliente->getCod_cli()."</td>";
				echo "<td>".$cliente->getusuario()."</td>";
				echo "<td>".$cliente->getCpf()."</td>";
				$datafor=new DateTime($cliente->getNascimento());
				echo "<td>".$datafor->format('d/m/Y')."</td>";
				if (isset($_COOKIE['admin'])) {
					echo "<td><a href='alterarcliente.php?elemento=".
					$cliente->getCod_cli()."'>Sim</a></td>";
					echo "<td><a href='excluircliente.php?elemento=".
					$cliente->getCod_cli()."'>Sim</a></td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

	}
}else{
	echo "<h2 class='msg'>Você não esta logado!<h2>";
	echo "<a href='index.php'>Volte ao início!</a>";
}
?>
</body>
</html>