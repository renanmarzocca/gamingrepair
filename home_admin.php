<?php 

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type=text/css href="css/style_home3.css">
    <title>GAME FIX | Home</title>
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

            <!-- MENU CARDS -->

            <div class="container">
                <div class="card">
                    <div class="lines"></div>
                    <div class="imgBx">
                        <img src="images/create.png">
                    </div>
                    <div class="content">
                        <div class="details">
                        <h2>Criar Ordem</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, quibusdam!</p>
                        <a href="ordem.php">Criar</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="lines"></div>
                    <div class="imgBx">
                        <img src="images/status.png">
                    </div>
                    <div class="content">
                        <div class="details">
                        <h2>Status da Ordem</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, quibusdam!</p>
                        <a href="listar_ordem.php">Listar</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="lines"></div>
                    <div class="imgBx">
                        <img src="images/visu.png">
                    </div>
                    <div class="content">
                        <div class="details">
                        <h2>Criar Orçamento</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, quibusdam!</p>
                        <a href="listar_ordem.php">Criar</a>
                        </div>
                    </div>
                </div>
                
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