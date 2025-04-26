<?php
session_start();
require_once 'register_login/db.php';
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}
$data = json_decode(file_get_contents('php://input'), true);
try {
    $conn->begin_transaction();
    $stmt = $conn->prepare("INSERT INTO orders (user_id, patient_name, age, phone, place, total_amount) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssd", 
        $_SESSION['user_id'],
        $data['patientName'],
        $data['age'],
        $data['phone'],
        $data['place'],
        $data['total']
    );
    $stmt->execute();
    $orderId = $conn->insert_id;
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, medicine_id, quantity, price) 
                           VALUES (?, ?, ?, ?)");
    foreach ($data['items'] as $item) {
        $stmt->bind_param("iiid", $orderId, $item['id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }
    $conn->commit();
    echo json_encode(['success' => true, 'orderId' => $orderId]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}