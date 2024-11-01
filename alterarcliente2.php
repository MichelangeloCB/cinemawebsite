<?php
require_once 'cabecalho.php';
require_once 'persistence/ClientePA.php';
if (isset($_COOKIE['cliente'])) {
	$clientepa=new ClientePA();
	$consulta=$clientepa->buscaParticular("cod_cli", $_COOKIE['cliente']);

	if (!$consulta) {
		echo "Cliente não encontrado!";
	}else{
		require_once 'model/cliente.php';
		require_once 'persistence/ClientePA.php';

		$cliente=new cliente();
		$clientepa=new ClientePA();

		echo "<table>";
		echo "<tr>";
		echo "<th>Código</th>";
		echo "<th>Nome</th>";
		echo "<th>Cpf</th>";
		echo "<th>Endereço</th>";
		echo "<th>usuario</th>";
		echo "<th>Nascimento</th>";
		echo "<th>Telefone</th>";
		echo "<th>Alterar</th>";
		echo "</tr>";

		while ($linha=$consulta->fetch_assoc()){

			$cliente->setCod_cli($linha['cod_cli']);
			$cliente->setNome($linha['nome']);
			$cliente->setCpf($linha['cpf']);
			$cliente->setEndereco($linha['endereco']);
			$cliente->setUsuario($linha['usuario']);
			$cliente->setNascimento($linha['nacimento']);
			$cliente->setTelefone($linha['telefone']);

			echo "<tr>";
			echo "<td>" .$cliente->getCod_cli(). "</td>";
			echo "<td>" .$cliente->getNome(). "</td>";
			echo "<td>" .$cliente->getCpf(). "</td>";
			echo "<td>" .$cliente->getEndereco(). "</td>";
			echo "<td>" .$cliente->getUsuario(). "</td>";
			echo "<td>" .$cliente->getNascimento(). "</td>";
			echo "<td>" .$cliente->getTelefone(). "</td>";
			echo "<td><a href='alterarcliente.php?elemento=". $_COOKIE['cliente']."'>Sim</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<?php
}
?>
</body>
</html>