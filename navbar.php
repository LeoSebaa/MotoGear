
<header class="navigation">
  <div class="logo"></div>

  <nav class="nav">
    <a href="home.php">Home</a>
    <a href="products.php">Products</a>
    <a href="aboutus.php">About</a>
    <a href="contact.php">Contact</a>

    <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="logInPage.php">Login</a>

    <?php elseif ($_SESSION['role'] == 'admin'): ?>
        <a href="admin.php">Admin</a>

    <?php else: ?>
        <a href="myaccount.php">Account</a>
    <?php endif; ?>
  </nav>
</header>


