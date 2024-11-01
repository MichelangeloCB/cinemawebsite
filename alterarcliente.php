<?php
require_once 'cabecalho.php';
require_once 'persistence/ClientePA.php';
$clientepa=new ClientePA();
if (isset($_GET['elemento'])) {
	$consulta=$clientepa->retornaValores($_GET['elemento']);
	if (!$consulta) {
		echo "<h2 class='msg'>Nenhum Cliente correspondente!</h2>";
	}else{
		$linha=$consulta->fetch_row();
		require_once 'model/Cliente.php';
		require_once 'persistence/ClientePA.php';
		$cliente=new Cliente();
		$cliente->setCod_cli($linha[0]);
		$cliente->setUsuario($linha[1]);
		$cliente->setEndereco($linha[2]);
		$cliente->setCpf($linha[3]);
		$cliente->setSenha($linha[4]);
		$cliente->setTelefone($linha[5]);
		$cliente->setNome($linha[6]);
		$cliente->setNascimento($linha[7]);
?>
<form action="alterarcliente.php" method="POST"
 enctype="multipart/form-data">
	<h1>Alterar</h1>
	<p>Código: <?= $cliente->getCod_cli() ?></p>
	<input type="hidden" name="cod_cli" value="<?= $cliente->getCod_cli() ?>">
	<p>Usuario:<input type="text" name="usuario" maxlength="30" pattern="[a-zA-Z\sçÇãÃ-e-EôÔ]{2,30}" value="<?= $cliente->getUsuario()?>" required></p>
	<p>Endereço:<input type="text" name="endereco" value="<?= $cliente->getEndereco() ?>"></p>
	<p>Cpf:<input type="number" name="cpf" min="0.0" step="0.01" value="<?= $cliente->getCpf()?>"></p>
	<p>Senha:<input type="password" name="senha" required></p>
	<p>Telefone:<input type="number" name="telefone" min="0.0" step="0.01" value="<?= $cliente->getTelefone()?>"></p>
	<p>Nascimento:<input type="date" name="nascimento" value="<?= $cliente->getNascimento() ?>"></p>
	<p><input type="submit" name="botao" value="Atualizar"></p>
</form>	
<?php 
	}
}

if (isset($_POST['botao'])) {
	
	require_once 'model/Cliente.php';
	$cliente=new Cliente();
	$cliente->setCod_cli($_POST['cod_cli']);
	$cliente->setUsuario($_POST['usuario']);
	$cliente->setEndereco($_POST['endereco']);
	$cliente->setCpf($_POST['cpf']);
	$cliente->setTelefone($_POST['telefone']);
	$cliente->setNascimento($_POST['nascimento']);
	$cliente->setSenha($_POST['senha']);
	if($clientepa->alterar($cliente)){
		echo "<h2 class='msg'>Cliente alterado com sucesso!</h2>";
	}else{
		echo "<h2 class='msg'>Erro na tentativa de alterar!</h2>";
	}
}
?>
</body>
</html>