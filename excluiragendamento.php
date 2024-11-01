<?php
require_once 'cabecalho.php';
require_once 'persistence/AgendamentoPA.php';
if (isset($_GET['elemento'])) {
	$agendamentopa=new AgendamentoPA();
	$consulta=$agendamentopa->retornaValores($_GET['elemento']);
	$linha=$consulta->fetch_row();
	?>
	<form action="excluiragendamento.php" method="GET">
		<h1>Excluir</h1>
		<p>Tem certeza que deseja excluir</p>
		<p><?= $linha[2]?></p>
		<input type="hidden" name="cod_agen" value="<?= $linha[0] ?>">
		<p><input type="submit" name="botao" value="Sim"></p>
	</form>
<?php
	}
	if (isset($_GET['botao'])) {
	$agendamentopa=new AgendamentoPA();
	if ($agendamentopa->excluir($_GET['cod_agen'])) {
		echo "<h1>Agendamento excluido com sucesso!</h1>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de excluir!</h2>";
	}
}
?>
</body>
</html>