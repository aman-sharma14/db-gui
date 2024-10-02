<?php
// Database connection
$conn = new mysqli("localhost", "root", "rootdb", "mydb");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$rollno = $_POST['rno'];
$field = $_POST['field'];
$value = $_POST[$field]; 


$stmt = $conn->prepare("UPDATE student SET $field = ? WHERE rollno = ?");
$stmt->bind_param("si", $value, $rollno); // 's' for string, 'i' for integer

if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
