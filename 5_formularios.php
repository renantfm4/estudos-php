<?php 

    if(isset($_GET['nome']) && isset($_GET['idade'])) {
        $nome = htmlspecialchars($_GET['nome']); // segurança para evitar ataques de injeção de código
        $idade = htmlspecialchars($_GET['idade']); 
        echo "Olá, seja bem-vindo $nome, você tem $idade anos. <br><br>";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu formulário</title>
</head>
<body>

    <h2>Exemplo de Form</h2>

    <form action="5_formularios.php" method="GET">
        <label for="nome">Seu nome:</label>
        <input type="text" id="nome" name="nome">
        <br><br>
        <label for="idade">Sua idade:</label>
        <input type="text" id="idade" name="idade">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    
</body>
</html>