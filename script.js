function cadPassageiro() {
var nome = document.getElementById("nome").value;
var data = document.getElementById("data").value;
var cpf = document.getElementById("cpf").value;
var sexo = document.getElementById("sexo").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'nome1=' + nome + '&data1=' + data + '&cpf1=' + cpf + '&sexo1=' + sexo;
if (nome == '' || data == '' || cpf == '' || sexo == '') {
alert("Preencha Todos os Campos");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "php/cadpassageiro.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}

function cadMotorista() {
	
var nome = document.getElementById("nome").value;
var data = document.getElementById("data").value;
var cpf = document.getElementById("cpf").value;
var sexo = document.getElementById("sexo").value;
var modelo = document.getElementById("modelo").value;
var ativo = document.getElementById("ativo").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'nome1=' + nome + '&data1=' + data + '&cpf1=' + cpf + '&sexo1=' + sexo + '&modelo1=' + modelo + '&ativo1=' + ativo;
if (nome == '' || data == '' || cpf == '' || sexo == '' || modelo == '' || ativo == '') {
alert("Preencha Todos os Campos");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "php/cadMotorista.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;


}


function cadCorrida() {
var motorista = document.getElementById("motorista").value;
var passageiro = document.getElementById("passageiro").value;
var cpfmotorista = document.getElementById("cpf1").value;
var cpfpassageiro = document.getElementById("cpf2").value;
var valor = document.getElementById("valor").value;

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'motorista1=' + motorista + '&passageiro1=' + passageiro+ '&cpfmotorista1=' + cpfmotorista + '&cpfpassageiro1=' + cpfpassageiro + '&valor1=' + valor;
if (motorista == '' && cpfmotorista == '' || passageiro == '' && cpfpassageiro == '' || valor == '') {
alert("Preencha Pelo Menos um campo do Motorista e Passageiro e o Valor");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "php/cadCorrida.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}



function feriasMotorista() {
var idmotorista = document.getElementById("idmotorista").value;
var cpfmotorista = document.getElementById("cpf").value;

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'idmotorista1=' + idmotorista + '&cpfmotorista1=' + cpfmotorista;
if (idmotorista == '' && cpfmotorista == '') {
alert("Preencha Pelo Menos um campo do Motorista");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "php/feriasMotorista.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}

return false;
}
