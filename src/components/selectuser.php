<?php

try {
    $conn = new PDO("mysql:host=tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=fvtmkfyz8ymzy8a1", "sbib1pmzgwmexs5g", "tk4m14h6yyt889va");
}
catch(PDOException $e)
{
    echo "Error: " .$e->getMessage();
}

$username=$_POST['username']
$email =$_POST['email'];
$password =$_POST['password'];

//$query = "SELECT * FROM users";
$query = "SELECT * FROM users WHERE username='$username', email='$email' AND password='$password'";

$result = $conn->query($query);
if($result){
$users = $result->fetchAll();
echo json_encode($users);
} else {
    echo json_encode (false);
}
?>