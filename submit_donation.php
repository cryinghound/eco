<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Error: User is not logged in."); // Prevents form submission without a valid user
}
$donor_user_id = $_SESSION['user_id']; // Assign user_id from session

// Capture Form Data
$post_title = $_POST['post_title'];
$quantity = $_POST['quantity'];
$pick_up_location = $_POST['pick_up_location'];
$description = $_POST['description'];
$item_id = $_POST['item_id'];
$post_date = date("Y-m-d"); // Get today's date

// Check for duplicate entry
$check_query = "SELECT * FROM postings WHERE post_title = ? AND quantity = ? AND pick_up_location = ? AND post_date = ?";
$stmt = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($stmt, "siss", $post_title, $quantity, $pick_up_location, $post_date);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "Error: A similar donation post already exists.";
} else {
    // Fetch item point value
    $item_query = "SELECT item_point FROM items WHERE item_id = ?";
    $stmt = mysqli_prepare($conn, $item_query);
    mysqli_stmt_bind_param($stmt, "i", $item_id);
    mysqli_stmt_execute($stmt);
    $item_result = mysqli_stmt_get_result($stmt);
    $item_row = mysqli_fetch_assoc($item_result);
    $score = $quantity * $item_row['item_point']; // Calculate score

    // Insert into postings table
    $insert_query = "INSERT INTO postings (donor_user_id, post_status, post_date, item_id, quantity, pick_up_location, score, post_title, description) VALUES (?, 'new', ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($stmt, "issiiisss", $donor_user_id, $post_date, $item_id, $quantity, $pick_up_location, $score, $post_title, $description);
    mysqli_stmt_execute($stmt);
    $posting_id = mysqli_insert_id($conn); // Get inserted ID

    // Insert into postings_audit table
    $audit_query = "INSERT INTO postings_audit (transaction_id, donor_user_id, post_status, post_date, item_id, approval_date, quantity, pick_up_location, score, post_title, description, transaction_date, change_status) VALUES (?, ?, 'new', ?, ?, NULL, ?, ?, ?, ?, ?, ?, 'User_posted')";
    $stmt = mysqli_prepare($conn, $audit_query);
    $transaction_date = date("Y-m-d H:i:s");
    mysqli_stmt_bind_param($stmt, "iissiiissss", $posting_id, $donor_user_id, $post_date, $item_id, $quantity, $pick_up_location, $score, $post_title, $description, $transaction_date);
    mysqli_stmt_execute($stmt);

    echo "Donation post successfully added!";
}
?>