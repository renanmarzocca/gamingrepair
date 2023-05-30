<?php 

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type=text/css href="css/style_listar_ordem2.css">
    <title>GAME FIX | Listar Ordem</title>
</head>
    <body>
            <!-- BACKGROUND !-->
            <div class="hero">
               <!-- NAVEGAÇÃO !-->
               <nav>
                    <!--<img src="images/logo.png" class="logo"> -->
                    <h3>GAME FIX</h3>
                    <ul>
                         <li><a href="#">Inicio</a></li>
                         <li><a href="#">Chamados</a></li>
                         <li><a href="#duvida">Mensagens</a></li>
                    </ul>
                    <img src="images/user3.png" class="user-pic" onclick="toggleMenu()">
                    <!-- SUB MENU !-->
                    <div class="sub-menu-wrap" id="subMenu">
                         <div class="sub-menu">
                              <div class="user-info">
                                   <img src="images/user3.png">
                                   <h4><?php echo $_SESSION['name']; ?></h4>
                              </div>
                              <hr>
                              <!--<a href="#" class="sub-menu-link">
                                   <img src="images/profile.png">
                                   <p>Editar Perfil</p>
                                   <span>></span>
                              </a>-->
                              <a href="logout.php" class="sub-menu-link">
                              <img src="images/logout.png">
                                   <p>Logout</p>
                                   <span>></span>
                              </a>
                         </div>
                    </div>
               </nav>

<?php

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
   echo "<h1>LISTA DOS SEUS ORÇAMENTOS";
    echo "</h1>";
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
    echo "<h1>LISTA DE TODOS ORÇAMENTOS";
    echo "</h1>";
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

?>



<section>
  <!--for demo wrap
  <h1>Fixed Table header</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Code</th>
          <th>Company</th>
          <th>Price</th>
          <th>Change</th>
          <th>Change %</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
      </tbody>
    </table>
  </div>
</section> -->

  
                
            </div>


          <!-- Chamada Sub Menu -->
          <script>
               let subMenu = document.getElementById("subMenu");

               function toggleMenu(){
                    subMenu.classList.toggle("open-menu");
               }

          </script>

          <script>

               var scroll = new SmoothScroll('a[href*="#"]', {
               speed: 1000,
               speedAsDuration: true
               });
          </script>

    </body>
</html>

<?php 
          /* Chamada Logout */
}else{

     header("Location: index.php");

     exit();
}
?>