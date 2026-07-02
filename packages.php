<?php include('db_connect.php'); ?>
<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 50px;">
    <?php
    $res = $conn->query("SELECT * FROM bridal_packages WHERE status='Active'");
    while($pkg = $res->fetch_assoc()){
    ?>
    <div style="border: 2px solid #d1aa34; padding: 20px; width: 280px; text-align: center; background: #fff;">
        <h3 style="color: #a18226;"><?php echo $pkg['package_title']; ?></h3>
        <p style="font-size: 24px; font-weight: bold;">৳ <?php echo number_format($pkg['price']); ?></p>
        <ul style="text-align: left; font-size: 14px; color: #666;">
            <?php foreach(explode(",", $pkg['features']) as $f) echo "<li>".trim($f)."</li>"; ?>
        </ul>
        <a href="booking_form.php?id=<?php echo $pkg['id']; ?>" style="background: #d1aa34; color: #fff; padding: 10px 20px; text-decoration: none; display: block; margin-top: 10px;">Book Now</a>
    </div>
    <?php } ?>
</div>