<?php
session_start();
require_once 'register_login/db.php';
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}
$query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}
echo json_encode($orders);