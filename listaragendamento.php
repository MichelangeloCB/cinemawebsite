<?php 
require_once 'cabecalho.php';
require_once 'model/agendamento.php';
require_once 'persistence/AgendamentoPA.php';
$agendamentopa= new AgendamentoPA();
$agendamento= new Agendamento();
$total=$agendamentopa->contar();
if($total<=0){
	echo "<h2 class='msg'>Nenhum agendamento cadastrado!</h2>";
}else{
	if (isset($_GET['pagina'])){
		$pagina=$_GET['pagina'];
	}else{
		$pagina=1;
	}
	$limite=30;
	$offset=($pagina-1)*$limite;
	$consulta=$agendamentopa->listar($limite,$offset);
	require_once 'persistence/ClientePA.php';
	$clientepa=new ClientePA();

    echo "<table>";
    echo "<tr>";  
    echo "<th>Cliente</th>";
    echo "<th>data</th>";
    echo "<th>Hora</th>";
    echo "<th>Acento</th>";
    echo "</tr>";


    while ($linha=$consulta->fetch_assoc()) {
           $agendamento->setCod_cli($linha['cod_cli']);
           $agendamento->setCod_se($linha['cod_se']);
           $agendamento->setData($linha['data']);
           $agendamento->setHora($linha['hora']);
           $agendamento->setAcento($linha['assento']);
    
    echo "<tr>";
    echo "<td>".$clientepa->converteCodNome($agendamento->getCod_cli())."</td>";
    $datafor=new DateTime($agendamento->getData());
    echo "<td>".$datafor->format('d/m/Y')."</td>";
   	echo "<td>".$agendamento->getHora()."</td>";
   	echo "<td>".$agendamento->getAcento()."</td>";
   	echo "</tr>";
   }
   echo "</table>";
   echo "<p class='paginas'>";
	if($pagina>1){
		$volta=$pagina-1;
		echo "<a href='
		listaragendamento.php?pagina=$volta'>
		&lt;&lt;</a>";
	}
	echo " $pagina ";
	$num_paginas=ceil($total/$limite);
	if ($pagina<$num_paginas) {
		$volta=$pagina+1;
		echo "<a href='
		listarfilme.php?pagina=$volta'>
		&gt;&gt;</a>";
	}
	echo "</p>";
}
?>
</body>
</html>





