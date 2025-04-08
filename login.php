<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>

<body>
    <?php include 'navbar.php'; ?>

        <!-- Login Form -->
        <div id="login-form" class="form-box">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Login</button>
            </form>
        </div>

<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user) {
    echo "Stored password: " . $user['password']; // Debugging step
    echo "Entered password: " . $_POST['password']; // Debugging step

    if ($_POST['password'] == $user['password']) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['fname'] = $user['fname'];
        header("Location: myprofile.php");
        exit();
    } else {
        echo "Error: Password verification failed!";
    }
} else {
    echo "Error: User not found!";
}
}
?>

<script src="script.js" defer></script>
<?php include 'footer.php'; ?>
</body>
</html>