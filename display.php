<?php

$conn = new mysqli("localhost", "root", "rootdb", "mydb");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("SELECT * FROM student");
$stmt->execute();
$result = $stmt->get_result();


$output = '';
while ($row = $result->fetch_assoc()) {
    $output .= '<tr>';
    $output .= '<td>' . $row['rollno'] . '</td>';
    $output .= '<td>' . $row['name'] . '</td>';
    $output .= '<td>' . $row['email'] . '</td>';
    $output .= '<td>' . $row['dob'] . '</td>';
    $output .= '<td>' . $row['course'] . '</td>';
    $output .= '</tr>';
}

echo $output;


$stmt->close();
$conn->close();
?>
