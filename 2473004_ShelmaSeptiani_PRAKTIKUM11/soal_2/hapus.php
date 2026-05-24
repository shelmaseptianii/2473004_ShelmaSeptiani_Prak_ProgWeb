<?php
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        try {
            $id = trim($_GET['id'] ?? "");

            $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
            $stmt->execute([
                "id" => $id
            ]);
            
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
?>