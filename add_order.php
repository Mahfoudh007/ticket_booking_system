<?php 
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Order</h1>
        <form id="orderForm">
            <div class="form-group">
                <label for="eventID">Event ID</label>
                <input type="text" class="form-control" id="eventID" required>
            </div>
            <div class="form-group">
                <label for="eventDate">Event Date</label>
                <input type="datetime-local" class="form-control" id="eventDate" required>
            </div>
            <div class="form-group">
                <label for="adultQuantity">Adult Tickets</label>
                <input type="number" class="form-control" id="adultQuantity" required>
            </div>
            <div class="form-group">
                <label for="ChildQuantity">Child Tickets</label>
                <input type="number" class="form-control" id="ChildQuantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>    



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper.js for Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- custom JavaScript -->
<script src="js/script.js"></script>
</body>
</html>