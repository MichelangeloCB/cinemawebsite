<?php require_once 'cabecalho.php';?>
<form action="buscarsessao.php" method="GET">
	<h1>Buscar sessão</h1>
	<p><input type="search" name="busca"></p>
	<p>Tipo:
		<input type="radio" name="tipo" value="hora">Hora
		<input type="radio" name="tipo" value="data">Data
		<input type="radio" name="tipo" value="valor">Valor
		<input type="radio" name="tipo" value="filme">Filme

	</p>
		<p><input type="submit" name="botao"
		value="Buscar"></p>
	</p>
</form>
<?php
	if (isset($_GET['botao'])) {
		require_once 'model/sessao.php';
		require_once 'persistence/sessaoPA.php';
		require 'persistence/filmePA.php';
		$sessao=new Sessao();
		$sessaopa=new SessaoPA();
		$filmepa=new FilmePA();
		if($_GET['tipo']=="valor"){
			//teste
	    $valor=str_replace(",",".",$_GET['busca']);
		}else{
			$valor=$_GET['busca'];
		}
		$consulta=$sessaopa->buscar($_GET['tipo'],$valor);
		if (!$consulta) {
			echo "<h2 class='msg'>Nenhuma Sessão correspondente!</h2>";
		}else{
			echo "<table>";
			echo "<tr>";
			echo "<th>Codigo</th>";
			echo "<th>Filme</th>";
			echo "<th>Hora</th>";
			echo "<th>Valor</th>";
			echo "<th>Data</th>";
			if (isset($_COOKIE['admin'])) {
				echo "<th>Alterar</th>";
				echo "<th>Excluir</th>";
			}
			echo "</tr>";

			
			while($linha=$consulta->fetch_assoc()){
				$sessao->setCod_se($linha['cod_se']);
				$sessao->setCod_fil($linha['cod_fil']);
				$sessao->setHora($linha['hora']);
				$sessao->setValor($linha['valor']);
				$sessao->setData($linha['data']);
				

				echo "<tr>";
				echo "<td>".$sessao->getCod_se()."</td>";
				echo "<td>".
				$filmepa->converteCodNome(
					$sessao->getCod_fil())."</td>";
				echo "<td>".$sessao->getHora()."</td>";
				echo "<td>".$sessao->getValor()."</td>";
				echo "<td>".$sessao->getData()."</td>";
				if (isset($_COOKIE['admin'])) {
					echo "<td><a href='alterarsessao.php?elemento=".
					$sessao->getCod_se()."'>Sim</a></td>";
					echo "<td><a href='excluirsessao.php?elemento=".
					$sessao->getCod_se()."'>Sim</a></td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

	}
?>
</body>
</html>