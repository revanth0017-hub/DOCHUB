<?php
session_start();
require_once 'register_login/db.php';
if (!isset($_SESSION['user_id']) || !isset($_GET['order_id'])) {
    exit('Access denied');
}
$orderId = $_GET['order_id'];
$query = "SELECT o.*, oi.*, m.name as medicine_name 
          FROM orders o 
          JOIN order_items oi ON o.id = oi.order_id 
          JOIN medicines m ON oi.medicine_id = m.id 
          WHERE o.id = ? AND o.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $orderId, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    exit('Order not found');
}
$orderItems = [];
$orderDetails = null;
while ($row = $result->fetch_assoc()) {
    if (!$orderDetails) {
        $orderDetails = [
            'id' => $row['id'],
            'patient_name' => $row['patient_name'],
            'age' => $row['age'],
            'phone' => $row['phone'],
            'place' => $row['place'],
            'order_date' => $row['order_date'],
            'total_amount' => $row['total_amount']
        ];
    }
    $orderItems[] = [
        'medicine_name' => $row['medicine_name'],
        'quantity' => $row['quantity'],
        'price' => $row['price']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocHub - Order Receipt #<?php echo $orderId; ?></title>
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4>DocHub Pharmacy</h4>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-primary no-print" onclick="window.print()">
                            Print Receipt
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-6">
                        <h6>Order Details:</h6>
                        <p>Order ID: #<?php echo $orderId; ?><br>
                        Date: <?php echo date('d/m/Y', strtotime($orderDetails['order_date'])); ?></p>
                    </div>
                    <div class="col-6">
                        <h6>Patient Details:</h6>
                        <p>Name: <?php echo htmlspecialchars($orderDetails['patient_name']); ?><br>
                        Age: <?php echo $orderDetails['age']; ?><br>
                        Phone: <?php echo htmlspecialchars($orderDetails['phone']); ?><br>
                        Place: <?php echo htmlspecialchars($orderDetails['place']); ?></p>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Medicine</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderItems as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['medicine_name']); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>₹<?php echo number_format($item['price'], 2); ?></td>
                            <td>₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total Amount:</th>
                            <th>₹<?php echo number_format($orderDetails['total_amount'], 2); ?></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="mt-4">
                    <p class="text-center">Thank you for your order!</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>