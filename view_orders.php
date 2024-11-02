<?php
include 'db.php';

//Fetch orders from the database 
$sql = "SELECT * FROM orders";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <h1>Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['user_id'];?></td>
                            <td><?php echo $row['created'];?></td>
                        </tr>
                    <?php endwhile;?>
                <?php else:?>
                    <tr>
                        <td colspan="3">No orders found</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper.js for Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- custom JavaScript -->
     <script src="js/script.js"></script
</body>
</html>