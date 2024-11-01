<?php 
require_once 'cabecalho.php';
require_once 'persistence/GeneroPA.php';
if (isset($_COOKIE['admin'])){
	// vou mostrar a pagina
?>
<?php
$generopa=new GeneroPA();
if(!$generopa->listarNomes()){
	echo "<h2 class='msg'>Favor cadastrar Generos primeiro!</h2>";
}else{
?>
<form action="cadastrarfilme.php" method="POST" enctype="multipart/form-data">
	<h1>Cadastrar Filme</h1>
	
<?php
	$consulta=$generopa->listarNomes();
	echo"<p>Gênero:<select name='cod_gen'>";
	while($linha=$consulta->fetch_assoc()){
		echo "<option value='".$linha['cod_gen'].
		"'>".$linha['nome']."</option>";
	}
	echo "</select></p>";
?>

  <p>Titulo<input type="text" name="titulo"
  	required></p>
  <p>Diretor<input type="text" name="diretor"
   required></p>
  <p>Duração<input type="time" name="duracao" min="00:00"
  max="04:00" required></p>
  <p><input type="submit" name="botao" value="Cadastrar"></p>		

</form>	
<?php
}
  if (isset($_POST['botao'])) {
  	require_once 'model/Filme.php';
  	require_once 'persistence/FilmePA.php';
  	$filme=new Filme();
  	$filmepa=new FilmePA();
  	$filme->setTitulo($_POST['titulo']);
  	$filme->setDiretor($_POST['diretor']);
  	$filme->setDuracao($_POST['duracao']);
  	$filme->setCod_gen($_POST['cod_gen']);
  	$filme->setCod_fil($filmepa->retornaUltimo()+1);
  	if ($filmepa->validarTitulo($filme->getTitulo())) {
  		echo "<h2 class='msg'>Filme já cadastrado</h2>";
 		}else{
  		if ($filmepa->cadastrar($filme)) {
  			echo "<h2 class='msg'>Filme cadastrado com sucesso!</h2>";
  		}else{
  			echo "<h2 class='msg'>Erro na tentativa de cadastro!
  			Tente novamente!</h2>";
  		}
  	}
  }
}else{
	echo "<h2 class='msg'>Você não esta logado!<h2>";
	echo "<a href='index.php'>Volte ao início!</a>";
}
?>
</body>
</html>