<?php

declare(strict_types=1);

$pdo = new PDO('mysql:host=db;dbname=lab', 'user', 'secret');

echo "🚀 Connected to MySQL! PHP version: " . PHP_VERSION;