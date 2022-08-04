<?php

use App\Connection;

$pdo = Connection::getPDO();
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');