<?php
    require __DIR__ . '/vendor/autoload.php';
    use Dotenv\Dotenv;

    // Загрузка файла .env
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
?>
