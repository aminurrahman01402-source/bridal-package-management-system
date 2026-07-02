<?php include('db_connect.php'); $pkg_id = $_GET['id'] ?? ''; ?>
<form action="save_booking.php" method="POST" style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd;">
    <h2 style="color: #a18226;">Event Booking</h2>
    <input type="hidden" name="package_id" value="<?php echo $pkg_id; ?>">
    <input type="text" name="name" placeholder="Your Name" required style="width:100%; padding:10px; margin:10px 0;">
    <input type="text" name="phone" placeholder="Phone Number" required style="width:100%; padding:10px; margin:10px 0;">
    <input type="date" name="event_date" required style="width:100%; padding:10px; margin:10px 0;">
    <button type="submit" style="width:100%; padding:12px; background:#d1aa34; color:#fff; border:none;">Submit Booking</button>
</form>