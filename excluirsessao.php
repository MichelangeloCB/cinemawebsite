<?php
require_once 'cabecalho.php';
require_once 'persistence/SessaoPA.php';
if (isset($_GET['elemento'])) {
	$sessaopa=new SessaoPA();
	$consulta=$sessaopa->retornaValores($_GET['elemento']);
	$linha=$consulta->fetch_row();
?>
<form action="excluirsessao.php" method="POST">
	<h1>Excluir</h1>
	<p>Tem certeza que deseja excluir o</p>
	<p><?= $linha[2] ?></p>
	<input type="hidden" name="cod_se" value="<?= $linha[0]?>">
	<p><input type="submit" name="botao" value="Sim"></p>
</form>
<?php
}
if (isset($_POST['botao'])) {
	$sessaopa=new SessaoPA();
	if ($sessaopa->excluir($_POST['cod_se'])) {
		echo "<h2 class='msg'>Sessão excluida com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de excluir!</h2>";
	}
}
?>
</body>
</html>