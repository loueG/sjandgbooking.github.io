<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Form - SJ&G Shipping Lines</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="booking-form">
            <h2>SJ&G Shipping Lines Booking Form</h2>
            <form action="index.php" method="post" enctype="multipart/form-data">
                
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
 
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
           
                <label for="destination">Destination:</label>
                <select id="destination" name="destination" required onchange="setDefaultTime()">
                <option value="">Select Destination</option>
                <option value="Dapa-to-Surigao (09:00 AM - 11:00 AM)">Dapa-to-Surigao (09:00 AM - 11:00 AM)</option>
                <option value="Surigao-to-Dapa (05:30 AM - 07:30 AM)">Surigao-to-Dapa (05:30 AM - 07:30 AM)</option>
                </select>

                <label for="Payment-fee">Payment Fee:</label>
                <select id="Payment-fee" name="Payment-fee" required onchange="setDefaultTime()">
                <option value="">Select Payment Fee</option>
                <option value="Original Price P400">Original Price P400</option>
                <option value="PWD P320">PWD P320</option>
                <option value="STUDENT P320">STUDENT P320</option>
                </select>
               
                <label for="Payment-method">Payment Method:</label>
                <select id="Payment-method" name="Payment-method" required onchange="setDefaultTime()">
                <option value="">Select Payment method</option>
                <option value="GCash (09*********)">GCash (09*********)</option>
                </select>

                <label for="id_picture">Upload ID Picture</label>
                <input type="file" id="id_picture" name="id_picture" accept="image/*" required>

                <label for="gcash_screenshot">Upload GCash Screenshot</label>
                <input type="file" id="gcash_screenshot" name="gcash_screenshot" accept="image/*" required>

                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>
</body>
</html>