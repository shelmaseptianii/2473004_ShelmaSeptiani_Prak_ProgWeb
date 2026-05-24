<?php
    $host     = 'localhost';
    $db       = 'datasiswa';
    $user     = 'root';
    $password = '123'; 
    $charset  = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
        PDO::ATTR_EMULATE_PREPARES   => false,                  
    ];

    try {
        $pdo = new PDO($dsn, $user, $password, $options);
        echo "Connected successfully to the database!";
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2473004-Shelma Septiani</title>
</head>

<body>

</body>

</html>