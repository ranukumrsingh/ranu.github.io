<?php
include('connection.php');

$name = $_POST['name'];
$fname = $_POST['fathername'];
$mothername = $_POST['mothername'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$class = $_POST['class'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$language = $_POST['language'];


$sql = "INSERT INTO `student`(`name`, `fname`, `mname`, `gender`, `email`, `class`, `address`, `phone`, `language`) VALUES ('$name','$fname','$mothername ','$gender','$email','$class','$address','$phone','$language')";

$final = mysqli_query($conn, $sql);

if ($final) {
    echo 'Data added in db';
} else {
    echo 'Data not added in db';
}
?>
