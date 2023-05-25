<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Orçamento</title>
</head>
<body>
	<h2>Formulário de Orçamento</h2>
	<form action="orcamento_criar_processa.php" method="post">

        <input type="hidden" name="orc_id_ordem" value="<?php echo $_GET['ordem_id']; ?>">

		<label for="orcamento">Orçamento:</label>
		<input type="text" id="orcamento" name="orcamento"><br>

		<label for="valor">Valor:</label>
		<input type="text" id="valor" name="valor"><br>

		<label for="garantia">Garantia:</label>
		<input type="text" id="garantia" name="garantia"><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>
