<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form action="login.php" method="POST">
           
            <button type="submit">Login</button>
        </form>
    </div>
    <?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code (e.g., db.php)
    include("includes/db.php");

    // Retrieve and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Insert user data into the database (use prepared statements for security)
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>

</body>
</html>
