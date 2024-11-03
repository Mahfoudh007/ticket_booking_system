<?php
include 'db.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $event_id = $_POST['event_id'];
    $event_date = $_POST['event_date'];
    $ticket_adult_price = $_POST['ticket_adult_price'];
    $ticket_adult_quantity = $_POST['ticket_adult_quantity'];
    $ticket_kid_price = $_POST['ticket_kid_price'];
    $ticket_kid_quantity = $_POST['ticket_kid_quantity'];

    // Call the addOrder function with the captured parameters
    $result = addOrder($conn,$event_id, $event_date, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity);
    
    // Handle the result (e.g., display a message to the user)
    if ($result['success']) {
        echo "<p>{$result['message']}</p>";
    } else {
        echo "<p>Error: {$result['message']}</p>";
    }
}

function addOrder($conn,$event_id, $event_date, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity) {
    // Generate unique barcode
    $barcode = generateUniqueBarcode();
    
    // Prepare data for the booking API
    $data = [
        'event_id' => $event_id,
        'event_date' => $event_date,
        'ticket_adult_price' => $ticket_adult_price,
        'ticket_adult_quantity' => $ticket_adult_quantity,
        'ticket_kid_price' => $ticket_kid_price,
        'ticket_kid_quantity' => $ticket_kid_quantity,
        'barcode' => $barcode,
    ];

    // Define context for the HTTP POST request
    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ];

    $context  = stream_context_create($options);
    
    // Send request to the booking API
    $response = @file_get_contents('https://api.site.com/book', false, $context);
    
    // Check for HTTP errors
    if ($response === FALSE) {
        $error = error_get_last();
        return ['success' => false, 'message' => 'Error connecting to booking API: ' . $error['message']];
    }

    $result = json_decode($response, true);

    // Check if the booking was successful
    if (isset($result['message']) && $result['message'] === 'order successfully booked') {
        // Send confirmation to the approval API
        $approvalContext = stream_context_create([
            'http' => [
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query(['barcode' => $barcode]),
            ],
        ]);

        $approvalResponse = @file_get_contents('https://api.site.com/approve', false, $approvalContext);
        
        // Check for HTTP errors
        if ($approvalResponse === FALSE) {
            return ['success' => false, 'message' => 'Error connecting to approval API.'];
        }

        $approvalResult = json_decode($approvalResponse, true);

        if (isset($approvalResult['message']) && $approvalResult['message'] === 'order successfully approved') {
            // Save order to the database
            saveOrderToDatabase($conn,$event_id, $event_date, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity, $barcode);
            return ['success' => true, 'message' => 'Order successfully added.'];
        } else {
            return ['success' => false, 'message' => $approvalResult['error'] ?? 'Unknown error during approval.'];
        }
    } elseif (isset($result['error']) && $result['error'] === 'barcode already exists') {
        // Retry with a new barcode
        return addOrder($event_id, $event_date, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity);
    } else {
        return ['success' => false, 'message' => $result['error'] ?? 'Unknown error during booking.'];
    }
}

function generateUniqueBarcode() {
    // Generate a random barcode (for simplicity, a number string)
    return strval(rand(10000000, 99999999));
}

function saveOrderToDatabase($conn,$event_id, $event_date, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity, $barcode) {
    // Database connection and saving logic here

    $sql = "INSERT INTO orders (event_id, event_date, ticket_adult_price, ticket_adult_quantity, ticket_kid_price, ticket_kid_quantity, barcode) VALUES ($event_id, $event_date, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity, $barcode)";
    mysqli_query($conn, $sql);

}
?>
