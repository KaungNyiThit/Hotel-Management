<?php

include('autoload.php');

use Database\MySQL;
use Database\UsersTable;
use Helpers\Auth;

$id = $_GET['id'];

$table = new UsersTable(new MySQL);
// $books = $table->roomInfo($id);
$book = $table->roomRel($id);
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
    <div class="container my-4">
      <h3>Book Room</h3>
    
    <form action="_actions/book.php" method="POST" class="modal-body">
        
        <label for="name" class="form-label" style="font-weight: 500px">Room Type</label>
                <select class="form-select mb-3" name="room_id" >
                  <option value="<?= $id ?>"><?= $book->name ?></option>
                </select>

                <select class="form-select mb-3" name="adult" >
                  <option value="<?= $book->adult ?>"><?= $book->adult ?></option>
                </select>

                <select class="form-select mb-3" name="child" >
                  <option value="<?= $book->child ?>"><?= $book->child ?></option>
                </select>
                
              <label class="form-label" style="font-weight: 500px">Check-in</label>
              <input type="date" name="check_in" value="<?= date('Y-m-d') ?>" class="form-control shadow-none mb-2" required>

              <label class="form-label" style="font-weight: 500px">Check-out</label>
              <input type="date" name="check_out" value="<?= date('Y-m-d', strtotime('tomorrow')) ?>" class="form-control shadow-none mb-2" required>

              <button class="btn btn-primary">Book</button>
              <a class="btn btn-secondary" href="index.php">Back</a>
    </form>
    </div>
   
</body>
</html>