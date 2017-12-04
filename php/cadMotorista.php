<?php
// Fetching Values From URL
$nome2 = $_POST['nome1'];
$data2 = $_POST['data1'];
$cpf2 = $_POST['cpf1'];
$sexo2 = $_POST['sexo1'];
$modelo2 = $_POST['modelo1'];
$ativo2 = $_POST['ativo1'];

  $conexao = mysqli_connect("localhost", "root", "", "dbcorridas");
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

$querycpf = mysqli_query($conexao,"SELECT * FROM tb_motorista WHERE  cpf_motorista = '$cpf2'");

if($querycpf->num_rows != 0){
	echo "CPF já existente em nosso Sistema!";
}
else{
	$query = "INSERT INTO `tb_motorista` (`id_motorista`, `nome_motorista`, `nasc_motorista`, `cpf_motorista`, `Modelo_carro`, `status_motorista`, `sexo_motorista`)
	VALUES (NULL, '$nome2', '$data2', '$cpf2', '$modelo2', '$ativo2', '$sexo2')";
	mysqli_query($conexao,$query); //Insert Query
	echo "Motorista Cadastrado Com Sucesso!!";
}

mysqli_close($conexao); // Connection Closed
?>