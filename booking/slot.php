<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Booking</title>
    <style>
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
}

form {
    width: 50%;
    margin: 0 auto;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="submit"],
input[type="radio"] {
    margin-bottom: 10px;
}

input[type="text"],
input[type="submit"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

input[type="radio"] {
    margin-right: 5px;
}

input[type="radio"]:checked + label {
    font-weight: bold;
}

    </style>
</head>
<body>
    <h2>Available Slots</h2>
    <form method="post" action="book_slot.php">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>
        
        <?php
        // Include database connection
        include 'connect.php';

        // Fetch available slots from the database
        $sql = "SELECT * FROM slots WHERE is_booked = 0";
        $result = mysqli_query($conn, $sql);

        // Display available slots
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name="slot_id" value="' . $row['id'] . '">';
            echo 'Slot ' . $row['slot_number'] . '<br>';
        }

        // Free result set
        mysqli_free_result($result);

        // Close connection
        mysqli_close($conn);
        ?>
        <br>
        <input type="submit" value="Book Slot">
    </form>
</body>
</html>
