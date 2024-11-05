<?php
// Include the database connection
include 'db.php';

// Get the order ID and event ID from the request
$orderId = $_POST['order_id'];
$eventId = $_POST['event_id'];

// Delete the ticket from the database
$query = "DELETE FROM order_details WHERE order_id = $orderId AND event_id = $eventId";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Ticket deleted successfully";
} else {
    echo "Error deleting ticket: " . $conn->error;
}
?>