<?php
$servername = "localhost";
$username = "Hidden";
$password = "Hidden";
$dbname = "Hidden";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from comments";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    echo "<table><tr><th>Name</th><th>Message</th><th>Date</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo"<tr><td>".$row['from']."</td><td>".$row['message']."</td><td>".$row['date']."</td></tr>";
    }
    echo"</table>";
}else{
    echo "0 results";
}

mysqli_close($conn);

?>