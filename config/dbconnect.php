<?php

$dbh = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$dbh['dbname'] = ltrim($dbh['path'], '/');
$dsn = "mysql:host={$dbh['host']};dbname={$dbh['dbname']};charset=utf8";
$user = $dbh['user'];
$password = $dbh['pass'];
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
);
$db = new PDO($dsn,$user,$password,$options);
return $db;

// try {
//   $db = new PDO('mysql:dbname=meal_management;host=localhost;charset=utf8', 'root', 'root');
// } catch(PDOException $e) {
//   print('DB接続エラー：'. $e->getMessage());
// }


?>