<?php
$dns = 'mysql:host=localhost;dbname=test';
$dbuser = 'test';
$dbpassword = 'test';
$pdo = new PDO($dns, $dbuser, $dbpassword); 

$statement = 'SELECT * FROM test';
$stm = $pdo->prepare($statement);
$stm->execute();
$record = $stm->fetch(\PDO::FETCH_ASSOC);

print_r($record);

include __DIR__ . '/test_1.php';

?>
<hr />
<?php

$stm = $pdo->prepare($statement);
$stm->execute();
$records = $stm->fetchAll(\PDO::FETCH_ASSOC);
print_r($records);

$statement = "INSERT INTO test(first_name, last_name, dob) VALUES('Angelo', 'Smith', '1981-01-01')";
$pdo->query($statement);
$pdo->lastInsertId(); // get the last inserted id
$statement = "UPDATE test SET dob='1982-02-02'";
$pdo->query($statement);

$statement = "UPDATE test SET last_name='ABC' WHERE first_name='Sothea'";
$pdo->query($statement);