<?php
// Título da página
$pageTitle = "Lista de Usuários";

// --- Configurações do Banco de Dados ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_aula";

// --- Conexão com o Banco de Dados ---
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão falhou
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// --- Exibe mensagens de sucesso ou erro ---
$mensagem = "";
if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 'success_add':
            $mensagem = "<p style='color:green; text-align:center;'>✓ Usuário cadastrado com sucesso!</p>";
            break;
        case 'success_update':
            $mensagem = "<p style='color:green; text-align:center;'>✓ Usuário atualizado com sucesso!</p>";
            break;
        case 'error_update':
            $mensagem = "<p style='color:red; text-align:center;'>✗ Erro ao atualizar usuário.</p>";
            break;
        case 'error_not_found':
            $mensagem = "<p style='color:red; text-align:center;'>✗ Usuário não encontrado.</p>";
            break;
        case 'success_delete':
            $mensagem = "<p style='color:green; text-align:center;'>✓ Usuário excluído com sucesso!</p>";
            break;
        case 'error_delete':
            $mensagem = "<p style='color:red; text-align:center;'>✗ Erro ao excluir usuário.</p>";
            break;
    }
}

// --- Consulta SQL ---
$sql = "SELECT id, nome, email FROM usuarios ORDER BY id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #000;
            margin-bottom: 30px;
        }

        .btn-cadastro {
            display: inline-block;
            padding: 0;
            margin-bottom: 30px;
            background: none;
            border: none;
            font-size: 1.1rem;
            font-weight: 600;
            color: #4CAF50;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.2s;
        }

        .btn-cadastro:hover {
            color: #45a049;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #f8f9fa;
        }

        th {
            text-align: left;
            padding: 15px 20px;
            font-weight: 600;
            color: #000;
            border-bottom: 2px solid #e0e0e0;
        }

        td {
            padding: 15px 20px;
            border-bottom: 1px solid #e0e0e0;
            color: #333;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .btn-action {
            background: none;
            border: none;
            padding: 0;
            margin-right: 15px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .btn-delete {
            color: #dc3545;
        }

        .btn-edit {
            color: #4CAF50;
        }

        .btn-action:hover {
            opacity: 0.7;
            text-decoration: underline;
        }

        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $pageTitle; ?></h1>

        <!-- Mensagens de feedback -->
        <?php echo $mensagem; ?>

        <!-- Link de Cadastro -->
        <a href="add.php" class="btn-cadastro">Cadastro</a>

        <?php
        // --- Exibição dos Dados ---
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead><tr><th>Id</th><th>Nome</th><th>E-mail</th><th>Ação</th></tr></thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>";
                echo "<a href='excluir.php?delete_id=" . $row["id"] . "' class='btn-action btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Deletar</a>";
                echo "<a href='editar.php?edit_id=" . $row["id"] . "' class='btn-action btn-edit'>Editar</a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='no-results'>Nenhum usuário cadastrado.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>