<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
try {
    $conn = new PDO("mysql:host=tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=fvtmkfyz8ymzy8a1", "sbib1pmzgwmexs5g", "tk4m14h6yyt889va");
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$eventname     = $_GET['eventname'];
$eventdate     = $_GET['eventdate'];
$eventlocation       = $_GET['eventlocation'];
$eventnote = $_GET['eventnote'];
$eventenddate = $_GET['eventenddate'];
$eventtime = $_GET['eventtime'];
$eventend = $_GET['eventend'];
$eventCode = $_GET['eventCode']

$query = "DELETE FROM events WHERE (eventname, eventdate, eventlocation, eventnote, eventenddate, eventtime, eventend, eventCode) VALUES ('{$_GET['eventname']}','{$_GET['eventdate']}','{$_GET['eventlocation']}', '{$_GET['eventnote']}', '{$_GET['eventenddate']}', '{$_GET['eventtime']}', '{$_GET['eventend']}', '{$_GET['eventCode']}')";
$result = $conn->query($query);
if ($result) {
    $users = $result->fetchAll();
    echo json_encode($users);
} else {
    echo json_encode(false);
}
?>