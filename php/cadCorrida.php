<?php

$motorista2 = $_POST['motorista1'];
$passageiro2 = $_POST['passageiro1'];
$cpfmotorista2 = $_POST['cpfmotorista1'];
$cpfpassageiro2 = $_POST['cpfpassageiro1'];
$valor2 = $_POST['valor1'];


$conexao = mysqli_connect("localhost", "root", "", "dbcorridas");
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

$querymotorista = mysqli_query($conexao,"SELECT * FROM tb_motorista WHERE  id_motorista = '$motorista2' OR cpf_motorista = '$cpfmotorista2'");

$querypassageiro = mysqli_query($conexao,"SELECT * FROM tb_passageiro WHERE  id_passageiro = '$passageiro2' OR cpf_passageiro = '$cpfpassageiro2'");

if($querymotorista->num_rows != 0){
	$queryativo = mysqli_query($conexao,"SELECT status_motorista FROM tb_motorista WHERE  id_motorista = '$motorista2' OR cpf_motorista = '$cpfmotorista2'");
	$row = mysqli_fetch_row($queryativo);
	$nome = $row[0];
	
}

if($querymotorista->num_rows != 0 && $querypassageiro->num_rows != 0 && $nome == 1){
	$queryinsert = "INSERT INTO `tb_corrida` (`id_corrida`, `id_motorista`, `id_passageiro`, `valor_corrida`) VALUES (NULL, '$motorista2', '$passageiro2', '$valor2')";
	mysqli_query($conexao,$queryinsert); //Insert Query
	echo "Corrida Cadastrada Com Sucesso!!";
} else 
	if($querymotorista->num_rows == 0 && $querypassageiro->num_rows == 0){
	echo "Nem o Motorista, nem o Passageiro Existem em Nosso Cadastro!";	
} else 
	if($querymotorista->num_rows == 0){
	echo "Motorista não existe em nosso Cadastro!";	
} else 
	if($querypassageiro->num_rows == 0){
	echo "Passageiro não existe em nosso Cadastro!";	
}else 
	if($nome == 0){
	echo "O Motorista Esta Inativo" ;	
}

mysqli_close($conexao);

?>