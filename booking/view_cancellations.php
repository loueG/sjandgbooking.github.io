<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cancellations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>View Cancellations</h2>
        <form method="post" action="delete_cancellation.php">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database connection
                    include 'connect.php';

                    // Fetch cancellations from the database
                    $sql = "SELECT * FROM cancellations";
                    $result = $conn->query($sql);

                    // Check if there are any cancellations
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='cancellation_ids[]' value='" . $row['id'] . "'></td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><button type='submit' name='delete'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No cancellations</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <footer>&copy; 2024 SJ&G Shipping Lines. All rights reserved.</footer>
</body>
</html>
