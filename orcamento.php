<?php 

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

 ?>

<?php

if (isset($_GET['ordem_id'])) {
    $ordem_id = $_GET['ordem_id'];

// Conexão com o banco de dados (substitua pelas suas próprias informações)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "database_gaming";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consulta SQL para obter os dados da tabela ordem
$sql = "SELECT * FROM ordem WHERE ordem_id = '$ordem_id'";
$resultado = mysqli_query($conn, $sql);

// Verifica se há registros retornados
if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Status do Orçamento</h2>";
    echo "<ul>";

    // Loop para exibir cada ordem na lista
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<li>";
        echo "ID: " . $row['ordem_id'] . "<br>";
        echo "Equipamento: " . $row['equipamento'] . "<br>";
        echo "Nome: " . $row['name_ordem'] . "<br>";
        echo "Endereço: " . $row['end_ordem'] . "<br>";
		echo "Telefone: " . $row['tel_ordem'] . "<br>";
        echo "</li>";
    }

    echo "</ul>";
} else {
    echo "Nenhuma ordem encontrada.";
}

// Consulta SQL para obter os dados da tabela orcamento
$sql = "SELECT * FROM orcamento WHERE orc_id_ordem = '$ordem_id'";
$resultado = mysqli_query($conn, $sql);

// Verifica se há registros retornados
if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Dados dos Orçamentos</h2>";
    echo "<table>";
    echo "<tr><th>ID do Orçamento</th><th>Texto do Orçamento</th><th>Valor</th><th>Garantia</th></tr>";

    // Itera sobre os registros e exibe os dados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['orc_id'] . "</td>";
        echo "<td>" . $row['texto_orc'] . "</td>";
        echo "<td>" . $row['valor'] . "</td>";
        echo "<td>" . $row['garantia'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Orçamento não foi realizado ainda.";
}








// Fecha a conexão com o banco de dados
mysqli_close($conn);
} else {
    echo "ID da ordem não especificado.";
}
?>


<?php 
          /* Chamada Logout */
}else{

     header("Location: index.php");

     exit();

}

 ?>