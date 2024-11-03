<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Your Order Has Been Successfully Booked!</h1>
        <p>Barcode Number: <?php echo htmlspecialchars($_GET['barcode']); ?></p>
        <a href="index.php">Return to Home Page</a>
    </div>
</body>
</html>
