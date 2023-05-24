<?php

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

// Dados de conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "database_gaming";

// Conexão com o banco de dados
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Obtém os valores dos campos do formulário
$equipamento = $_POST['equipamento'];
$defeito = $_POST['defeito'];
$acessorios = $_POST['acessorios'];
$user_id = $_SESSION['user_id'];

// Prepara a consulta SQL para inserir os dados na tabela "ordem"
$sql = "INSERT INTO ordem (equipamento, defeito, acessorios, user_id_ordem, name_ordem, end_ordem, tel_ordem) 
        SELECT '$equipamento', '$defeito', '$acessorios', users.user_id, users.name, users.end, users.tel
        FROM users 
        WHERE users.user_id = '$user_id'";

// Executa a consulta SQL
if (mysqli_query($conn, $sql)) {
    
    header("Location: home.php");
    
} else {
    echo "Erro ao inserir os dados: " . mysqli_error($conn);
}
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>

