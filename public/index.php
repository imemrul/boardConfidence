<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use PDO;

$uri = $_SERVER['REQUEST_URI'];

if (!file_exists('config/db.local.php')) {
  printf("Error: no configuration file for database");
  exit(1);
}

$db = require 'config/db.local.php';

try {
    $pdo = new PDO(
        "mysql:host=" . $db['host'] . ";dbname=" . $db['database'],
        $db['user'],
        $db['password'],
        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
    );
} catch (PDOException $e) {
    throw new PDOException("Error DB connection");
}

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);


switch ($uri) {
    case '/' :
        $quiz = new BoardConfidence\Model\Quiz($pdo);
        $action = new BoardConfidence\Action\Home($quiz);
        break;
    case '/add-ques':
        break;
    case '/result':
        break;
    default:
        // 404 File not found
        header("HTTP/1.0 404 Not Found");
        exit();
}

// Execute the action
$action();
