<?php
include('connection.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = $_GET['id'];
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $fname = $_POST["fathername"];
        $mname = $_POST["mothername"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $class = $_POST["class"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $language = $_POST["language"];
        
       
        $sql = "UPDATE studentdetails SET name=?, fathername=?, mothername=?, gender=?, email=?, class=?, address=?, phone=?, language=? WHERE id=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssssssi", $name, $fname, $mname, $gender, $email, $class, $address, $phone, $language, $studentId);
            
            if ($stmt->execute()) {
                header("Location: viewpage.php"); 
                exit();
            } else {
                echo "Error executing the update query: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error preparing the update query: " . $conn->error;
        }
    }
    
    $sql = "SELECT * FROM studentdetails WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $studentId);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
               
                $name = $row["name"];
                $fname = $row["fathername"];
                $mname = $row["mothername"];
                $gender = $row["gender"];
                $email = $row["email"];
                $class = $row["class"];
                $address = $row["address"];
                $phone = $row["phone"];
                $language = $row["language"];
            } else {
                echo "Student not found.";
            }
        } else {
            echo "Error executing the select query: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing the select query: " . $conn->error;
    }
} else {
    echo "Invalid student ID.";
}
?>
