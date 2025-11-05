<?php

declare(strict_types=1);

$pdo = new PDO('mysql:host=db;dbname=lab', 'user', 'secret');
// $pdo = new PDO('sqlite:' . __DIR__ . '/database.sqlite');

echo "🚀 Connected to MySQL! PHP version: " . PHP_VERSION;