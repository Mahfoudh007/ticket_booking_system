<?php
// Include the database connection
include 'db.php';

// Fetch the current page number from the query string
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Define the number of tickets per page
$ticketsPerPage = 10;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $ticketsPerPage;

// Fetch tickets from the database
$query = "SELECT o.id AS order_id, o.event_id, o.event_date, tt.name AS ticket_type, od.quantity, od.barcode, o.equal_price
          FROM orders o
          JOIN order_details od ON o.id = od.order_id
          JOIN ticket_types tt ON od.ticket_type_id = tt.id
          LIMIT $ticketsPerPage OFFSET $offset";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Tickets</title>

    <script>
    function deleteTicket(orderId, eventId) {
        if (confirm("Are you sure you want to delete this ticket?")) {
            // Send an AJAX request to delete the ticket
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_ticket.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Ticket deleted successfully, reload the page
                        location.reload();
                    } else {
                        // Error deleting ticket
                        console.error("Error deleting ticket: " + xhr.responseText);
                    }
                }
            };
            xhr.send("order_id=" + orderId + "&event_id=" + eventId);
        }
    }

    function searchTickets() {
        var input = document.getElementById("searchInput").value.toLowerCase();
        var table = document.getElementsByTagName("table")[0];
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var eventIdCell = rows[i].getElementsByTagName("td")[1];
            var ticketTypeCell = rows[i].getElementsByTagName("td")[3];

            if (eventIdCell || ticketTypeCell) {
                var eventId = eventIdCell.textContent || eventIdCell.innerText;
                var ticketType = ticketTypeCell.textContent || ticketTypeCell.innerText;

                if (eventId.toLowerCase().indexOf(input) > -1 || ticketType.toLowerCase().indexOf(input) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
    </script>
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
        <input type="text" id="searchInput" onkeyup="searchTickets()" placeholder="Search by event ID or ticket type">
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
                    <th>Action</th>
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
                            <td><?php echo $row['equal_price'] * $row['quantity']; ?> ₽</td>
                            <td>
                                <button onclick="deleteTicket(<?php echo $row['order_id']; ?>, <?php echo $row['event_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No tickets found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php
            // Calculate the total number of tickets
            $totalTicketsQuery = "SELECT COUNT(*) AS total FROM orders";
            $totalTicketsResult = $conn->query($totalTicketsQuery);
            $totalTickets = $totalTicketsResult->fetch_assoc()['total'];

            // Calculate the number of pages
            $totalPages = ceil($totalTickets / $ticketsPerPage);

            // Display previous page link
            if ($page > 1) {
                echo '<a href="view_tickets.php?page=' . ($page - 1) . '">Previous</a>';
            }

            // Display page numbers
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo '<a class="active" href="view_tickets.php?page=' . $i . '">' . $i . '</a>';
                } else {
                    echo '<a href="view_tickets.php?page=' . $i . '">' . $i . '</a>';
                }
            }

            // Display next page link
            if ($page < $totalPages) {
                echo '<a href="view_tickets.php?page=' . ($page + 1) . '">Next</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>