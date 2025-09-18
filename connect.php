<?php

$config = require __DIR__ . "/config.php";
//Database configuration
$host = $config["host"];
$dbname = $config["db"];
$username = $config["user"];
$password = $config["password"];

try {
    //Create PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //Set error mode (exceptions for errors)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
