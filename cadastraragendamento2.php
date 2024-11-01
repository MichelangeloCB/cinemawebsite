<?php
require_once 'cabecalho.php';
require_once 'persistence/SessaoPA.php';
$sessaopa=new SessaoPA();
$consulta = $sessaopa->listarSessoesPorData($_POST['cod_fil']);
if(!$consulta){
	echo "<h2 class='msg'>Não há sessões desse filme!</h2>";
	}else{
		?>
	<form action="cadastraragendamento3.php" method="POST">
	<h1>Cadastrar sessão</h1>
	<p>Para qual data?
		<select name="data">
<?php
	while($linha=$consulta->fetch_assoc()){
		$datafor=new DateTime($linha['data']);
		echo "<option value='".$linha['data']."'>".$datafor->format('d/m/Y')."</option>";
	}

?>
</select></p>
<input type="hidden" name="cod_fil" value="<?= $_POST['cod_fil']?>">
<p><input type="submit" name="botao" value="Escolher">
</p>
</form>
<?php
}
?>
</body>
</html>