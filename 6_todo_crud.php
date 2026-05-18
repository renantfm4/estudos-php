<?php 

$env = parse_ini_file('.env');

$host = $env['DB_HOST'];
$usuario = $env['DB_USER'];
$senha = $env['DB_PASS'];
$banco = $env['DB_NAME'];

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// criação da tarefa
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["descricao"])) {
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $sqlInsert = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";

    if ($conn->query($sqlInsert) === TRUE) {
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao adicionar tarefa: " . $conn->error;
    }
}

// exclusão de uma tarefa
if (isset($_GET["excluir"])) {
    $id = intval($_GET["excluir"]);
    $sqlDelete = "DELETE FROM tarefas WHERE id = $id";

    if ($conn->query($sqlDelete) === TRUE) {
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao excluir tarefa: " . $conn->error;
    }
}

// excluir todas as tarefas
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["excluir_todas"])) {
    $sqlDeleteAll = "DELETE FROM tarefas";

    if ($conn->query($sqlDeleteAll) === TRUE) {
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao excluir todas as tarefas: " . $conn->error;
    }
}

$tarefas = [];

// resgate das tarefas
$sqlSelect = "SELECT * FROM tarefas ORDER BY data_criacao DESC";

$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tarefas[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>

    <form action="6_todo_crud.php" method="POST">
        <input type="text" placeholder="Descrição da Tarefa" name="descricao" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Suas tarefas</h2>

    <?php if (!empty($tarefas)): ?>

        <form action="6_todo_crud.php" method="POST">
            <input type="hidden" name="excluir_todas" value="1">
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir todas as tarefas?')">
                Excluir todas
            </button>
        </form>

        <ul>
            <?php foreach ($tarefas as $tarefa): ?>
                <li>
                    <?php echo $tarefa["descricao"]; ?> -
                    <a href="6_todo_crud.php?excluir=<?php echo $tarefa["id"]; ?>">
                        Excluir
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else: ?>
        <p>Você não tem tarefas cadastradas.</p>
    <?php endif; ?>

</body>
</html>