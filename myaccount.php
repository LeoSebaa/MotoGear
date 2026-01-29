<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="myaccount.css">
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <div class="account-container">
        <h2>My Account</h2>
        <div class="account-info">
            <div class="info-item">
                <label>Name:</label>
                <span><?php echo htmlspecialchars($_SESSION['name'] ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <label>Surname:</label>
                <span><?php echo htmlspecialchars($_SESSION['surname'] ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <label>Email:</label>
                <span><?php echo htmlspecialchars($_SESSION['email'] ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <label>Phone Number:</label>
                <span><?php echo htmlspecialchars($_SESSION['phone'] ?? 'N/A'); ?></span>
            </div>
            <div class="logout-item">
                <form method="POST" action="logout.php">
                <button id="logoutBtn">Log Out</button>
                </form>
            </div>
        </div>
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
</html>
