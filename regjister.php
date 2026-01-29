






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="regjister.css">

</head>
<body> 

   <?php include_once 'navbar.php'; ?>

    <form class="regjister-form" id="regjisterForm" method="POST" action="regjister.php">
     <div class="tabela">
    <h2>Register</h2>

    <div class="shkrimet">
        <div class="ele">
            <input type="text" id="name" name="name" placeholder="Name">
            <small class="error" id="nameError"></small>
        </div>

        <div class="ele">
            <input type="text" id="surname" name="surname" placeholder="Surname">
            <small class="error" id="surnameError"></small>
        </div>

        <div class="ele">
            <input type="email" id="email" name="email" placeholder="Email">
            <small class="error" id="emailError"></small>
        </div>

        <div class="ele">
            <input type="password" id="password" name="password" placeholder="Password">
            <small class="error" id="passwordError"></small>
        </div>
        

        <div class="ele">
        
            <input type="text" id="phone" name="phone" placeholder="Phone Number" style="background-color: white;">
            <small class="error" id="phoneError"></small>
        </div>
    </div>

    <br>

    <div class="checkbox">
        <p>
            <input type="checkbox" id="terms"> 
            <label>I agree with the terms and conditions</label>
            <small class="error" id="termsError"></small>
        </p>

        <p>
            <input type="checkbox" id="emails"> 
            <label>I wish to receive emails related to the company</label>
        </p>
    </div>

    <div class="ele">
        <input type="submit" id="registerBtn" value="REGISTER" >
  
    </div>
</form>
</div>






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
<div class="copyright"><p>© 2025 Adventure Gear. All rights reserved.</p></div>
</body>



<script src="regjistriVal.js"></script>
</html>


    <?php
include_once 'DataBase.php';
include_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Register the user
    $result = $user->register($name, $surname, $email, $phone, $password);
    if ($result === true) {
        header("Location: logInPage.php"); // Redirect to login page
        exit;
    } else {
        echo "Error registering user: " . $result;
    }
}

?>