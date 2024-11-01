<?php require_once 'cabecalho.php';?>
<form action="logincliente.php" method="POST">
	<h1>Login</h1>
	<p>Usuário:<input type="text" name="usuario" size="25" maxlength="25" pattern="[a-zA-Z@_-0-9]{4,25}" placeholder="usuário" title="mínimo 4,máximo 5 caractéries letras maiúsculas,minusculas,números,@,_,- permitidos" required></p>
	<p>Senha:<input type="password" name="senha" size="10" maxlength="10" placeholder="senha" pattern="[a-zA-Z@_-0-9]{4,10}" required></p>
	<p>
		<input type="radio" name="tipo" value="admin" required>Admin
		<input type="radio" name="tipo" value="cliente" required>Cliente
	</p>
	<p><input type="submit" name="botao" value="Login"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		if ($_POST['tipo']=="cliente") {
			require_once 'model/cliente.php';
			require_once 'persistence/ClientePA.php';
			$cliente=new cliente();
			$clientepa=new ClientePA();
			$cliente->setUsuario($_POST['usuario']);
			$cliente->setSenha($_POST['senha']);
			if($clientepa->logar($cliente)){
				$codigo=$clientepa->converte('usuario',
					$cliente->getUsuario());
				$cliente->logar($codigo);
				echo "<h2  class='msg'>Bem-Vindo, ".$cliente->getUsuario()."!</h2>";
				//echo "<a class='entrar' href='principal.php'>Entrar</a>";
				//echo "<button onclick='muda()'>Entrar</button>";
				echo "<meta http-equiv='refresh' content='2;entrar.php'>";
			}else{
			echo "<h2 class='msg'>Usuário ou senha incorretos!</h2>";
			}
		}else{
			require_once 'model/Admin.php';
			require_once 'persistence/AdminPA.php';
			$Admin=new Admin();
			$Adminpa=new AdminPA();
			$Admin->setUsuario($_POST['usuario']);
			$Admin->setSenha($_POST['senha']);
			if($Adminpa->logar($Admin)){
				$codigo=$Adminpa->converte('usuario',
					$Admin->getUsuario());
				$Admin->logar($codigo);
				echo "<h2 class='msg'>Bem-Vindo, ".$Admin->getUsuario().
				"!</h2>";
				//echo "<a class='entrar' href='principal.php'>Entrar</a>";
				//echo "<button onclick='muda()'>Entrar</button>";
				echo "<meta http-equiv='refresh' content='2;entrar.php'>";
			}else{
				echo "<h2 class='msg'>Usuário ou senha incorretos!</h2>";
			}
		}
	}	
?>
</body>
</html>