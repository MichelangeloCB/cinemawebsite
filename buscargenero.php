<?php require_once 'cabecalho.php';?>
<form action="buscargenero.php" method="GET">
	<h1>Buscar</h1>
	<p><input type="search" name="buscar" required></p>
		<p><input type="submit" name="botao"
		value="Buscar"></p>
	</p>
</form>
<?php
	if (isset($_GET['botao'])) {
		require_once 'model/genero.php';
		require_once 'persistence/generoPA.php';
		require_once 'persistence/filmePA.php';
		$genero=new genero();
		$generopa=new GeneroPA();
		$filmepa=new FilmePA();
		$consulta=$generopa->buscar($_GET['buscar']);
		if (!$consulta) {
			echo "<h2 class='msg'>Nenhum gênero correspondente!</h2>";
		}else{
			echo "<table>";
			echo "<tr>";
			echo "<th>Codigo</th>";
			echo "<th>Nome</th>";
			if (isset($_COOKIE['admin'])) {
				echo "<th>Alterar</th>";
				echo "<th>Excluir</th>";
			}
			echo "</tr>";
			while($linha=$consulta->fetch_assoc()){
				$genero->setCod_gen($linha['cod_gen']);
				$genero->setNome($linha['nome']);
				echo "<tr>";
				echo "<td>".$genero->getCod_gen()."</td>";
				echo "<td>".$genero->getNome()."</td>";
				if (isset($_COOKIE['admin'])) {
					echo "<td><a href='alterargenero.php?elemento=".
					$genero->getCod_gen()."'>Sim</a></td>";
					echo "<td><a href='excluirgenero.php?elemento=".
					$genero->getCod_gen()."'>Sim</a></td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

	}
?>
</body>
</html>