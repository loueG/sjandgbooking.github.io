<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>All Bookings</h2>
    <table>
        <tr>
            <th>Slot Number</th>
            <th>Full Name</th>
            <th>Action</th>
        </tr>
        <?php
        // Include database connection
        include 'connect.php';

        // Fetch all bookings from the database
        $sql = "SELECT * FROM slots";
        $result = mysqli_query($conn, $sql);

        // Display all bookings
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['slot_number'] . '</td>';
            echo '<td>' . $row['full_name'] . '</td>';
            echo '<td><a href="edit_slot.php?slot_id=' . $row['id'] . '">Edit</a></td>';
            echo '</tr>';
        }

        // Free result set
        mysqli_free_result($result);

        // Close connection
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
