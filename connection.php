<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$full_name=$_POST['full_name'];
$email_address=$_POST['email_address'];
$mobile_number=$_POST['mobile_number'];
$birthdate=$_POST['birthdate'];
$gender=$_POST['gender'];

$conn = new mysqli('localhost', 'root', '','registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(full_name,email_address,mobile_number,birthdate,gender) value(?,?,?,?,?)");
    $stmt->bind_param("ssiis",$full_name,$email_address,$mobile_number,$birthdate,$gender);
    $stmt->execute();
    echo "registration succesfully";
    $stmt->close();
    $conn->close();
}
?>
