<?php

  include('autoload.php');

  use Database\MySQL;
  use Database\UsersTable;
  use Helpers\Auth;

  $auth = Auth::check();

  $table = new UsersTable(new MySQL);
  $rooms = $table->getRooms();
  // $books = $table->roomRel();

  // $edit = $table->edit();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: white; min-height: 1200px;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container">
      <a class="navbar-brand" href="#">NAME HOTEL</a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>

          <li class="nav-item" id="reservation">
            <button class="nav-link" id="res">Reservation</button>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Rooms
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="deluxe.php">Deluxe</a></li>
              <li><a class="dropdown-item" href="superior.php">Superior</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li><a class="dropdown-item" href="luxury.php">Luxury</a></li>
            </ul>
          </li>


          <?php if($auth->role == "admin") : ?>
          <li class="nav-item">
            <a class="nav-link " href="room_add.php" aria-disabled="true">Add Room+</a>
          </li>
          <?php endif ?>
          
        </ul>

        <?php if($auth) : ?>
          <i class="fa-solid fa-user"></i>
          <a href="profile.php" class="nav-link m-lg-2 d-inline"><?= $auth->name ?></a>
        <?php endif ?>

        <div class="d-block my-lg-1 my-3">
          <button type="button" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#register">
            Register
          </button>
          <a href="_actions/logout.php" class="text-danger ms-2">Logout</a>          
        </div>

      </div>
    </div>
  </nav>
  
  <?php if($auth->role == "admin" ) : ?>
  <?php if(isset($_GET['login'])) : ?>
    <div class="alert alert-success my-3 text-center" id="alt">
        You login as an ADMIN
    </div>
  <?php endif ?>
  <?php endif ?>


  <!-- modal(Register) -->
  <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Register</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="_actions/add_guest.php" method="POST" class="modal-body">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control mb-3" placeholder="Your Name" required>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control mb-3" placeholder="name123@email.com" required>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control mb-3" required>
          <label for="address">Phone</label>
          <input type="phone" id="Phone" name="phone" class="form-control mb-3" placeholder="Phone Number" required>
          <button class="btn btn-primary submit">Register</button>
          <a href="signIn.php" class="">Login</a>
        </form>
      </div>
    </div>
  </div>


  <!-- Check Rooms -->
  <div class="container  my-5" id="book" style="display: none;">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5>Book Now</h5>

        <form action="checkRoom.php" method="post">
          <div class="row align-items-end">

          <div class="col-lg-5">
                <label class="form-label" style="font-weight: 500px">Room Type</label>
                <select class="form-select" name="name" >
                  <option value="Deluxe"> Deluxe </option>
                  <option value="Superior"> Superior </option>
                  <option value="Luxury"> Luxury</option>
                </select>

            </div>

        

            <div class="col-lg-3">
              <label class="form-label" style="font-weight: 500px">Adult</label>
              <select class="form-select" name="adult" aria-label="Default select example" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>

            <div class="col-lg-3">
              <label class="form-label" style="font-weight: 500px">Child</label>
              <select class="form-select" name="child" aria-label="Default select example" required>
                <option selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>

            <div class="col-lg-1">
              <button class="btn btn-primary" type="submit">
                Check
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Carousel -->
  <div id="hotel-carousel" class="carousel slide" data-ride="hotel-carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hotel-carousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hotel-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#hotel-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner ">
      <div class="carousel-item active c-item" id="slide-item">
        <img src="https://hotelandra.com/wp-content/uploads/2022/01/Andra2483-Andra-Queen-Queen.jpg"
          class="d-block w-100 c-img" alt="...">
        <div class="carousel-caption">
          <h3>NAME HOTEL</h3>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
      <div class="carousel-item c-item" id="slide-item">
        <img
          src="https://cdn.loewshotels.com/loewshotels.com-2466770763/cms/cache/v2/5f5a6e0d12749.jpg/1920x1080/fit/80/86e685af18659ee9ecca35c465603812.jpg"
          class="d-block w-100 c-img" alt="...">
      </div>
      <div class="carousel-item c-item" id="slide-item">
        <img
          src="https://image-tc.galaxy.tf/wijpeg-6ult0bbmbwp00d6blsctgv83j/alextphoto-com-think-hospitality-esme-room-388-01-website_standard.jpg?crop=111%2C0%2C1779%2C1334"
          class="d-block w-100 c-img" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hotel-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hotel-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <!-- Book Room -->



 
  <!-- Avaliable Rooms -->
  <div class="container my-5">
      <h3 class="text-center my-3">Avaliable Rooms</h3>
      <div class="row g-0">
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
                  <small class="text-secondary"><?= $room->child ?></small>
                </b>
                <?php if($auth->role == "customer") : ?>
                <a href="book_room.php?id=<?= $room->id ?>" class="btn btn-primary"  style="margin-left: 240px;">Book</a>
                <?php elseif($auth->role == "admin") : ?>
                  <a href="edit.php?id=<?= $room->id ?>">Edit</a>
                <?php endif ?>
              </div>
            </div>

    <?php endforeach ?>
    </div>
  </div>
 

  <script>
    document.querySelector("#reservation").onclick = show;

    function show() {
      document.querySelector("#book").style.display = "block";
    }

    // setInterval(() => {
    //   document.querySelector("#alt").fadeOut('fast');
    // }, 1000);

    setTimeout(() => {
      document.querySelector("#alt").style.display = "none";
      location.replace('http://localhost//HotelManagement/index.php')
    }, 2000);

    let carouselInner = document.querySelector('.carousel-inner');
    let carouselItems = document.querySelectorAll('.c-item');
    let totalItems = carouselItems.length;
    let currentIndex = 0;

    setInterval(() => {
      carouselItems[currentIndex].classList.remove('active')
      currentIndex++;
      if(currentIndex === totalItems){
        currentIndex = 0;
      }
      carouselItems[currentIndex].classList.add('active')
    }, 5000);

   
    
  </script>
</body>

</html>