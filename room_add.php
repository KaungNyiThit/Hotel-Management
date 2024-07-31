


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
    <form action="_actions/add_room.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
                <label class="m-2">Add Photo</label>
                <input type="file"  name="photo" class="form-control">
        </div>

        <label for="room_number" class="form-label">Room Number</label>
        <input type="number" name="room_number" class="form-control" min="1">

        <label class="form-label" style="font-weight: 500px">Room Type</label>
        <select class="form-select" name="name" >
            <option>Deluxe</option>
            <option >Superior</option>
            <option >Luxury</option>
        </select>


        <label class="form-label" style="font-weight: 500px">Adult</label>
        <select class="form-select" name="adult" aria-label="Default select example" required>
          <option selected>1</option>
          <option value="1">2</option>
          <option value="2">3</option>
          <option value="3">4</option>
        </select>
      
        <label class="form-label" style="font-weight: 500px">Child</label>
        <select class="form-select" name="child" aria-label="Default select example" required>
          <option selected>0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>

        <label class="form-label" style="font-weight: 500px">PRICE</label>
        <input type="number" class="form-control" name="price">

        <button class="btn btn-primary my-3" type="submit">Add</button>
  </form>
</div>
</body>
</html>