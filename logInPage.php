
<?php
session_start();
include_once 'DataBase.php';
include_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Attempt to log in
    if ($user->login($email, $password)) {
        header("Location: home.php"); // Redirect to home page
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Gear</title>
    <link rel="stylesheet" href="logInPage.css">
</head>

<body>

<?php include_once 'navbar.php'; ?>





<section>

   
    <form class="login-box" id="loginForm" method="POST" action="logInPage.php">
        <h2>Login</h2>

        <input type="text" id="email" placeholder="email" name="email" />
        <span class="error" id="emailError"></span>

        <input type="password" id="password" placeholder="Password" name="password" />
        <span class="error" id="passwordError"></span>

        <p class="register-text" style="font-size:14px; margin-top:5px; color:#555;">
            Still not registered?
            <a href="regjister.php" style="color:#e86013; text-decoration:none;">Register</a>
        </p>

        <input type="submit" id="loginBtn" value="Log In" />
    </form>

  
    <script src="login.js"></script>

</section>

<footer class="footer">

    <div class="short-about">
        <h2>About Us</h2>
        <p>Premium motorcycle gear & accessories — safety-focused, rider-approved.
            We provide certified helmets, jackets, and performance parts for every rider.</p>
    </div>

    <div class="follow-us">
        <h2>Follow Us</h2>
        <a href="" class="link"><img src="footer-social/insta.avif" alt=""></a>
        <a href="" class="link"><img src="footer-social/facebook.png" alt=""></a>
        <a href="" class="link"><img src="footer-social/tiktok.png" alt=""></a>
        <a href="" class="link"><img src="footer-social/youtube.png" alt=""></a>
    </div>

</footer>

<div class="copyright">
    <p>© 2025 Adventure Gear. All rights reserved.</p>
</div>

</body>
</html>
