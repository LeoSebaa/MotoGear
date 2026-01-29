<?php
session_start();
session_destroy();
header("Location: logInPage.php"); // Redirect to login page after logout
exit;
?>