<?php 

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ordem</title>
</head>
<body>
    <form action="processa_form.php" method="post">
		<label for="equipamento">Equipamento:</label>
		<input type="text" id="equipamento" name="equipamento"><br>

		<label for="defeito">Defeito:</label>
		<input type="text" id="defeito" name="defeito"><br>

		<label for="acessorios">Acessórios:</label>
		<input type="text" id="acessorios" name="acessorios"><br>

		<input type="submit" value="Salvar">
        <a href="home.php">Cancelar</a>
	</form>
</body>
</html>

<?php 
          /* Chamada Logout */
}else{

     header("Location: index.php");

     exit();

}

 ?>