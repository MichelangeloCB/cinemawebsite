<?php
require_once 'cabecalho.php';
require_once 'persistence/FilmePA.php';
$filmepa=new FilmePA();
if (isset($_GET['elemento'])) {
	$consulta=$filmepa->retornaValores($_GET['elemento']);
	if (!$consulta) {
		echo "<h2 class='msg'>Nenhum Filme correspondente!</h2>";
	}else{
		$linha=$consulta->fetch_row();
		require_once 'model/Filme.php';
		require_once 'persistence/GeneroPA.php';
		$filme=new Filme();
		$generopa=new GeneroPA();
		$filme->setCod_fil($linha[0]);
		$filme->setCod_gen($linha[1]);
		$filme->setTitulo($linha[2]);
		$filme->setDiretor($linha[3]);
		$filme->setDuracao($linha[4]);
?>
<form action="alterarfilme.php" method="POST" enctype="multipart/form-data">
	<h1>Alterar</h1>
	<p>Código: <?= $filme->getCod_fil() ?></p>
	<input type="hidden" name="cod_fil" value="<?= $filme->getCod_fil() ?>">
	<p>Gênero:<select name="cod_gen"></p>
<?php
	$titulos=$generopa->listarNomes();
	while ($lin=$titulos->fetch_assoc()){
		if ($filme->getCod_gen()==$lin['cod_gen']) {
			echo "<option value='".$lin['cod_gen']."' selected>".$lin['nome']."</option>";
		}else{
			echo "<option value='".$lin['cod_gen']."'>".$lin['nome']."</option>";
		}
	}
?>
	</select></p>
<p>Titulo:<input type="text" name="titulo" size="40" maxlength="40" pattern="[a-zA-Z\sçÇãÃéÉôÔ]{2,40}" value="<?= $filme->getTitulo() ?>"></p>
<p>Diretor:<input type="text" name="diretor" size="40" maxlength="40" value="<?= $filme->getDiretor() ?>"></p>
<p>Duração:<input type="time" name="duracao" value="<?= $filme->getDuracao() ?>"></p>
<p><input type="submit" name="botao" value="Atualizar"></p>
</form>
<?php
	}
}
if(isset($_POST['botao'])){
	require_once 'model/Filme.php';
	$filme=new Filme();

	$filme->setCod_fil($_POST['cod_fil']);
	$filme->setCod_gen($_POST['cod_gen']);
	$filme->setTitulo($_POST['titulo']);
	$filme->setDiretor($_POST['diretor']);
	$filme->setDuracao($_POST['duracao']);
	if ($filmepa->alterar($filme)) {
		echo "<h2 class='msg'>Filme alterado com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Error na tentativa de alterar!</h2>";
	}
}
?>
</body>
</html>
