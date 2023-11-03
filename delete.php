<?php
include('connection.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = $_GET['id'];
    
    
    $sql = "DELETE FROM studentdetails WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $studentId);
        
        if ($stmt->execute()) {
            header("Location: register.php"); 
            exit();
        } else {
            echo "Error executing the delete query: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing the delete query: " . $conn->error;
    }
} else {
    echo "Invalid student ID.";
}
?>
