<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Analyzer - DocHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/medicine_analysis.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <!-- Navigation Bar -->
    <?php include ("includes/header.php"); ?>
    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Medicine Analyzer</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="uploadForm" class="p-4 border rounded shadow-sm">
                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Upload Medicine Image</label>
                        <input type="file" id="imageInput" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Analyze</button>
                </form>
                <div id="result" class="mt-3"></div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include ("includes/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/med_ana.js"></script>
</body>
</html>