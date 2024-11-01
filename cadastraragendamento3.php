<?php
require_once 'cabecalho.php';
require_once 'persistence/SessaoPA.php';
$sessaopa=new SessaoPA();
if (isset($_POST['botao'])) {
$consulta = $sessaopa->listarSessoesPorHora($_POST['data'],$_POST['cod_fil']);
if(!$consulta){
	echo "<h2 class='msg'>Não há horario disponivel durante sessões desse filme!</h2>";
}else{
	?>
	<form action="cadastraragendamento3.php" method="POST">
	<h1>Cadastrar sessão</h1>
	<p>Para qual hora?
		<select name="hora">
<?php
	while($linha=$consulta->fetch_assoc()){
	$hora= explode(':',$linha['hora']);
	echo "<option value='".$linha['hora']."'>".$hora[0].":".$hora[1]."</option>";
}
?>
</select></p>

<input type="hidden" name="data" value="<?=$_POST['data']?>">
<input type="hidden" name="cod_fil" value="<?=$_POST['cod_fil']?>">
<p>Acento: 
<input type="number" name="assento"  min="1" max="100" value="<?=$_POST['assento']?>"></p>
<p><input type="submit" name="botao2" value="escolher"></p>
</form>
<?php
}
}

if (isset($_POST['botao2'])){
	require_once 'model/agendamento.php';
	require_once 'persistence/AgendamentoPA.php';
	$agendamento= new Agendamento();
	$agendamentopa= new AgendamentoPA();
	
	$agendamento->setCod_cli($_COOKIE['cliente']);
	$agendamento->setData($_POST['data']);
	$agendamento->setHora($_POST['hora']);
	$agendamento->setCod_se($agendamentopa->retornaCodSessao($_POST['hora'],($_POST['cod_fil'])));
	$agendamento->setAcento($_POST['assento']);
	if($agendamentopa->verificaAcento($agendamento->getAcento())){
		$agendamento->setCod_agen($agendamentopa->retornaUltimo()+1);
		if($agendamentopa->cadastrar($agendamento)){
			echo "<h2 class='msg'>Agendamento cadastrada com sucesso!</h2>";
		}else{
			echo "<h2 class='msg'>Erro na tentativa de cadastro!</h2>";
		}
	}else{
		echo "<h2 class='msg'>Acento já reservado, escolha outro!</h2>";
	}
	
}
?>
</body>
</html>
