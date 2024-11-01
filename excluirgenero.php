<?php
require_once 'cabecalho.php';
require_once 'persistence/GeneroPA.php';
if (isset($_GET['elemento'])) {
	$generopa=new Generopa();
	$consulta=$generopa->retornaValores($_GET['elemento']);
	$linha=$consulta->fetch_row();
?>
<form action="excluirgenero.php" method="POST">
	<h1>Excluir</h1>
	<p>Tem certeza que deseja EXCUIR o</p>
	<p><?= $linha[1]?></p>
	<input type="hidden" name="cod_gen" value="<?=$linha[0]?>">
	<p><input type="submit" name="botao" value="Sim"></p>
</form>
<?php
}
if (isset($_POST['botao'])) {
	$generopa=new Generopa();
	if ($generopa->excluir($_POST['cod_gen'])) {
		echo "<h2 class='msg'>Gênero excluido com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de excluir!</h2>";
	}
}
?>