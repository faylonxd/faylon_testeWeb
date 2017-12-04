
<html>
	<input type="button" value="Voltar Para Pagina Anterior" onclick="javascript:history.back()";/>
	<br><br>
 </html>

<?php

$idmotorista1 = $_POST['idmotorista'];
$nome1 = $_POST['nome'];
$data1 = $_POST['data'];
$cpf1 = $_POST['cpf'];
$sexo1 = $_POST['sexo'];
$modelo1 = $_POST['modelo'];
$ativo1 = $_POST['ativo'];


$conexao = mysqli_connect("localhost", "root", "","dbcorridas");
//criando a query de consulta à tabela criada
$sql = mysqli_query($conexao, "SELECT * FROM `tb_motorista` 
WHERE id_motorista like '%$idmotorista1' 
AND nome_motorista like '%$nome1%' 
AND nasc_motorista like '%$data1%' 
AND cpf_motorista like '%$cpf1%' 
AND sexo_motorista like '%$sexo1' 
AND modelo_carro like '%$modelo1%' 
and status_motorista like '%$ativo1' ORDER BY id_motorista;") or die(
	mysqli_error($conexao) //caso haja um erro na consulta
);
 
if($sql->num_rows != 0){ 
//pecorrendo os registros da consulta.
	while($aux = mysqli_fetch_assoc($sql))
	{	
	echo "<br />";
	echo "ID Motorista:".$aux["id_motorista"]."   ";
	echo "Nome Motorista:".$aux["nome_motorista"]."    ";
	echo "Nascimento:".$aux["nasc_motorista"]."    ";
		if($aux["sexo_motorista"]=="M"){
			echo "Sexo: Masculino    ";
		}else{
			echo "Sexo: Feminino    ";
		}
		echo "Modelo do Carro:".$aux["modelo_carro"]."    ";
		if($aux["status_motorista"]==1){
			echo "Status: Ativo    ";	
		} else{
			echo "Status: Inativo    ";	
		}
	}
	
}else{
	echo "Nenhum Registro Foi Encontrado!";
	}
	
?>