
<html>
	<input type="button" value="Voltar Para Pagina Anterior" onclick="javascript:history.back()";/>
	<br><br>
 </html>

<?php

$idmotorista1 = $_POST['idmotorista'];
$motorista1 = $_POST['motorista'];
$idpassageiro1 = $_POST['idpassageiro'];
$passageiro1 = $_POST['passageiro'];


$conexao = mysqli_connect("localhost", "root", "","dbcorridas");
//criando a query de consulta à tabela criada
$sql = mysqli_query($conexao, "SELECT * FROM tb_corrida
INNER JOIN tb_motorista ON tb_motorista.id_motorista = tb_corrida.id_motorista
INNER JOIN tb_passageiro ON tb_passageiro.id_passageiro = tb_corrida.id_passageiro
WHERE tb_motorista.id_motorista like '%$idmotorista1' 
AND tb_passageiro.id_passageiro like '%$idpassageiro1'
AND tb_motorista.nome_motorista like '%$motorista1%'
AND tb_passageiro.nome_passageiro like '%$passageiro1%' ORDER BY tb_corrida.id_corrida;") or die(
	mysqli_error($conexao) //caso haja um erro na consulta
);
 
if($sql->num_rows != 0){ 
//pecorrendo os registros da consulta.
	while($aux = mysqli_fetch_assoc($sql))
	{	
	echo "<br />";
	echo "ID Corrida:".$aux["id_corrida"]."   ";
	echo "Nome Motorista:".$aux["nome_motorista"]."    ";
	echo "Nome Passageiro:".$aux["nome_passageiro"]."    ";
	echo "Valor da Corrida:".$aux["valor_corrida"]."    ";	
	}
} else{
	echo "Nenhum Registro Foi Encontrado!";
}

?>