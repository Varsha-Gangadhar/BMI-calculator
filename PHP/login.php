<?php
// Database connection
require_once('conn.php');

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username and password from the form
    $user_id = $_POST['userid'];
    $password = $_POST['password'];

    // SQL query to fetch user from the database
    $query = "SELECT * FROM auth WHERE userid='$user_id' AND pass='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Fetch the user data
        $user_data = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['user_id'] = $user_data['userid'];
        $_SESSION['username'] = $user_data['username']; // assuming there's a 'username' field in the 'auth' table
        $_SESSION['loggedin'] = true;

        // Redirect to dashboard page
        header("Location: admin_board.php");
        exit();
    } else {
        // User not found, redirect back to login page with error message
        header("Location: login.php?error=1");
        exit();
    }
} else {
    // If accessed directly, redirect to login page
    header("Location: login.html");
    exit();
}
?>
<?php
session_start();
session_destroy();
header("Location: login.html");
exit();
?>