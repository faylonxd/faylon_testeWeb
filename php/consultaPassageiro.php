
<html>
	<input type="button" value="Voltar Para Pagina Anterior" onclick="javascript:history.back()";/>
	<br><br>
 </html>

<?php

$idpassageiro1 = $_POST['idpassageiro'];
$nome1 = $_POST['nome'];
$data1 = $_POST['data'];
$cpf1 = $_POST['cpf'];
$sexo1 = $_POST['sexo'];


$conexao = mysqli_connect("localhost", "root", "","dbcorridas");
//criando a query de consulta à tabela criada
$sql = mysqli_query($conexao, "SELECT * FROM `tb_passageiro` 
WHERE id_passageiro like '%$idpassageiro1' 
AND nome_passageiro like '%$nome1%' 
AND nasc_passageiro like '%$data1%' 
AND cpf_passageiro like '%$cpf1%' 
AND sexo_passageiro like '%$sexo1' ORDER BY id_passageiro;") or die(
	mysqli_error($conexao) //caso haja um erro na consulta
);
 
if($sql->num_rows != 0){ 
//pecorrendo os registros da consulta.
	while($aux = mysqli_fetch_assoc($sql))
	{	
	echo "<br />";
	echo "ID passageiro:".$aux["id_passageiro"]."   ";
	echo "Nome passageiro:".$aux["nome_passageiro"]."    ";
	echo "Nascimento:".$aux["nasc_passageiro"]."    ";
	echo "CPF:".$aux["cpf_passageiro"]."    ";
		if($aux["sexo_passageiro"]=="M"){
			echo "Sexo: Masculino    ";
		}else{
			echo "Sexo: Feminino    ";
		}
		
	}
	
}else{
	echo "Nenhum Registro Foi Encontrado!";
	}
	
?>