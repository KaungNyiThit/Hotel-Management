<?php

include('../autoload.php');

use Database\MySQL;
use Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$guest = Auth::check();

// $_SESSION['guest_id'] = $guests['id'];


$roomId = $_POST['room_id'];
$checkIn = $_POST['check_in'];
$checkout = $_POST['check_out'];
$adult = $_POST['adult'];
$child = $_POST['child'];

$table = new UsersTable(new MySQL);
$table->bookRoom($roomId, $guest->id , $checkIn, $checkout, $adult, $child);



HTTP::redirect("../view_booking.php", "book=success");