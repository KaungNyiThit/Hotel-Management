<?php

include('autoload.php');

use Database\MySQL;
use Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;


$table = new UsersTable(new MySQL);
$bookings = $table->userRel();

$users = $_SESSION['guest'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
        <h1 class="h3 my-3">Profile</h1>
        <ul class="list-group mb-3">
            <li class="list-group-item">Name: <?= $users->name ?></li>
            <li class="list-group-item">Email: <?= $users->email ?></li>
            <li class="list-group-item">Phone: <?= $users->phone ?></li>
         
        </ul>
        <a href="_actions/logout.php" class="text-danger">Logout</a>
        <a href="index.php">Home</a>



<div class="container" style="max-width: 900px; margin-top: 100px;">
<h1 class="text-center m-5">Your Bookings</h1>
    <table class="table table->dark table-stropted table-borer">
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?=  $booking ->room ?></td>
                <td><?=  $booking ->check_in ?></td>
                <td><?=  $booking->check_out ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
</body>
</html>