<?php
  include('autoload.php');

  use Database\MySQL;
  use Database\UsersTable;
  use Helpers\Auth;

  $auth = Auth::check();

  $table = new UsersTable(new MySQL);
  $rooms = $table->luxuryRoom();
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
<div class="container my-5">
        <h1 class="text-center">Rooms(<?= count($rooms) ?>)</h1>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, tempora nihil earum nulla quidem maiores recusandae ea? Repudiandae.</p>
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="row g-0">

                <?php if(!$rooms) : ?>
                    <h1 class="text-center my-lg-5 ms-lg-5">No Available Rooms yet!</h1>
                <?php endif ?> 

                <?php foreach($rooms as $room) : ?>
                    <div class="card col-12 col-lg-5 mx-2 mb-2" >
                        <?php if($room->photo) : ?>
                        <img src="_actions/photos/<?= $room->photo ?>" class="card-img-top" alt="...">
                        <?php endif ?>
                        <div class="card-body">
                            <h5 class="card-title ">Room Type: <small class="text-success"><?= $room->name ?></small></h5>
                            <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <b> Price:  
                                <small class="text-success">$<?= $room->price ?></small>
                            </b>
                            <b> Adult:
                                <small class="text-secondary"><?= $room->adult ?></small>
                            </b>
                            <b> Child:
                                <small class="text-secondary"><?= $room->child ?></small>
                            </b> 
                                                                                    
                            <?php if($auth->role == "customer" AND $room->status == "booked")  :?>                              
                                <a class="btn  disabled" >Booked</a>
                            <?php elseif($auth->role == "customer" AND $room->status == "available")  :?>                              
                                    <a href="book_room.php?id=<?= $room->id ?>" class="btn btn-primary" style="margin:  -30px 0px 0 340px;">Book</a>
                            <?php elseif($auth->role == "admin") : ?>
                                <a href="edit.php?id=<?= $room->id ?>">Edit</a>
                              
                            <?php  endif ?>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>

        
            <!-- side bar -->
            <div class="col-lg-2 col-12">
                <h1 class="h4 text-center my-3 text-primary">
                    <i class="fa-solid fa-camera"></i>
                    <span class="ms-2 d-none d-lg-inline"></span>
                </h1>

                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
                        Home
                    </a>
                    <a href="deluxe.php" class="list-group-item list-group-item-action">Deluxe</a>
                    <a href="superior.php" class="list-group-item list-group-item-action">Superior</a>
                    <a href="luxury.php" class="list-group-item list-group-item-action">Luxury</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>