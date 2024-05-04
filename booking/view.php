<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings - SJ&G Shipping Lines</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Current Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Destination</th>
                    <th>Payment Fee</th>
                    <th>Payment Method</th>
                    <th>ID Picture</th>
                    <th>GCash Screenshot</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bookings";
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection Failed: " . $conn->connect_error);
                } 
                $query = "SELECT id, name, email, destination, payment_fee, payment_method, id_picture, gcash_screenshot FROM booking";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['payment_fee']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
                        echo "<td><a href='uploads/" . htmlspecialchars($row['id_picture']) . "' target='_blank'>" . htmlspecialchars($row['id_picture']) . "</a></td>";
                        echo "<td><a href='uploads/" . htmlspecialchars($row['gcash_screenshot']) . "' target='_blank'>" . htmlspecialchars($row['gcash_screenshot']) . "</a></td>";
                        echo "<td><a href='delete_booking.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this booking?\");'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No bookings found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
