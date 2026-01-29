<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view_products.css">
    <title>View Product - Adventure Gear</title>
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <section class="product-view">
        <h1>Product Details</h1>
        <div class="product-container">
            <div class="product-gallery">
                <img src="produktet/helmet_agv_1.jpg" alt="Product Image" class="product-image main-image">
            </div>
            <div class="product-info">
                <h2 class="product-name">AGV Helmet Model X</h2>
                <p class="product-price">$299.99</p>
                <p class="product-description">This is a high-quality motorcycle helmet designed for safety and comfort. It features advanced protection technology and a sleek design suitable for all riding conditions.</p>
                <div class="address-fields">
                    <input type="text" id="streetAddress" placeholder="Street Address" required>
                    <input type="text" id="cityStateZip" placeholder="City, State, ZIP" required>
                </div>
                <button class="order-button">Order Now</button>
            </div>
        </div>
        <a href="products.html" class="back-button">Back to Products</a>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderButton = document.querySelector('.order-button');
        const streetAddress = document.getElementById('streetAddress');
        const cityStateZip = document.getElementById('cityStateZip');

        orderButton.addEventListener('click', function() {
            if (streetAddress.value.trim() === '' || cityStateZip.value.trim() === '') {
                alert('Please fill in both address fields before placing your order.');
            } else {
                alert('Thank you for your order! Hope you enjoy your new gear. It will be delivered next week.');
            }
        });
    });
</script>

</body>
</html>
