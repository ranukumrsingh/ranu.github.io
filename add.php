<?php
include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $fathername = $_POST["fathername"];
    $mothername = $_POST["mothername"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $class = $_POST["class"];
    $address = $_POST["address"];
    $phonenumber = $_POST["phone"];
    $language = $_POST["language"];
    
    // Prepare and execute the SQL query to insert a new record
    $sql = "INSERT INTO studentdetails (name, fathername, mothername, gender, email, class, address, phone, language) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssss", $name, $fathername, $mothername, $gender, $email, $class, $address, $phonenumber, $language);
        
        if ($stmt->execute()) {
            header("Location: viewpage.php"); // Redirect back to the view page after insertion
            exit();
        } else {
            echo "Error executing the insert query: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing the insert query: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-1">
        <h1 class="text-center">Add Student</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="fathername">Father's Name</label>
                <input type="text" class="form-control" id="fathername" name="fathername" required>
            </div>
            <div class="form-group">
                <label for="motherName">Mother's Name:</label>
                <input type="text" class="form-control" id="motherName" name="mothername" required>
            </div>

            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="Male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="Female" required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" class="form-control" id="class" name="class" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phone" required>
            </div>

            <div class="form-group">
                <label for="language">Language:</label>
                <select class="form-control" id="language" name="language">
                    <option value="English">English</option>
                    <option value="Spanish">Hindi</option>
                    <option value="French">French</option>
                    <!-- Add more language options as needed -->
                </select>
            </div>

            
        </form>
    </div>
            
            <button type="submit" class="btn btn-primary mx-5">Add</button>
        </form>
        
        <a href="viewpage.php" class="btn btn-secondary mx-0">Back to View</a>
    </div>
    
    <!-- Include Bootstrap JS and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
