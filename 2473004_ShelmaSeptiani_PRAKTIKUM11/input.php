<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>2473004-Shelma Septiani</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            line-height: 1.6;
        }
        .success-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .success-msg {
            font-size: 24px;
            font-weight: bold;
        }
        .highlight-blue {
            color: #0000ff;
            font-size: 28px;
        }
        .error-msg {
            font-size: 22px;
            font-weight: bold;
            color: #ff0000;
        }
        .username-error {
            color: #ff0000;
        }
        .back-link {
            margin-top: 5px;
            display: block;
        }
        .back-link a {
            color: #4b0082;
            font-size: 22px;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
if ($username === 'admin' && $password === 'admin') {
    echo '<div class="success-title">Login berhasil!</div>';
    echo '<div class="success-msg">Selamat datang, <span class="highlight-blue">' . htmlspecialchars($username) . '</span>.</div>';
} else {
    echo '<div class="error-msg">Username : <span class="username-error">' . htmlspecialchars($username) . '</span> Tidak Terdaftar!</div>';
}
?>

    <div class="back-link">
        <a href="soal_1.html">kembali ke halaman login</a>
    </div>

</body>
</html>