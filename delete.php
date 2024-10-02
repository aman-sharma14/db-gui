<?php
// Database connection
$conn = new mysqli("localhost", "root", "rootdb", "mydb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'delete_all' or 'rollno' is set
if (isset($_POST['delete_all'])) {
    
    $stmt = $conn->prepare("DELETE FROM student");
    if ($stmt->execute()) {
        echo "All records deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
} elseif (isset($_POST['rollno'])) {
    
    $rollno = $_POST['rollno'];
    $stmt = $conn->prepare("DELETE FROM student WHERE rollno = ?");
    $stmt->bind_param("i", $rollno); // 'i' for integer
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close connection
$stmt->close();
$conn->close();
?>
