
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <title>Diamond Gas House Corporation</title>
</head>
<body>
    <div class="main-container">
        <h2>DGHC<br>Customer Dashboard</h2>
        <h3></h3>
        <form method="POST" action="authenticate.php">
            <div class="login-container">
                <div class="inputBox">
                        <input type="text" name="username" required autocomplete="off">
                        <label>Username</label>
                </div>
                <div class="inputBox">
                        <input type="password" name="password" required autocomplete="off">
                        <label>Password</label>
                </div>
                <div class="btn">
                        <input type="submit" name="" value="Login">
                </div>
            </div>
        </form>
    </div>
    </section>
</body>
</html>