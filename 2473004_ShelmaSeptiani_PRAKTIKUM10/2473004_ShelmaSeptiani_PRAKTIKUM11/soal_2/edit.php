<?php
require_once 'connection.php';

$id = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = trim($_GET['id'] ?? "");

        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([
            "id" => $id
        ]);

        $user = $stmt->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = trim($_POST['id'] ?? '');
        $name = trim($_POST['nama'] ?? '');
        $kelas = trim($_POST['kelas'] ?? '');

        $stmt = $pdo->prepare('UPDATE users SET name = :nama, kelas = :kelas WHERE id = :id');
        $stmt->execute([
            "id" => $id,
            "nama" => $name,
            "kelas" => $kelas
        ]);

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
} else {
    $error_message = 'Semua kolom wajib diisi';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2473004 - Shelma Septiani</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            width: 90%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            color: #333;
            outline: none;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
        }

        .error {
            color: #f44336;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .btn {
            display: inline-block;
            width: auto;
            padding: 10px 24px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            transition: background 0.2s;
            text-align: center;
        }

        .btn-simpan {
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }

        .btn-simpan:hover {
            background-color: #45a049;
        }

        .btn-kembali {
            background-color: #2196F3;
            color: white;
            display: block;
            width: fit-content;
        }

        .btn-kembali:hover {
            background-color: #0b7dda;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Data Siswa</h2>

        <?php if (isset($error_message)): ?>
            <p class="error"><?= $error_message; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="hidden" name="id" id="id" value="<?= $user['id'] ?? '' ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required autocomplete="off" value="<?= $user['name'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" id="kelas" name="kelas" required autocomplete="off" value="<?= $user['kelas'] ?? '' ?>">
            </div>

            <button type="submit" class="btn btn-simpan">Update Data</button>
        </form>

        <a href="index.php" class="btn btn-kembali">Kembali</a>
    </div>

</body>

</html>