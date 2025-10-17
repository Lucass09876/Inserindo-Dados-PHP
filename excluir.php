<?php
require 'banco.php';

// Verifica se o ID foi passado via GET
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $id = filter_input(INPUT_GET, 'delete_id', FILTER_SANITIZE_NUMBER_INT);

    $sql_delete = "DELETE FROM usuarios WHERE id = ?";

    try {
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->bindValue(1, $id, PDO::PARAM_INT);
        $stmt_delete->execute();

        // Redireciona para a página inicial com mensagem de sucesso
        header('Location: index.php?msg=success_delete');
        exit();

    } catch (PDOException $e) {
        // Redireciona para a página inicial com mensagem de erro
        header('Location: index.php?msg=error_delete&error=' . urlencode($e->getMessage()));
        exit();
    }

} else {
    // Se não houver ID válido, redireciona para a página inicial
    header('Location: index.php');
    exit();
}
?>