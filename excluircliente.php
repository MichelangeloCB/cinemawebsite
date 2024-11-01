<?php 
require_once 'cabecalho.php';
require_once 'persistence/ClientePA.php';
if (isset($_GET['elemento'])){
	$clientepa=new ClientePA();
	$consulta=$clientepa->retornaValores(
		$_GET['elemento']);
	$linha=$consulta->fetch_row();
?>
<form action="excluircliente.php" method="POST">
	<h1>Excluir</h1>
	<p>Tem certeza que deseja excluir o</p>
	<p><?=$linha[1]?></p>
	<input type="hidden" name="cod_cli"
	value="<?=$linha[0]?>">
	<p><input type="submit" name="botao"
		value="Sim"></p>
</form>
<?php
}
if (isset($_POST['botao'])) {
	$clientepa=new clientepa();
	if($clientepa->excluir($_POST['cod_cli'])){
		echo "<h2 class='msg'>Cliente excluido com sucesso!</h2>";

	}else{
		echo "<h2 class='msg'>Erro na tentativa de excluir</h2>";

	}
}
?>
</body>
</html>