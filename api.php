<?php

require_once 'src/GameController.php';

$controller = new GameController();

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if ($action === 'play') {

    $move = $_POST['move'] ?? '';

    echo json_encode(
        $controller->play($move)
    );
} elseif ($action === 'score') {

    echo json_encode(
        $controller->score()
    );
} elseif ($action === 'reset') {

    echo json_encode(
        $controller->reset()
    );
}
