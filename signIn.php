<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center" style="max-width: 600px">
        <h1 class="h3 my-3">Login</h1>
        <form action="_actions/login.php" method="post" class="mb-3">
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
            <input type="text" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button class="btn btn-primary w-50">Login</button>
        </form>
        <a href="register.php">Register</a>
        
    </div>
</body>
</html>