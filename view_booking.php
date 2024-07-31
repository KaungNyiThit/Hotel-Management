<?php
    include('autoload.php');

    use Database\MySQL;
    use Database\UsersTable;
    use Helpers\Auth;

    $table = new UsersTable(new MySQL);
    $bookings = $table->userRel();

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
                <td><?=  $booking ->roomNumber  ?></td>
                <td><?=  $booking ->room ?></td>
                <td><?=  $booking ->check_in ?></td>
                <td><?=  $booking->check_out ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
</body>
</html>