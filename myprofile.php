<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <!-- profile pic -->
        <div class="profile">
            <img src="media/profile.webp" alt="User Profile">
            <h2>Hi, Renee!</h2>
            <p>Your Impact:</p>
        </div>
        <!--options -->
        <ul class="sidebar-menu">
            <li><a href="#" data-content="profile">Profile</a></li>
            <li><a href="#" data-content="donations">Donations</a></li>
            <li><a href="#" data-content="collections">Collections</a></li>
            <li><a href="#" data-content="impact">Impact</a></li>
            <li><a href="#" data-content="connections">Connections</a></li>
        </ul>
    </aside>
    <!-- Main Content Section -->
    <div class="content-container">
    <div id="profile" class="content-section"><?php include 'profile.php'; ?></div>
    <div id="donations" class="content-section" style="display: none;"><?php include 'donations.php'; ?></div>
    <div id="collections" class="content-section" style="display: none;"><?php include 'collections.php'; ?></div>
    <div id="impact" class="content-section" style="display: none;"><?php include 'impact.php'; ?></div>
    <div id="connections" class="content-section" style="display: none;"><?php include 'connections.php'; ?></div>
    </div>
    </div>
    <script src="script.js" defer></script>
    <?php include 'footer.php'; ?>
</body>
</html>
