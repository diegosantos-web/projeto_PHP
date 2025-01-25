<?php

// Pegando os dados vindos do formulario

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$creci = $_POST['creci'];

// Configurações  de Credenciais 
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'corretor';

// Conexão com nosso banco de dados 
$conn = new mysqli($server, $usuario, $senha, $banco);

// Verificar conexão
if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}

$smtp = $conn->prepare("INSERT INTO corretor (nome, cpf, creci) VALUES(?,?,?)");
$smtp->bind_param("sss", $nome, $cpf, $creci);


if($smtp->execute()){
    echo "Mensagem enviada com sucesso!";
}
else{
    echo "Erro no envio da mensagem: ".$smtp->error;
}
$smtp->close();
$conn->close();
?>

<a href="./index.html">Voltar para o formulario</a>



