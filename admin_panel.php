<?php include('db_connect.php'); 
if(isset($_POST['add_pkg'])){
    $t = $_POST['title']; $p = $_POST['price']; $f = $_POST['features'];
    $conn->query("INSERT INTO bridal_packages (package_title, price, features) VALUES ('$t', '$p', '$f')");
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .box { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        input, textarea { width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; }
        button { background: #d1aa34; color: #fff; border: none; padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Add New Bridal Package</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Package Title" required>
            <input type="number" name="price" placeholder="Price (BDT)" required>
            <textarea name="features" placeholder="Features (comma separated)"></textarea>
            <button type="submit" name="add_pkg">Save Package</button>
        </form>
    </div>

    <div class="box">
        <h2>Booking Requests</h2>
        <table>
            <tr><th>Client</th><th>Phone</th><th>Date</th><th>Package</th></tr>
            <?php
            $res = $conn->query("SELECT b.*, p.package_title FROM bridal_bookings b LEFT JOIN bridal_packages p ON b.package_id = p.id ORDER BY b.id DESC");
            while($row = $res->fetch_assoc()){
                echo "<tr><td>{$row['client_name']}</td><td>{$row['client_phone']}</td><td>{$row['event_date']}</td><td>{$row['package_title']}</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>