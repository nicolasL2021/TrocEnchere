<?php

use App\Auth;
use App\Connection;
use App\Table\ArticleTable;

Auth::check();

$pdo = Connection::getPDO();
$table = new ArticleTable($pdo);
$table->delete($params['id']);

header('Location: ' . $router->url('admin_articles') . '?delete=1');