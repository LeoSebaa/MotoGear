<?php
session_start();
include_once 'DataBase.php';
include_once 'comentsMethod.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $comment = new comment($connection);


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d');

    
    $result = $comment->addComment($name, $email, $message ,$date);
    if ($result === true) {
        header("Location: home.php");
        exit;
    } 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Contact Us - Adventure Gear</title>
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <section class="contact-section">
        <h1>Contact Us</h1>
        <p>Have questions about our motorcycle gear? Get in touch with us!</p>
        <div class="contact-form">
            <h2>Send us a message</h2>
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
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
<div class="copyright"><p>© 2025 Adventure Gear. All rights reserved.</p></div>

</body>
</html>
