<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost:3306');
define('DATABASE', 'tesmkm');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>