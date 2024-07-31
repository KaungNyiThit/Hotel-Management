<?php
  include('autoload.php');

  use Database\MySQL;
  use Database\UsersTable;
  use Helpers\Auth;

  $id = $_GET['id'];

  $table = new UsersTable(new MySQL);
  $edit = $table->edit($id);

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
<div class="container  my-3" style="max-width: 500px;">
  <h3>Add Room</h3>
    <form action="_actions/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $edit->id ?>">

        <div class="input-group mb-3">
                <label class="m-2">Add Photo</label>
                <input type="file"  name="photo" class="form-control">
        </div>

        <label for="room_number" class="form-label">Room Number</label>
        <input type="number" name="room_number" class="form-control" value="<?= $edit->room_number ?>" min="1">

        <label class="form-label" style="font-weight: 500px">Room Type</label>
        <input type="text" name="name" class="form-control" value="<?= $edit->name ?>">


        <label class="form-label" style="font-weight: 500px">Adult</label>
        <input type="number" name="adult" class="form-control" value="<?= $edit->adult ?>" max="4" min="1">

        <label class="form-label" style="font-weight: 500px">Adult</label>
        <input type="number" name="child" class="form-control" value="<?= $edit->child ?>" max="4" min="0">

        <label class="form-label" style="font-weight: 500px">PRICE</label>
        <input type="number" class="form-control" name="price" value="<?= $edit->price ?>">

        <button class="btn btn-primary my-3" type="submit">Edit</button>
</form>    
</body>
</html>