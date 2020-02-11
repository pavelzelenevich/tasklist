<?php
define("DB_ADRESS", 'localhost');
define("DB_DBN", "mysql:host=localhost;dbname=task;charset=utf8");
define("DB_USER", 'root');
define("DB_PASSWORD", '');
$pdo = new PDO(DB_DBN, DB_USER, DB_PASSWORD);