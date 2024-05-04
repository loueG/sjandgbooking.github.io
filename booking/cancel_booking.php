<?php
include 'connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Safely get the value of 'name' from POST data
    $name = $_POST["name"];

    // Prepare an SQL statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO `cancellations`(`name`) VALUES (?)");
    $stmt->bind_param("s", $name); // 's' specifies the variable type => 'string'

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                line-height: 1.6;
                margin: 0;
                padding: 0;
            }

            header {
                background: #004880;
                color: #fff;
                padding: 10px 0;
                text-align: center;
            }

            nav ul {
                list-style: none;
            }

            nav ul li {
                display: inline;
                margin-right: 10px;
            }

            nav ul li a {
                color: #fff;
                text-decoration: none;
                font-weight: bold;
            }

            .container {
                width: 80%;
                margin: auto;
                overflow: hidden;
                padding: 20px 0;
            }

            .text-center {
                text-align: center;
                margin-top: 2.5rem;
            }

            footer {
                background: #333;
                color: #fff;
                text-align: center;
                padding: 10px 0;
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
            }
        </style>";
        echo "<header><nav><ul><li><a href='home.php'>Home</a></li></ul></nav></header>";
        echo "<div class='container'>";
        echo "<div class='text-center'>";
        echo "<h2>Booking Cancelled Successfully</h2>";
        echo "</div>";
        echo "</div>";
        echo "<footer>&copy; 2024 SJ&G Shipping Lines. All rights reserved.</footer>";
    } else {
        // Error handling if the query fails to execute
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection to free up resources
    $stmt->close();
}

$conn->close();
?>
