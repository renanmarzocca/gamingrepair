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

$user_id_listar = $_SESSION['user_id'];

if ($_SESSION['tipo'] === 'cliente') {

    // Prepara a consulta SQL para obter as ordens
    $sql = "SELECT ordem.ordem_id, equipamento, defeito, acessorios, users.name AS usuario 
    FROM ordem 
    INNER JOIN users ON ordem.user_id_ordem = users.user_id
    WHERE ordem.user_id_ordem = $user_id_listar
    ORDER BY ordem.ordem_id DESC";
}

elseif ($_SESSION['tipo'] === 'admin') {

    // Prepara a consulta SQL para obter as ordens
    $sql = "SELECT ordem.ordem_id, equipamento, defeito, acessorios, users.name AS usuario 
    FROM ordem 
    INNER JOIN users ON ordem.user_id_ordem = users.user_id 
    ORDER BY ordem.ordem_id DESC";
}

// Executa a consulta SQL
$resultado = mysqli_query($conn, $sql);

if ($_SESSION['tipo'] === 'cliente') {

// Verifica se há resultados
if (mysqli_num_rows($resultado) > 0) {

    // Cria a tabela HTML para exibir as ordens
    echo "<table>";
    echo "<tr><th>ID</th><th>Equipamento</th><th>Defeito</th><th>Acessórios</th><th>Usuário</th><th>Orçamento</th></tr>";
    
    // Loop para exibir cada ordem na tabela
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row["ordem_id"] . "</td>";
        echo "<td>" . $row["equipamento"] . "</td>";
        echo "<td>" . $row["defeito"] . "</td>";
        echo "<td>" . $row["acessorios"] . "</td>";
        echo "<td>" . $row["usuario"] . "</td>";
        echo "<td><a href='orcamento.php?ordem_id=" . $row["ordem_id"] . "'>Status</a></td>";
        echo "</tr>";
    }
    
    // Fecha a tabela HTML
    echo "</table>";
} else {
    echo "Não há ordens para exibir.";
}
}

elseif ($_SESSION['tipo'] === 'admin') {

    // Verifica se há resultados
if (mysqli_num_rows($resultado) > 0) {

    // Cria a tabela HTML para exibir as ordens
    echo "<table>";
    echo "<tr><th>ID</th><th>Equipamento</th><th>Defeito</th><th>Acessórios</th><th>Usuário</th><th>Orçamento</th></tr>";
    
    // Loop para exibir cada ordem na tabela
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row["ordem_id"] . "</td>";
        echo "<td>" . $row["equipamento"] . "</td>";
        echo "<td>" . $row["defeito"] . "</td>";
        echo "<td>" . $row["acessorios"] . "</td>";
        echo "<td>" . $row["usuario"] . "</td>";
        echo "<td><a href='orcamento.php?ordem_id=" . $row["ordem_id"] . "'>Status</a></td>";
        echo "<td><a href='orcamento_criar.php?ordem_id=" . $row["ordem_id"] . "'>Criar</a></td>";
        echo "<td><a href='orcamento_criar.php?ordem_id=" . $row["ordem_id"] . "'>Excluir</a></td>";
        echo "</tr>";
    }
    
    // Fecha a tabela HTML
    echo "</table>";
} else {
    echo "Não há ordens para exibir.";
}

}


if ($_SESSION['tipo'] === 'cliente') {
?>
    <a href="home.php">Retornar</a>
<?php
} 

elseif ($_SESSION['tipo'] === 'admin') {
?>
    <a href="home_admin.php">Retornar</a>
<?php
}


}
// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
