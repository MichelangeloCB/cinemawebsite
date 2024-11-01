<?php
require_once 'cabecalho.php';
require_once 'persistence/FilmePA.php';
if (isset($_GET['elemento'])) {
	$filmepa=new FilmePA();
	$consulta=$filmepa->retornaValores($_GET['elemento']);
	$linha=$consulta->fetch_row();
?>
<form action="excluirfilme.php" method="POST">
	<h1>Excluir</h1>
	<p>Tem certeza que deseja excluir o</p>
	<p><?= $linha[2] ?></p>
	<input type="hidden" name="cod_fil" value="<?= $linha[0] ?>">
	<p><input type="submit" name="botao" value="Sim"></p>
</form>
<?php
}
if (isset($_POST['botao'])) {
	$filmepa=new FilmePA();
	if ($filmepa->excluir($_POST['cod_fil'])) {
		echo "<h2 class='msg'>Filme excluido com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de excluir!</h2>";
	}
}
?>
</body>
</html>