<?php
// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookings";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to delete booking
    $sql = "DELETE FROM booking WHERE id = $booking_id";

    if ($conn->query($sql) === TRUE) {
        // If deletion successful, redirect to view bookings page
        header("Location: view.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    // If ID is not provided, redirect back to view bookings page
    header("Location: view.php");
    exit();
}
?>
