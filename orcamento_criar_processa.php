<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores dos campos do formulário
    $texto_orc = $_POST['orcamento'];
    $valor = $_POST['valor'];
    $garantia = $_POST['garantia'];
    $orc_id_ordem = $_POST['orc_id_ordem'];

    // Validação dos campos (opcional - você pode adicionar suas próprias validações aqui)

    // Conexão com o banco de dados (substitua pelas suas próprias informações)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "database_gaming";

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Insere os dados na tabela orcamento
    $sql = "INSERT INTO orcamento (texto_orc, valor, garantia, orc_id_ordem) 
            VALUES ('$texto_orc', '$valor', '$garantia', '$orc_id_ordem')";
    if (mysqli_query($conn, $sql)) {
        echo "Orçamento salvo com sucesso.";
    } else {
        echo "Erro ao salvar o orçamento: " . mysqli_error($conn);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
}
?>
