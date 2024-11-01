<?php
require_once 'cabecalho.php';
require_once 'persistence/SessaoPA.php';
$sessaopa=new SessaoPA();
if (isset($_GET['elemento'])) {
	$consulta=$sessaopa->retornaValores($_GET['elemento']);

	if (!$consulta) {
		echo "<h2 class='msg'>Nenhum sessão correspondente!</h2>";
	}else{
		$linha=$consulta->fetch_row();
		require_once 'model/Sessao.php';
		require_once 'persistence/SessaoPA.php';
		$sessao=new sessao();
		$sessao->setCod_se($linha[0]);
		$sessao->setCod_fil($linha[1]);
		$sessao->setHora($linha[2]);
		$sessao->setValor($linha[3]);
		$sessao->setData($linha[4]);
?>

<form action="alterarsessao.php" method="POST"
 enctype="multipart/form-data">
	<h1>Alterar</h1>
	<p>Código: <?= $sessao->getCod_se() ?></p>
	<input type="hidden" name="cod_se" value="<?= $sessao->getCod_se() ?>">
	<p>Data:<input type="date" name="data" value="<?= $sessao->getData() ?>" required></p>
	<p>Hora:<input type="time" name="hora" min="0.0"  value="<?= $sessao->getHora()?>"></p>
	<p>Valor:<input type="number" name="valor" min="0.0" step="0.01" value="<?= $sessao->getValor()?>"></p>
	<p><input type="submit" name="botao" value="Atualizar"></p>
</form>	
<?php 
	}
}

if (isset($_POST['botao'])) {
	require_once 'model/sessao.php';
	$sessao=new sessao();
	$sessao->setCod_se($_POST['cod_se']);
	$sessao->setHora($_POST['hora']);
	$sessao->setValor($_POST['valor']);
	$sessao->setData($_POST['data']);
	if($sessaopa->alterar($sessao)){
		echo "<h2 class='msg'>Sessão alterada com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de alterar!</h2>";
	}
}

?>
</body>
</html>