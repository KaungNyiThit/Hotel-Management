<?php


include('../autoload.php');

use Database\MySQL;
use Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$table->registerUser([
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "phone" => $_POST['phone'],
]);

HTTP::redirect("../index.php", "register=success");



