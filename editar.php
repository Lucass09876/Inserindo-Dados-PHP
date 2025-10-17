<?php
require 'banco.php';

$usuario = null;

// Lógica para buscar os dados do usuário e preencher o formulário
if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
    $id = filter_input(INPUT_GET, 'edit_id', FILTER_SANITIZE_NUMBER_INT);
    
    $sql_select = "SELECT id, nome, email FROM usuarios WHERE id = ?";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindValue(1, $id, PDO::PARAM_INT);
    $stmt_select->execute();
    
    $usuario = $stmt_select->fetch(PDO::FETCH_ASSOC);

    // Se o usuário não for encontrado, redireciona para a página inicial
    if (!$usuario) {
        header('Location: index.php?msg=error_not_found');
        exit();
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Lógica para processar a alteração no banco de dados
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $sql_update = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";

    try {
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->bindValue(1, $nome);
        $stmt_update->bindValue(2, $email);
        $stmt_update->bindValue(3, $id, PDO::PARAM_INT);
        $stmt_update->execute();

        // Redireciona de volta para a página principal após o sucesso
        header('Location: index.php?msg=success_update');
        exit();

    } catch (PDOException $e) {
        header('Location: index.php?msg=error_update&error=' . urlencode($e->getMessage()));
        exit();
    }

} else {
    // Se não for GET ou POST válido, redireciona para a página inicial
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
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

        .edit-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #000;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        button, .btn-cancelar {
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 500;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-block;
        }

        button[type="submit"] {
            background-color: white;
            color: #333;
            border: 1px solid #ddd;
        }

        button[type="submit"]:hover {
            background-color: #f8f9fa;
            border-color: #999;
        }

        .btn-cancelar {
            background-color: white;
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-cancelar:hover {
            background-color: #f8f9fa;
            border-color: #999;
        }
    </style>
</head>
<body>
    <?php if ($usuario): ?>
    <div class="edit-form">
        <h3>Editar Usuário: <?= htmlspecialchars($usuario['nome']); ?></h3>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?= $usuario['id']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']); ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']); ?>" required>

            <div class="button-group">
                <button type="submit">Salvar Alterações</button>
                <a href="index.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>