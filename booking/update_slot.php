<?php
// Include database connection
include 'connect.php';

// Retrieve form data
$slot_id = $_POST['slot_id'];
$full_name = $_POST['full_name'];
$is_booked = isset($_POST['is_booked']) ? 1 : 0; // Check if the checkbox is checked, set to 1 if checked, 0 otherwise

// Update booking details in the database
$sql = "UPDATE slots SET full_name = '$full_name', is_booked = $is_booked WHERE id = $slot_id";
if (mysqli_query($conn, $sql)) {
    // Redirect to view_slot.php after successful update
    header("Location: view_slot.php");
    exit(); // Ensure that no further code is executed after redirection
} else {
    echo "Error updating booking: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
