<?php

$motorista2 = $_POST['idmotorista1'];
$cpfmotorista2 = $_POST['cpfmotorista1'];


$conexao = mysqli_connect("localhost", "root", "", "dbcorridas");
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

$aux = mysqli_query($conexao,"SELECT * FROM tb_motorista WHERE  id_motorista = '$motorista2' OR cpf_motorista = '$cpfmotorista2'");

if($aux->num_rows == 0){
	echo "Nenhum Motorista foi Encontrado";
} else if($aux->num_rows != 0){
	while($aux2 = mysqli_fetch_assoc($aux))
	{
		if($aux2["status_motorista"]==0){
		$aux2 = mysqli_query($conexao,"UPDATE `tb_motorista` SET `status_motorista` = '1' WHERE `tb_motorista`.`id_motorista` = '$motorista2' OR`tb_motorista`.`cpf_motorista` = '$cpfmotorista2'");	
		echo "Motorista Retornou as Atividades!";
		} else {
		$aux2 = mysqli_query($conexao,"UPDATE `tb_motorista` SET `status_motorista` = '0' WHERE `tb_motorista`.`id_motorista` = '$motorista2' OR`tb_motorista`.`cpf_motorista` = '$cpfmotorista2'");	
		echo "Motorista Entrou de Ferias";	
		}
	}
}

mysqli_close($conexao);

?>	