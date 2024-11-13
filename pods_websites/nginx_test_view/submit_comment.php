<?php
$host = 'postgresql-service';
$db = 'mydatabase';
$user = 'admin';
$pass = 'postgrespassword';

$es_host = 'http://elasticsearch-service:9200';

// Connect to PostgreSQL
$conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

// Prepare and execute insert
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$comment = $_POST['comment'];
$stmt = $conn->prepare("INSERT INTO fan_page_comment (firstname, lastname, comment) VALUES (:firstname, :lastname, :comment)");
$stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'comment' => $comment]);

// Log to Elasticsearch
$log = [
    'datetime' => date('Y-m-d H:i:s'),
    'firstname' => $firstname,
    'lastname' => $lastname,
    'comment' => $comment
];
$es_log = json_encode([
    'message' => "On {$log['datetime']}, user {$log['firstname']} {$log['lastname']} left a message on the fan page.",
    'comment' => $log['comment']
]);
$ch = curl_init("$es_host/fanpage-logs/_doc");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $es_log);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_exec($ch);
curl_close($ch);

echo "Thank you for your comment!";
?>
