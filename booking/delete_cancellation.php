<?php
// Include database connection
include 'connect.php';

// Check if delete button is clicked
if(isset($_POST['delete'])) {
    // Check if any cancellations are selected for deletion
    if(isset($_POST['cancellation_ids']) && !empty($_POST['cancellation_ids'])) {
        // Loop through each selected cancellation ID and delete it
        foreach($_POST['cancellation_ids'] as $cancellation_id) {
            // Prepare and execute SQL statement to delete the cancellation
            $sql = "DELETE FROM cancellations WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $cancellation_id);
            $stmt->execute();
        }
        // Provide feedback to the user
        echo "Selected cancellations have been deleted successfully.";
    } else {
        // If no cancellations are selected for deletion
        echo "Please select at least one cancellation to delete.";
    }
}

// Close database connection
$conn->close();

// Redirect back to view_cancellations.php
header("Location: view_cancellations.php");
exit;
?>
