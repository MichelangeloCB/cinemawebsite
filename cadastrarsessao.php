<?php 
require_once 'cabecalho.php';
require_once 'persistence/FilmePA.php';
if (isset($_COOKIE['admin'])){
	// vou mostrar a pagina
?>
<?php
$filmepa=new FilmePA();
if(!$filmepa->listarNomes()){
	echo "<h2 class='msg'>Favor cadastrar filme primeiro!</h2>";
}else{
?>
<form action="cadastrarsessao.php" method="POST">
<h2>Cadastrar Sessão</h2>
	<?php
	$consulta=$filmepa->listarNomes();
	echo"<p>Filme:<select name='cod_fil'>";
	while($linha=$consulta->fetch_assoc()){
		echo "<option value='".$linha['cod_fil'].
		"'>".$linha['titulo']."</option>";
	}
	echo "</select></p>";
?>
	<p>Data:<input type="date" name="data" min="<?= date('Y-m-d') ?>" required></p>
	<p>Inicio da Sessão<input type="time" name="hora" min="08:00:00" max="22:00:00" required></p>
	<p>Valor RS: <input type="number" name="valor" min="0.00" required></p>
	<p><input type="submit" name="botao" value="Cadastrar">
	</form>
<?php
}
if (isset($_POST['botao'])) {
	require_once 'model/sessao.php';
	require_once 'persistence/SessaoPA.php';
	$sessao=new sessao();
	$sessaopa=new SessaoPA();
	$sessao->setData($_POST['data']);
	$sessao->setCod_fil($_POST['cod_fil']);
	$sessao->setValor($_POST['valor']);
	$sessao->setHora($_POST['hora']);
	if($sessaopa->validarSessao($sessao->getCod_fil(),$sessao->getData(),$sessao->getHora())){
    		echo "<h2 class='msg'>Sessão já cadastrada! Tente digitar novamente!</h2>";

    	}else{
    		$sessao->setCod_se($sessaopa->retornaUltimo()+1);
    		if($sessaopa->cadastrar($sessao)){
				echo "<h2 class='msg'>Sessão cadastrada com sucesso!</h2>";
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