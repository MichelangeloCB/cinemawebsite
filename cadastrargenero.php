<?php

require_once 'cabecalho.php';
if (isset($_COOKIE['admin'])){
	// vou mostrar a pagina
?>
<form action="cadastrargenero.php" method="POST">
<h2>Cadastrar Gêneros</h2>
	<p>Gênero: <input type="text" name="nome" size="25" maxlength="25" placeholder="Digite o gênero." required></p>
	<p><input type="submit" name="botao" value="Cadastrar">
	</form>
<?php
if (isset($_POST['botao'])) {
	require_once 'model/Genero.php';
	require_once 'persistence/GeneroPA.php';
	$genero=new Genero();
	$generopa=new GeneroPA();
	$genero->setNome($_POST['nome']);
	$genero->setCod_gen($generopa->retornaUltimo()+1);
	if ($generopa->verificarGenero(
			$genero->getNome())) {
				echo "<h2 class='msg'>Favor digitar outro gênero!</h2>";
	}else{
		if($generopa->cadastrar($genero)){
		echo "<h2 class='msg'>Gênero cadastrado com sucesso!</h2>";
		}else{
		 echo "<h2 class='msg'>Erro na tentativa de cadastro, tente novamente!</h2>";
		}
	}
}
}else{
	echo "<h2 class='msg'>Você não esta logado!<h2>";
	echo "<a href='index.php'>Volte ao início!</a>";
}
?>


