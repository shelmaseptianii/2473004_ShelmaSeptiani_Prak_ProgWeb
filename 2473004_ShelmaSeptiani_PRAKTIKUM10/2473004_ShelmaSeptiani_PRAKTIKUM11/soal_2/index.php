<?php
    require_once 'connection.php';

    try {
        $stmt = $pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = $stmt->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
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
            max-width: 700px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .btn-tambah {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            margin-bottom: 20px;
            transition: background 0.2s;
        }

        .btn-tambah:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            text-align: left;
            padding: 12px;
            font-weight: 600;
            border-bottom: 2px solid #e0e0e0;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #eeeeee;
            color: #444;
        }

        /* Fixed widths matching the layout */
        th:nth-child(1),
        td:nth-child(1) {
            width: 10%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 45%;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 15%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 30%;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-action {
            padding: 6px 18px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
            min-width: 60px;
            display: inline-block;
        }

        .btn-edit {
            background-color: #2196F3;
        }

        .btn-edit:hover {
            background-color: #0b7dda;
        }

        .btn-hapus {
            background-color: #f44336;
        }

        .btn-hapus:hover {
            background-color: #da190b;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Data Siswa</h2>

        <a href="tambah.php" class="btn-tambah">Tambah Data</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['kelas']); ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="edit.php?id=<?= $user['id']; ?>" class="btn-action btn-edit">Edit</a>
                                <a href="hapus.php?id=<?= $user['id']; ?>" class="btn-action btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>