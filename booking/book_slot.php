<?php
// Include database connection
include 'connect.php';

echo "<style>
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

    input[type='text'],
    input[type='submit'],
    input[type='radio'] {
        margin-bottom: 10px;
    }

    input[type='text'],
    input[type='submit'] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    input[type='submit'] {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    input[type='submit']:hover {
        background-color: #0056b3;
    }

    input[type='radio'] {
        margin-right: 5px;
    }

    input[type='radio']:checked + label {
        font-weight: bold;
    }
</style>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if slot ID and full name are provided
    if (!empty($_POST['slot_id']) && !empty($_POST['full_name'])) {
        $slot_id = $_POST['slot_id'];
        $full_name = $_POST['full_name'];

        // Update the slot status to booked and record full name
        $sql = "UPDATE slots SET is_booked = 1, full_name = '$full_name' WHERE id = $slot_id";
        if (mysqli_query($conn, $sql)) {
            echo "<h2>Slot booked successfully!</h2>";
            echo "<form action='book.php' method='post'>";
            echo "<input type='submit' value='Go to Booking form'>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Please select a slot and provide your full name!";
    }
}

// Close connection
mysqli_close($conn);
?>
