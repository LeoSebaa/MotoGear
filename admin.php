<?php
session_start();
include_once 'DataBase.php';
include_once 'User.php';
include_once 'comentsMethod.php';
include_once 'productMethod.php';

$database = new Database();
$db = $database->getConnection();

$user = new user($db);
$users = $user->getAllUsers();

$comment = new comment($db);
$comments = $comment->getAllComments();

$product = new Product($db);
$products = $product->getAllProducts();

$active_section = isset($_GET['section']) ? $_GET['section'] : 'products';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $active_section = 'products';
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $result = $product->addProduct($name, $price, $description, $image);
            if ($result === true) {
                $products = $product->getAllProducts();
            }
        }
    } elseif (isset($_POST['delete_product'])) {
        $product_id = $_POST['product_id'];
        $result = $product->deleteProduct($product_id);
        if ($result === true) {
            $products = $product->getAllProducts();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard - Adventure Gear</title>
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <section class="dashboard">
        <div class="sidebar">
            <h2>Navigation</h2>
            <ul>
                <li><a  class="nav-link <?php echo $active_section === 'users' ? 'active' : ''; ?>" data-section="users">Users</a></li>
                <li><a  class="nav-link <?php echo $active_section === 'products' ? 'active' : ''; ?>" data-section="products">Products</a></li>
                <li><a  class="nav-link <?php echo $active_section === 'orders' ? 'active' : ''; ?>" data-section="orders">Orders</a></li>
                <li><a  class="nav-link <?php echo $active_section === 'comments' ? 'active' : ''; ?>" data-section="comments">Comments</a></li>
                  <form method="POST" action="logOut.php">
                <li><button type="submit" class="logout-btn" action="logout.php">Log Out</button></li>
            </form>
                
            </ul>
            
        </div>

        <div class="main-content">
            <h1>Admin Dashboard</h1>

            <div id="users" class="table-section <?php echo $active_section === 'users' ? 'active' : ''; ?>">
                <h2>Users</h2>
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $u): ?>
                      <tr>
                           <td><?= $u['id'] ?></td>
                           <td><?= htmlspecialchars($u['name'])?></td>
                            <td><?= htmlspecialchars($u['surname']) ?></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                           <td><?= htmlspecialchars($u['phone']) ?></td>
                           <td><?= $u['role'] ?></td>
</tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="products" class="table-section <?php echo $active_section === 'products' ? 'active' : ''; ?>">
                <h2>Products</h2>
                <div class="add-product-form">
                    <form method="POST" action="admin.php"class="product-form" enctype="multipart/form-data">
                        <label for="name">Name:</label>
                        <input type="text" name="name" required>
                        <label for="price">Price:</label>
                        <input type="number" step="0.01" name="price" required>
                        <label for="description">Description:</label>
                        <textarea name="description" required></textarea>
                        <br>
                        <label for="image">Image:</label>
                        <input type="file" name="image" required>
                        <button type="submit" name="add_product">Add Product</button>
                        
                    </form>
                </div>
                <table class="products-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($p['id']); ?></td>
                            <td><?php echo htmlspecialchars($p['name']); ?></td>
                            <td><?php echo htmlspecialchars($p['description']); ?></td>
                            <td><?php echo htmlspecialchars($p['price']); ?></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                                    <button type="submit" name="delete_product" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="orders" class="table-section <?php echo $active_section === 'orders' ? 'active' : ''; ?>">
                <h2>Orders</h2>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="cancel-btn">Cancel Order</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="cancel-btn">Cancel Order</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="comments" class="table-section <?php echo $active_section === 'comments' ? 'active' : ''; ?>">
                <h2>Contact Messages</h2>
                <table class="comments-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($comments as $c): ?>
                      <tr>
                           <td><?= $c['id'] ?></td>
                           <td><?= htmlspecialchars($c['name']) ?></td>
                           <td><?= htmlspecialchars($c['email']) ?></td>
                           <td><?= htmlspecialchars($c['message']) ?></td>
                           <td><?= $c['created_at'] ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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

<script src="admin.js"></script>
</body>
</html>
