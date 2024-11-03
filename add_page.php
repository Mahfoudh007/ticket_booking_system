<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking System</title>
    <link rel="stylesheet" href="style.css">
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
        <h1>Ticket Booking System</h1>
        <form action="add_order.php" method="POST" novalidate>
            <label for="event_id">Event ID:</label>
            <input type="number" id="event_id" name="event_id" required min="1" title="Please enter a valid event ID.">

            <label for="event_date">Event Date:</label>
            <input type="datetime-local" id="event_date" name="event_date" required>

            <label for="ticket_adult_price">Adult Ticket Price:</label>
            <input type="number" id="ticket_adult_price" name="ticket_adult_price" required min="0" step="0.01" title="Please enter a valid price.">

            <label for="ticket_adult_quantity">Number of Adult Tickets:</label>
            <input type="number" id="ticket_adult_quantity" name="ticket_adult_quantity" required min="1" title="Please enter at least one ticket.">

            <label for="ticket_kid_price">Kid Ticket Price:</label>
            <input type="number" id="ticket_kid_price" name="ticket_kid_price" required min="0" step="0.01" title="Please enter a valid price.">

            <label for="ticket_kid_quantity">Number of Kid Tickets:</label>
            <input type="number" id="ticket_kid_quantity" name="ticket_kid_quantity" required min="0" title="Please enter the number of tickets.">

            <button type="submit">Add Order</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
