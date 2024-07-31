<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container " style="max-width: 600px">
    <h1 class="h3 my-3">Login</h1>
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
</body>
</html>