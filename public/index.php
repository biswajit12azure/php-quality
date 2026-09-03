<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator;

$calculator = new Calculator();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

header('Content-Type: application/json');

if ($uri === '/') {
    echo json_encode([
        'message' => 'PHP Quality Training API is running',
    ]);

    exit;
}

if ($uri === '/health') {
    echo json_encode([
        'status' => 'UP',
    ]);

    exit;
}

if ($uri === '/add') {
    $a = isset($_GET['a']) ? (int) $_GET['a'] : 0;
    $b = isset($_GET['b']) ? (int) $_GET['b'] : 0;

    echo json_encode([
        'result' => $calculator->add($a, $b),
    ]);

    exit;
}

http_response_code(404);

echo json_encode([
    'error' => 'Route not found',
]);