<?php

include('../autoload.php');

use Database\MySQL;
use Database\UsersTable;
use Helpers\HTTP;

$name = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];


$target_dir = "photos/";
$target_file =  basename($name);

if($type === "image/jpeg" or $type === "image/png") {

    move_uploaded_file($tmp, "photos/$target_file");

    $table = new UsersTable(new MySQL);
    $room = $table->addRoom([
    'name' => $_POST['name'],
    'room_number' => $_POST['room_number'],
    'adult' => $_POST['adult'],
    'child' => $_POST['child'],
    'price' => $_POST['price'],
    'photo' => $target_file,

    ]);
    HTTP::redirect("/index.php", "add=success");
}else {
    HTTP::redirect("/room_add.php", "error=type");
}



