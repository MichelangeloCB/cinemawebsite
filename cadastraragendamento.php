<?php
require_once 'cabecalho.php';
require_once 'persistence/FilmePA.php';
$filmepa = new FilmePA();
$consulta = $filmepa->listarNomes();
if(!$consulta){
	if(isset($_COOKIE['admin'])){
		echo "<h2 class='msg'>Favor cadastrar filme primeiro</h2>";	
	}else{
		echo "<h2 class='msg'>Nenhum filme cadastrado no momento</h2>";
	}
	
}else{
?>
<form action="cadastraragendamento2.php" method="POST">
	<h1>Cadastrar Agendamento</h1>
	<p>Para qual filme?
		<select name="cod_fil">
<?php
	while($linha=$consulta->fetch_assoc()){
		echo "<option value='".$linha['cod_fil']."'>".$linha['titulo']."</option>";
	}	
?>
</select></p>
<p><input type="submit" name="botao" value="Escolher">
</p>
</form>
<?php
}
?>
</body>
</html>

