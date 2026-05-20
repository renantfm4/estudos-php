<?php 

// Carrega as variáveis de ambiente do arquivo .env
$env = parse_ini_file('.env');

// Configurações do banco de dados
$host = $env['DB_HOST'];
$usuario = $env['DB_USER'];
$senha = $env['DB_PASS'];
$banco = $env['DB_NAME'];

$conn = new mysqli($host, $usuario, $senha, $banco); // Conexão com o banco de dados

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editar_id"])) {
    $id = intval($_POST["editar_id"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);

    $sqlUpdate = "UPDATE tarefas SET descricao = '$descricao' WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao editar tarefa: " . $conn->error;
    }
}

// criação da tarefa
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["descricao"])) { // Verifica se o formulário foi submetido e se a descrição da tarefa foi fornecida
    $descricao = $conn->real_escape_string($_POST["descricao"]); // Escapa caracteres especiais para evitar SQL Injection
    $sqlInsert = "INSERT INTO tarefas (descricao) VALUES ('$descricao')"; // SQL para inserir a nova tarefa no banco de dados

    // Executa a query e redireciona para a página principal para evitar reenvio do formulário
    if ($conn->query($sqlInsert) === TRUE) {
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao adicionar tarefa: " . $conn->error;
    }
}

// exclusão de uma tarefa
if (isset($_GET["excluir"])) { // Verifica se o parâmetro de exclusão foi fornecido na URL
    $id = intval($_GET["excluir"]); // Converte o ID para um inteiro para evitar SQL Injection
    $sqlDelete = "DELETE FROM tarefas WHERE id = $id"; // SQL para excluir a tarefa com o ID especificado

    if ($conn->query($sqlDelete) === TRUE) {
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao excluir tarefa: " . $conn->error;
    }
}

// excluir todas as tarefas
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["excluir_todas"])) { // Verifica se o formulário de exclusão de todas as tarefas foi submetido
    $sqlDeleteAll = "DELETE FROM tarefas"; // SQL para excluir todas as tarefas do banco de dados

    if ($conn->query($sqlDeleteAll) === TRUE) { // Executa a query e redireciona para a página principal para evitar reenvio do formulário
        header("Location: 6_todo_crud.php");
        exit();
    } else {
        echo "Erro ao excluir todas as tarefas: " . $conn->error;
    }
}

$tarefas = []; 

$tarefaEditando = null; // edição de uma tarefa

if (isset($_GET["editar"])) {
    $id = intval($_GET["editar"]);

    $sqlEdit = "SELECT * FROM tarefas WHERE id = $id";
    $resultEdit = $conn->query($sqlEdit);

    if ($resultEdit->num_rows > 0) {
        $tarefaEditando = $resultEdit->fetch_assoc();
    }
}

// resgate das tarefas
$sqlSelect = "SELECT * FROM tarefas ORDER BY data_criacao DESC"; // SQL para selecionar todas as tarefas do banco de dados, ordenando pela data de criação em ordem decrescente

// Executa a query e armazena os resultados em um array
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) { // Verifica se há tarefas retornadas pela query
    while ($row = $result->fetch_assoc()) { // Itera sobre cada tarefa retornada e adiciona ao array de tarefas
        $tarefas[] = $row; // Adiciona a tarefa atual ao array de tarefas
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
        <input 
            type="text" 
            placeholder="Descrição da Tarefa" 
            name="descricao" 
            required
            value="<?php echo $tarefaEditando ? $tarefaEditando["descricao"] : ""; ?>"
        >

        <?php if ($tarefaEditando): ?>
            <input type="hidden" name="editar_id" value="<?php echo $tarefaEditando["id"]; ?>">
            <button type="submit">Salvar edição</button>
            <a href="6_todo_crud.php">Cancelar</a>
        <?php else: ?>
            <button type="submit">Adicionar</button>
        <?php endif; ?>
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
                    </a> - 
                    <a href="6_todo_crud.php?editar=<?php echo $tarefa["id"]; ?>">
                        Editar
                    </a>
                    
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else: ?>
        <p>Você não tem tarefas cadastradas.</p>
    <?php endif; ?>

</body>
</html>