<?php
require_once 'cabecalho.php';
require_once 'model/Admin.php';
require_once 'persistence/AdminPA.php';
if (isset($_COOKIE['admin'])){
	// vou mostrar a pagina
?>
<?php
$adminpa=new AdminPA();
	$consulta=$adminpa->retornaValores($_COOKIE['admin']);
	if (!$consulta) {
		echo "<h2>Não correspondente!</h2>";
	}else{
		$linha=$consulta->fetch_row();
		require_once 'model/Admin.php';
		require_once 'persistence/AdminPA.php';
		$admin=new Admin();
		$admin->setCod_adm($linha[0]);
		$admin->setUsuario($linha[2]);
		$admin->setSenha($linha[1]);
?>
<form action="alteraradmin.php" method="POST" enctype="multipart/form-data">
	<h1>Alterar</h1>
	<p>Código: <?= $admin->getCod_adm() ?></p>
	<input type="hidden" name="cod_adm" value="<?= $admin->getCod_adm() ?>">
	<p>Usuario:<input type="text" name="usuario" maxlength="30" pattern="[a-zA-Z\sçÇãÃ-e-EôÔ]{2,30}" value="<?= $admin->getUsuario()?>" required></p>
	<p>Senha:<input type="password" name="senha" size="10" maxlength="10" placeholder="senha" pattern="[a-zA-Z@_-0-9]{4,10}" required></p>
	<p><input type="submit" name="botao" value="Atualizar"></p>
</form>	
<?php 
	}

if (isset($_POST['botao'])) {
	require_once 'model/Admin.php';
	$admin=new Admin();
	$admin->setCod_adm($_POST['cod_adm']);
	$admin->setUsuario($_POST['usuario']);
	$admin->setSenha($_POST['senha']);
	if($adminpa->alterar($admin)){
		echo "<h2 class='msg'>Admin alterado com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de alterar!</h2>";
	}
}
}else{
	echo "<h2 class='msg'>Você não esta logado!<h2>";
	echo "<a href='index.php'>Volte ao início!</a>";
}
?>
</body>
</html>