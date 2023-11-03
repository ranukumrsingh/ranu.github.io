<?php
include('connection.php');

$sql = "SELECT * FROM studentdetails";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">View Page</h1>
    
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>sno.</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Language</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["fathername"] . "</td>";
                        echo "<td>" . $row["mothername"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["class"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["language"] . "</td>";
                        echo "<td><a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm '>Edit</a> <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm mt-2'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <a href="add.php" class="btn btn-primary">Add New</a>
    </div>

    <!-- Include Bootstrap JS and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
