<?php require_once 'cabecalho.php';?>
<form action="buscarfilme.php" method="GET">
	<h1>Buscar filme</h1>
	<p><input type="search" name="busca"></p>
	<p>Tipo:
		<input type="radio" name="tipo" value="titulo">Título
		<input type="radio" name="tipo" value="genero">Gênero
		<p><input type="submit" name="botao" value="Buscar"></p>
	</p>
</form>
<?php
	if (isset($_GET['botao'])) {
		require_once 'model/filme.php';
		require_once 'persistence/FilmePA.php';
		$filme=new filme();
		$filmepa=new FilmePA();
		if(isset($_GET['tipo'])&&$_GET['busca']){
			if ($_GET['tipo']=="genero") {
				require_once 'persistence/GeneroPA.php';
				$generopa=new GeneroPA();
				$consulta=$filmepa->buscar($_GET['tipo'],$generopa->converteNomeCod($_GET['busca']));
			}else{
			$consulta=$filmepa->buscar($_GET['tipo'],$_GET['busca']);
			}
		}else{
			$consulta=$filmepa->buscar("geral",$_GET['busca']);
		}
		if (!$consulta) {
			echo "<h2 class='msg'>Nenhum Filme correspondente!</h2>";
		}else{
			echo "<table>";
			echo "<tr>";
			echo "<th>Código</th>";
			echo "<th>Gênero</th>";
			echo "<th>Título</th>";
			echo "<th>Diretor</th>";
			echo "<th>Duração</th>";
			if (isset($_COOKIE['admin'])) {
				echo "<th>Alterar</th>";
				echo "<th>Excluir</th>";
			}
			echo "</tr>";

			while($linha=$consulta->fetch_assoc()){
				$filme->setCod_fil($linha['cod_fil']);
				$filme->setCod_gen($linha['cod_gen']);
				$filme->setTitulo($linha['titulo']);
				$filme->setDiretor($linha['diretor']);
				$filme->setDuracao($linha['duracao']);

				echo "<tr>";
				echo "<td>".$filme->getCod_fil()."</td>";
				echo "<td>".$filme->getCod_gen()."</td>";
				echo "<td>".$filme->getTitulo()."</td>";
				echo "<td>".$filme->getDiretor()."</td>";
				echo "<td>".$filme->getDuracao()."</td>";
				if (isset($_COOKIE['admin'])) {
					echo "<td><a href='alterarfilme.php?elemento=".
					$filme->getCod_fil()."'>Sim</a></td>";
					echo "<td><a href='excluirfilme.php?elemento=".
					$filme->getCod_fil()."'>Sim</a></td>";
				}
				echo "</th>";
			} 
			echo "</table>";
		}
	}
?>
</body>
</html>