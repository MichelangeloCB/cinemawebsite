<?php require_once 'cabecalho.php'; 
$palavras=array('a','b','Z','@','_','-','0','7');
?>
	<form>
	<h1><u>Ajuda com o login</u></h1>
	<div class="ajudalogin">
		
	<p>Colocar nome de usuário, em seguida crie uma senha forte</p>
	<p>senhas fortes<p>

<?php
$senhaforte=array();
for($i=0;$i<40;$i++){
	$senhaforte[$i]=$palavras[rand(0,7)];
}
echo "Senha sugerida: ";
foreach ($senhaforte as $letra) {
	echo $letra;
}


?>
</form>
