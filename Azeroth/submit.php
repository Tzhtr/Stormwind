<?php
$servername = "localhost";
$username = "Hidden";
$password = "Hidden";
$dbname = "Hidden";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$message = $_POST['message'];
$sql = "INSERT INTO comments(`from`,message) VALUES (?,?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $name, $message);

if(mysqli_stmt_execute($stmt)){
    echo "Record added";
}else{
    echo "Error adding record: ". mysqli_error($conn);
}

include('select.php');

// return HTML markup for comments
echo $commentsMarkup;

mysqli_close($conn);
?>