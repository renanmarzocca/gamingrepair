<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = text/css href="css/style_login.css">

    <title>Gaming Repair | Login</title>
</head>
<body>
<body>
<form action="login_processa.php" method="post">
    <section id="login">
    <!--<img src="images/logo.png" class="logo"> -->
    <div class="box">
        <div class="form">
            <h2>Login</h2>
            <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

            <div class="inputBox">
                <input type="text" name=uname required="required">
                <span>Usuario</span> 
                <i></i>
            </div>

            <div class="inputBox">
                <label>Password</label>
                <input type="password" name="password" required="required">
                <span>Senha</span>
                <i></i>
            </div>
            
            <input type="submit" value="Entrar" >
        </div>
    </div>
    </section>
    </form>
</body>
</html>