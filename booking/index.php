<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookings";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed:" . $conn->connect_error);
}

//Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $destination = $_POST["destination"];
    $payment_fee = $_POST["Payment-fee"]; // Corrected field name
    $payment_method = $_POST["Payment-method"]; // Corrected field name
    $id_picture = $_FILES["id_picture"]["name"]; // Retrieve file name
    $gcash_screenshot = $_FILES["gcash_screenshot"]["name"]; // Retrieve file name

    // Upload files
    $target_dir = "uploads/"; // Directory to upload files
    move_uploaded_file($_FILES["id_picture"]["tmp_name"], $target_dir . $id_picture);
    move_uploaded_file($_FILES["gcash_screenshot"]["tmp_name"], $target_dir . $gcash_screenshot);

    //prepare and execute the database insertion
    $sql = "INSERT INTO `booking`(`name`, `email`, `destination`, `payment_fee`, `payment_method`, `id_picture`, `gcash_screenshot`)
     VALUES ('$name','$email','$destination','$payment_fee','$payment_method','$id_picture','$gcash_screenshot')";

    if ($conn->query($sql) === TRUE) {
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

            p {
               text-align: justify;
               margin-bottom: 15px;
           }

           h2 {
            text-align: justify;
            margin-bottom: 15px;
            }

            .cancel-button {
                background-color: #d9534f;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                display: grid;
               justify-items: end;
            }

            .cancel-button:hover {
                background-color: #c9302c;
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
        echo "<h2>Booking Successfully</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Destination: $destination</p>";
        echo "<p>Payment Fee: $payment_fee</p>";
        echo "<p>Payment Method: $payment_method</p>";
        echo "<form action='cancel_booking.php' method='post'>";
        echo "<input type='hidden' name='name' value='$name'>";
        echo "<input type='submit' class='cancel-button' value='Cancel Booking'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "<footer>&copy; 2024 SJ&G Shipping Lines. All rights reserved.</footer>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
