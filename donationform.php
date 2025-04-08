<!-- Donation Form Modal -->
<div id="donation-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Donate an Item</h2>
        <form action="submit_donation.php" method="POST">
            <label for="post_title">Title:</label>
            <input type="text" id="post_title" name="post_title" required>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
            <label for="pick_up_location">Pick-up Location:</label>
            <input type="text" id="pick_up_location" name="pick_up_location" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="item_id">Select Item:</label>
            <input list="items" name="item_id" required>
            <datalist id="items">
                <?php
                include 'db.php';
                $query = "SELECT item_id, item_name FROM items";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['item_id']}'>{$row['item_name']}</option>";
                }
                ?>
            </datalist>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>



