<?php
session_start();
include_once 'DataBase.php';
include_once 'productMethod.php';
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$products = $product->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="products.css">
</head>
<body>
    
    <?php include_once 'navbar.php'; ?>
   

    <content>
       <h2>Our Products</h2>
      <div class="products-container">
        <?php foreach ($products as $prod): ?>
          <div class="product-card">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($prod['image']); ?>" class="product-image">
            <h2 class="product-name"><?php echo htmlspecialchars($prod['name']); ?></h2>
            <p class="product-price">$<?php echo htmlspecialchars($prod['price']); ?></p>
            <a href="view_products.php?id=<?php echo $prod['id']; ?>" class="view-button">View Details</a>
          </div>
        <?php endforeach; ?>
      </div>
    </content>
























    
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