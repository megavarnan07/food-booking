<?php
$conn = mysqli_connect('localhost','root', '', 'register');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$phone_no = $_POST['phone_no'];
$person = $_POST['person'];
$rev_date = $_POST['rev_date'];
$time = $_POST['time'];
$message = $_POST['message'];

$sql = "INSERT INTO login_data (name,phone_no,person,rev_date,time,message)
VALUES ('$name', '$phone_no','$person','$rev_date','$time','$message')";

if ($conn->query($sql) === TRUE) {
    echo "Table Reserved Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>