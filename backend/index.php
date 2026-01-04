<?php
header("Access-Control-Allow-Origin: http://form.local");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

include 'conexao.php';

if (!isset($_POST['nome'], $_POST['email'], $_POST['comentario'])) {
    http_response_code(400);
    echo json_encode(["error" => "Dados incompletos"]);
    exit;
}

$id = random_int(1, 999999);
$nome = $_POST['nome'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

$stmt = $link->prepare("INSERT INTO mensagens (id, nome, email, comentario) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $id, $nome, $email, $comentario);

if ($stmt->execute()) {
    echo json_encode(["status" => "ok"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => $stmt->error]);
}

$stmt->close();
$link->close();
