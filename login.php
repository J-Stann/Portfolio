<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>

        <a href="index.php">
            <p>Back To Home</p>
        </a>
        <?php
        session_start();
        include('connection.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $query = "SELECT * FROM `login` WHERE `username` = '$username' AND `password` = '$password'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] = $username;
                header('Location: admin.php');
                exit;
            } else {
                echo "<p style='color: red;'>Invalid username or password</p>";
            }
        }
        ?>
    </div>
</body>

</html>