<?php 
include 'includes/header.php'; 
if(!isset($_SESSION['user_id'])) {
    header("Location: register_login/login.php");
    exit();
}
?>
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/medicine_booking.css">
</head>
<div class="container medicine-container mt-5 pt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="text-primary">Pharmacy - DocHub</h2>
        </div>
        <div class="col-md-4 text-end">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myOrdersModal">
                <i class="bi bi-clock-history"></i> My Orders
            </button>
        </div>
    </div>
    <div class="row">
        <!-- Patient Information Form -->
        <div class="col-md-4">
            <div class="form-card">
                <div class="form-card-header">
                    <h5>Patient Details</h5>
                </div>
                <div class="form-card-body">
                    <form id="patientForm">
                        <div class="mb-3">
                            <label class="form-label">Patient Name</label>
                            <input type="text" class="form-control" id="patientName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Place</label>
                            <input type="text" class="form-control" id="place" required>
                        </div>
                    </form>
                    <!-- Cart Section -->
                    <div class="cart-section mt-4">
                        <h5 class="cart-title">Selected Medicines</h5>
                        <div id="cartItems" class="cart-items"></div>
                        <div class="cart-total">
                            <h5>Total: ₹<span id="totalAmount">0.00</span></h5>
                            <button class="btn btn-primary w-100" id="checkoutBtn">
                                <i class="bi bi-bag-check"></i> Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Medicines List -->
        <div class="col-md-8">
            <div class="medicines-card">
                <div class="medicines-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5>Available Medicines</h5>
                        </div>
                        <div class="col-auto">
                            <div class="search-box">
                                <i class="bi bi-search"></i>
                                <input type="text" class="form-control" id="searchMedicine" placeholder="Search medicines...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="medicines-body">
                    <div class="row" id="medicinesList">
                        <?php
                        $query = "SELECT * FROM medicines WHERE stock > 0";
                        $result = $conn->query($query);
                        while($medicine = $result->fetch_assoc()):
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="medicine-card">
                                <img src="<?php echo htmlspecialchars($medicine['image_url']); ?>" 
                                     class="medicine-img" alt="<?php echo htmlspecialchars($medicine['name']); ?>">
                                <div class="medicine-details">
                                    <h5><?php echo htmlspecialchars($medicine['name']); ?></h5>
                                    <p><?php echo htmlspecialchars($medicine['description']); ?></p>
                                    <div class="medicine-price">₹<?php echo number_format($medicine['price'], 2); ?></div>
                                    <div class="medicine-actions">
                                        <input type="number" class="form-control quantity-input" 
                                               min="1" max="<?php echo $medicine['stock']; ?>" value="1">
                                        <button class="btn btn-primary add-to-cart" 
                                                data-id="<?php echo $medicine['id']; ?>"
                                                data-name="<?php echo htmlspecialchars($medicine['name']); ?>"
                                                data-price="<?php echo $medicine['price']; ?>"
                                                data-stock="<?php echo $medicine['stock']; ?>">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Orders Modal -->
<div class="modal fade" id="myOrdersModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-clock-history"></i> Order History
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="ordersList"></div>
            </div>
        </div>
    </div>
</div>
<script src="js/medicine_booking.js"></script>
<?php include 'includes/footer.php'; ?>
