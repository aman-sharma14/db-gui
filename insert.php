<?php

//database connection
$servername = "localhost";
$username = "root";
$password = "rootdb";
$dbname = "mydb";

//Create Connection
$conn = new mysqli($servername,$username,$password,$dbname);

//Check Connection
if($conn -> connect_error){
    die("Connection failded: ".$conn->connect_error);
}
else{
    echo "Connection Successful";
}

//Get form data
$name = $_POST['name'];
$email = $_POST['mail'];
$dob = $_POST['dob'];
$course = $_POST['course'];

echo "<h3> $name <br> $email <br> $dob <br> $course";

#prepare and bind
$stmt = $conn->prepare("INSERT INTO student (name,dob,course,email) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$name,$dob,$course,$email);

if($stmt->execute()){
    echo "New record created successfully";
}
else{
    echo "Error: ".$stmt->error;
}

//CLOSE CONNECTION
$stmt->close();
$conn->close();

?>
