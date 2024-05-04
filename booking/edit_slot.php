<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Slot</h2>
    <?php
    // Include database connection
    include 'connect.php';

    // Retrieve slot ID from the URL parameter
    $slot_id = $_GET['slot_id'];

    // Fetch the booking details from the database
    $sql = "SELECT * FROM slots WHERE id = $slot_id";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Display the form to edit booking details
        echo '<form method="post" action="update_slot.php">';
        echo '<input type="hidden" name="slot_id" value="' . $slot_id . '">';
        echo 'Full Name: <input type="text" name="full_name" value="' . $row['full_name'] . '"><br>';
        echo 'Is Booked: <input type="checkbox" name="is_booked" value="1" ' . ($row['is_booked'] == 1 ? 'checked' : '') . '><br>'; // Checkbox to toggle booking status
        echo '<input type="submit" value="Update">';
        echo '</form>';
    } else {
        echo 'Booking not found.';
    }

    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
