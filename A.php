<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

<?php
// 데이터베이스 연결 정보를 포함한 PHP 파일을 include합니다.
$host = 'sql112.epizy.com';
$username = 'epiz_34059385';
$password = 'PjRJFIaAlay';
$dbname = 'epiz_34059385_csci380_prj01';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully to database.";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$comment = $_POST['comment'];

$sql = "INSERT INTO contacts (first_name, last_name, mobile, age, comment) 
        VALUES (:first_name, :last_name, :mobile, :age, :comment)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':mobile', $mobile);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':comment', $comment);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "New Friend added successfully!";
} else {
    echo "Error adding new Friend.";
}


?>
</body>
</html>