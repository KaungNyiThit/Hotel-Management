<?php

include('../autoload.php');

use Database\MySQL;
use Database\UsersTable;
use Helpers\HTTP;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$table = new UsersTable(new MySQL);
$guest = $table->loginUser($name, $email, $password);

if($guest) {
    session_start();

    $_SESSION['guest'] = $guest;

    HTTP::redirect("../index.php", "login=success");
 
}
HTTP::redirect("../index.php", "incorrect=login");