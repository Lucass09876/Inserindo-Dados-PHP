<?php
require 'banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);

        $stmt->execute();
        
        // Redireciona para index com mensagem de sucesso
        header('Location: index.php?msg=success_add');
        exit();
    } catch (PDOException $e) {
        $erro = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
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

        .cadastro-form {
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

        .erro {
            color: #dc3545;
            background-color: #f8d7da;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="cadastro-form">
        <h3>Cadastrar Usuário</h3>

        <?php if (isset($erro)): ?>
            <div class="erro"><?= $erro; ?></div>
        <?php endif; ?>

        <form action="add.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <div class="button-group">
                <button type="submit">Gravar</button>
                <a href="index.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>