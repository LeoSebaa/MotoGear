<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard - Adventure Gear</title>
</head>
<body>

    <header class="navigation">
    <div class="logo" ></div>
    <nav  class="nav" >
      <a href="home.html" >Home</a>
      <a href="products.html">Products</a>
      <a href="aboutus.html">About</a>
      <a href="contact.html">Contact</a>
      <a href="logInPage.html">LogIn</a>
    </nav>
    </header>

    <section class="dashboard">
        <div class="sidebar">
            <h2>Navigation</h2>
            <ul>
                <li><a  class="nav-link active" data-section="users">Users</a></li>
                <li><a  class="nav-link" data-section="products">Products</a></li>
                <li><a  class="nav-link" data-section="orders">Orders</a></li>
                <li><a  class="nav-link" data-section="comments">Comments</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Admin Dashboard</h1>

            <div id="users" class="table-section active">
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="products" class="table-section">
                <h2>Products</h2>
                <button class="add-btn">Add Product</button>
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
                        <tr>
                            <td>1</td>
                            <td>Helmet AGV-Pista</td>
                            <td>High-quality helmet with advanced safety features.</td>
                            <td>1700.00</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacket Dainese Racing 5</td>
                            <td>Protective racing jacket with CE certification.</td>
                            <td>570.00</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dainese Gloves Carbon 4</td>
                            <td>Carbon fiber gloves for superior protection.</td>
                            <td>209.00</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="orders" class="table-section">
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

            <div id="comments" class="table-section">
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
