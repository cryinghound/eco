<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>

<body>
    <?php include 'navbar.php'; ?>

<!-- Signup Form -->
<div id="signup-form" class="form-box">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <input type="text" name="fname" placeholder="First Name" required><br>
                <input type="text" name="lname" placeholder="Last Name" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="tel" name="mobile" placeholder="Mobile" required><br>
                <input type="text" name="location_title" placeholder="Location Title" required><br>
                <input type="text" name="address" placeholder="Address" required><br>
                <input type="text" name="city" placeholder="City" required><br>
                <input type="text" name="company" placeholder="Company"><br>
                <input type="text" name="title" placeholder="Title"><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <script src="script.js" defer></script>
    <?php include 'footer.php'; ?>
</body>
</html>