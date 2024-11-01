<?php
require_once 'cabecalho.php';
require_once 'persistence/generoPA.php';
$generopa=new generoPA();
if (isset($_GET['elemento'])) {
	$consulta=$generopa->retornaValores($_GET['elemento']);
	if (!$consulta) {
		echo "<h2 class='msg'>Nenhum genero correspondente!</h2>";
	}else{
		$linha=$consulta->fetch_row();
		require_once 'model/genero.php';
		require_once 'persistence/generoPA.php';
		$genero=new genero();
		$genero->setCod_gen($linha[0]);
		$genero->setNome($linha[1]);
?>
<form action="alterargenero.php" method="POST"
 enctype="multipart">
	<h1>Alterar</h1>
	<p>Código: <?= $genero->getCod_gen() ?></p>
	<input type="hidden" name="cod_gen" value="<?= $genero->getCod_gen() ?>">
	<p>Nome:<input type="text" name="nome" maxlength="30" pattern="[a-zA-Z\sçÇãÃ-e-EôÔ]{2,30}" value="<?= $genero->getNome()?>" required></p>
	<p><input type="submit" name="botao" value="Atualizar"></p>
</form>	
<?php 
	}
}

if (isset($_POST['botao'])) {
	require_once 'model/genero.php';
	$genero=new genero();
	$genero->setCod_gen($_POST['cod_gen']);
	$genero->setnome($_POST['nome']);
	if($generopa->alterar($genero)){
		echo "<h2 class='msg'>genero alterado com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de alterar!</h2>";
	}
}
?>
</body>
</html>