<?php
// Include the database connection
include 'db.php';

// Fetch tickets from the database
$query = "SELECT o.id AS order_id, o.event_id, o.event_date, tt.name AS ticket_type, od.quantity, od.barcode, o.equal_price
          FROM orders o
          JOIN order_details od ON o.id = od.order_id
          JOIN ticket_types tt ON od.ticket_type_id = tt.id";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Tickets</title>

    <!-- <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    }

    .container {
    width: 50%;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin-top: 50px;
    }

    h1 {
    text-align: center;
    }

    form {
    display: flex;
    flex-direction: column;
    }

    label {
    margin-bottom: 5px;
    }

    input {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

    button {
    padding: 10px;
    background-color: #5cb85c;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    button:hover {
    background-color: #4cae4c;
    }

    </style> -->
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="add_page.php">Add Ticket</a></li>
            <li><a href="view_tickets.php">View Tickets</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Ticket List</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Event ID</th>
                    <th>Event Date</th>
                    <th>Ticket Type</th>
                    <th>Quantity</th>
                    <th>Barcode</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['event_id']; ?></td>
                            <td><?php echo $row['event_date']; ?></td>
                            <td><?php echo $row['ticket_type']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['barcode']; ?></td>
                            <td><?php echo $row['equal_price']; ?> ₽</td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No tickets found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
