<?php require_once 'cabecalho.php';?>
<form action="buscaragendamento.php" method="GET">
	<h1>Buscar</h1>
	<p><input type="search" name="busca"></p>
		<input type="radio" name="tipo" value="agendamento">Agendamento
		<input type="radio" name="tipo" value="hora">Hora
		<input type="radio" name="tipo" value="data">Data
		<p><input type="submit" name="botao"
		value="Buscar"></p>
	</p>
</form>
<?php
 if (isset($_GET['botao'])) {
 	require_once 'model/agendamento.php';
 	require_once 'persistence/AgendamentoPA.php';
 	$agendamento=new Agendamento();
 	$agendamentopa=new AgendamentoPA();
 	if(isset($_GET['tipo'])){
 		 	$consulta=$agendamentopa->buscar($_GET['tipo'],$_GET['busca']);
 		 }else{
 		 	$consulta=$agendamentopa->buscar('geral',$_GET['busca']);
 		 }

 	if (!$consulta){
 		echo "<h2 class='msg'>Nenhum agendamento encontrado!</h2>";
 	}else{


 		echo "<table>";
 		echo "<tr>";
 		echo "<th>Código</th>";
 		echo "<th>Data</th>";
 		echo "<th>Hora</th>";
 		if (isset($_COOKIE['admin'])) {
				echo "<th>Excluir</th>";
		}		
 		echo "</tr>";

 		while ($linha=$consulta->fetch_assoc()) {
           $agendamento->setCod_agen($linha['cod_agen']);
           $agendamento->setHora($linha['hora']);
           $agendamento->setData($linha['data']);

    	echo "<tr>";
    	echo "<td>".$agendamento->getCod_agen()."</td>";
 		$datafor=new DateTime($agendamento->getData());
    	echo "<td>".$datafor->format('d/m/Y')."</td>";
    	echo "<td>".$agendamento->getHora()."</td>";    
    	if (isset($_COOKIE['admin'])) {
					echo "<td><a href='excluiragendamento.php?elemento=".
					$agendamento->getCod_agen()."'>Sim</a></td>";	
 	}
 }
}
 		echo "</td>";
 		echo "</table>";
 
 } ?>

</body>
</html>
