<?php

session_start();
header('Content-Type: application/json');
include '../../connection/db_connection_file.php';

$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = '';
$error = '';



if (isset($_SESSION['user'])) {
    $id = $_SESSION['user'];

    $sql = "SELECT * FROM tasks WHERE user_id=$id";

    $query = $conn->query($sql);
    if (!function_exists('mysqli_fetch_all')) {
        function mysqli_fetch_all(mysqli_result $query) {
            $rows = [];
            while ($row = mysqli_fetch_assoc($query)) {
                $rows[] = $row;
            }

            return $rows;
        }
    }
    if ($query->num_rows > 0) {
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        echo ' 0 rows';
    }

}

echo json_encode(
    ["data" => $result, "error" => $error]
);
