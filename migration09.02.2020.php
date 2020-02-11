<?php
require_once (__DIR__ . '/pdo.php');

$pdo->query('CREATE TABLE `task`.`todo` ( `id` INT(32) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(255) NOT NULL , `text` TEXT NOT NULL , `deadline` VARCHAR(32) NOT NULL , 
`datetime` VARCHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

$pdo->query('CREATE TABLE `task`.`doing` ( `id` INT(32) NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(255) NOT NULL , `text` TEXT NOT NULL , `deadline` VARCHAR(32) NOT NULL , 
 `datetimecreate` VARCHAR(32) NOT NULL , `datetimedo` VARCHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

$pdo->query('CREATE TABLE `task`.`done` ( `id` INT(32) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(255) NOT NULL , `text` TEXT NOT NULL , `deadline` VARCHAR(32) NOT NULL , 
`datetimecreate` VARCHAR(32) NOT NULL , `datetimedo` VARCHAR(32) NOT NULL , `datetimeend` VARCHAR(32) NOT NULL , 
`doingid` VARCHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

$pdo->query('CREATE TABLE `task`.`comments` ( `id` INT(32) NOT NULL AUTO_INCREMENT , 
`doingid` INT(32) NOT NULL , `comments` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

$pdo->query('CREATE TABLE `task`.`users` ( `id` INT(32) NOT NULL AUTO_INCREMENT ,
 `login` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

header('location:registration.php');
