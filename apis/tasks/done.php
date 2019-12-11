<?php

session_start();
header('Content-Type: application/json');
include '../../connection/db_connection_file.php';
$conn = OpenCon();
$data = '';
$error = '';
$done = $_GET['done'] == 'true' ? 1 : 0;
$id = $_GET['id'];
$sql = "UPDATE  tasks set done= $done, updated_date = NOW() WHERE id=$id";

$query = $conn->query($sql);
if ($query === TRUE) {
    $data = "success";
} else {
    http_response_code(400);
    $error = "error";
}

echo json_encode(
        ["data" => $data, "error" => $error]
);
