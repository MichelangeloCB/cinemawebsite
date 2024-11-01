<?php
require_once 'cabecalho.php';
require_once 'model/Tempo.php';
$tempo=new Tempo();
?>
<form action="cadastrarcliente.php" method="POST">
	<h1>Cadastro de Cliente</h1>
	<p>Nome:<input type="text" name="nome"
		size="40" maxlength="40"
		pattern="[a-zA-Z\sçÇãÃéÉôÔ]{2,40}"
		required></p>
	<p>Endereço:<input type="text" name="endereco"
		size="50" maxlength="50"
		pattern="[a-zA-Z0-9\sçÇãÃéÉôÔ,]{3,50}"
		required></p>
	<p>Cpf:<input type="number" name="cpf"
		min="1" required></p>
	<p>Telefone:<input type="number" name="telefone"
		placeholder="42999999999"
		required></p>
	<p>Nascimento:<input type="date" 
		name="nascimento"
		min="<?= $tempo->minimo() ?>"
		max="<?= $tempo->maximo() ?>"
		required></p>
	<p>Criar nome de usuário:<input type="text" name="usuario"
		size="40" maxlength="40"
		pattern="[a-zA-Z\sçÇãÃéÉôÔ]{2,40}"
		required></p>
	<p>Criar senha:<input type="password" name="senha" size="40" maxlength="40" placeholder="senha" pattern="[a-zA-Z0-9\sçÇãÃéÉôÔ]{2,40}"></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/cliente.php';
		require_once 'persistence/ClientePA.php';
		$cliente=new cliente();
		$clientepa=new ClientePA();
		$cliente->setNome($_POST['nome']);
		$cliente->setEndereco($_POST['endereco']);
		$cliente->setCpf($_POST['cpf']);
		$cliente->setTelefone($_POST['telefone']);
		$cliente->setNascimento($_POST['nascimento']);
		$cliente->setUsuario($_POST['usuario']);
		$cliente->setSenha($_POST['senha']);
		if ($clientepa->validarCpf($cliente->getCpf())) {
			echo "<h2 class='msg'>CPF inválido! Tente digitar novamente!</h2>";
		}else{
			if ($clientepa->verificarUsuario($cliente->getUsuario())) {
				echo "<h2 class='msg'>Usuario inválido! Tente digitar novamente!</h2>";
			}else{
				$cliente->setCod_cli(
				$clientepa->retornaUltimo()+1);
				if($clientepa->cadastrar($cliente)){
					echo "<h2 class='msg'>Cliente cadastrado com sucesso !</h2>";
				}else{
					echo "<h2 class='msg'>Erro na tentativa de cadastro! Tente novamente!</h2>";
				}
		}
	}
}
?>
</body>
</html>