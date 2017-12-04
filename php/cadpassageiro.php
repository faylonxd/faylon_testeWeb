<?php
// Fetching Values From URL
$nome2 = $_POST['nome1'];
$data2 = $_POST['data1'];
$cpf2 = $_POST['cpf1'];
$sexo2 = $_POST['sexo1'];


  $conexao = mysqli_connect("localhost", "root", "", "dbcorridas");
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

$querycpf = mysqli_query($conexao,"SELECT * FROM tb_passageiro WHERE  cpf_passageiro = '$cpf2'");

if($querycpf->num_rows != 0){
	echo "CPF já existente em nosso Sistema!";
}
else{
	$query = "INSERT INTO `tb_passageiro` (`id_passageiro`, `nome_passageiro`, `nasc_passageiro`, `cpf_passageiro`, `sexo_passageiro`) VALUES (NULL, '$nome2', '$data2', '$cpf2', '$sexo2')";
	mysqli_query($conexao,$query); //Insert Query
	echo "Passageiro Cadastrado Com Sucesso!!";
}
  
mysqli_close($conexao); // Connection Closed
?>