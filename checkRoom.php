<?php
  include('autoload.php');

  use Database\MySQL;
  use Database\UsersTable;
  use Helpers\HTTP;
  use Helpers\Auth;
  
  $auth = Auth::check();

  $name = $_POST['name'];
  $adult = $_POST['adult'];
  $child = $_POST['child'];

  $table = new UsersTable(new MySQL);
  $rooms = $table->show($name, $adult, $child);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"> </script>
</head>
<body>

<div class="modal fade" id="bookRoom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Register</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="_actions/book.php" method="POST" class="modal-body">

          <label for="name" class="form-label" style="font-weight: 500px">Room Type</label>
                <select class="form-select" name="name" >
                  <option value="<?= $rooms->id ?>"><?= $rooms->adult ?></option>
                </select>
        </form>
      </div>
    </div>
</div>
<div class="container my-5">

      <div>
        <i class="fa-solid fa-home">
        </i>
        <a href="index.php" class="text-decoration-none text-dark">Home</a>
      </div>

      <h3 class="text-center my-3">Rooms(<?= count($rooms) ?>)</h3>
      <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, tempora nihil earum nulla quidem maiores recusandae ea? Repudiandae.</p>
      <div class="row g-0">

      <?php if(!$rooms) : ?>
            <h1 class="text-center my-lg-4 ms-lg-4">No Available Rooms yet!</h1>
      <?php endif ?> 
      
      <?php foreach($rooms as $room) : ?>
            <div class="card col-12 col-lg-5 mx-lg-5  mb-2">
              <?php if($room->photo) : ?>
                <img src="_actions/photos/<?= $room->photo ?>" class="card-img-top">
               <?php endif ?>
              <div class="card-body">
                <h5 class="card-title">Room Type: <small class="text-success"><?= $room->name ?></small></h5>
                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, odit!</p>
                <b> Price:  
                  <small class="text-success">$<?= $room->price ?></small>
                </b>
                <b> Adult:  
                  <small class="text-secondary"><?= $room->adult ?></small>
                </b>
                <b> Child:  
                  <small class="text-secondary">$<?= $room->child ?></small>
                </b>
                <?php if($auth->role == "customer") : ?>
                <a  href="book_room.php?id=<?= $room->id ?>" class="btn btn-primary" style="margin-left: 200px;">Book</a>
                <?php elseif($auth->role == "admin") : ?>
                  <a href="edit.php?id=<?= $room->id ?>">Edit</a>
                <?php endif ?>
              </div>
            </div>
    <?php endforeach ?>
    </div>
</div>


</body>
</html>

