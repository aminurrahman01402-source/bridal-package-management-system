<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bridal Harmony | Premium Packages</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #fdfaf4; margin: 0; }
        .hero { text-align: center; padding: 60px 20px; background: #fff; border-bottom: 2px solid #eecb6b; }
        .hero h1 { font-family: 'Playfair Display', serif; color: #a18226; font-size: 42px; }
        .container { display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 50px 10px; }
        .card { background: #fff; width: 320px; border: 1px solid #d4af37; border-radius: 15px; padding: 30px; text-align: center; transition: 0.3s; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .card h3 { font-family: 'Playfair Display', serif; color: #a18226; font-size: 28px; }
        .price { font-size: 32px; font-weight: 600; margin: 20px 0; color: #333; }
        .features { list-style: none; padding: 0; text-align: left; margin-bottom: 30px; }
        .features li { padding: 10px 0; border-bottom: 1px solid #eee; font-size: 14px; color: #666; }
        .features li i { color: #d4af37; margin-right: 10px; }
        .btn { background: #d4af37; color: #fff; padding: 12px 30px; text-decoration: none; border-radius: 25px; font-weight: 600; display: inline-block; transition: 0.3s; }
        .btn:hover { background: #333; }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Our Wedding Packages</h1>
        <p>Premium photography and cinematography services for your big day.</p>
    </div>

    <div class="container">
        <?php
        $res = $conn->query("SELECT * FROM packages WHERE status='Active'");
        while($row = $res->fetch_assoc()){
        ?>
        <div class="card">
            <h3><?php echo $row['name']; ?></h3>
            <div class="price">৳ <?php echo number_format($row['price']); ?></div>
            <ul class="features">
                <?php 
                $feats = explode(",", $row['features']);
                foreach($feats as $f) echo "<li><i class='fas fa-check-circle'></i> ".trim($f)."</li>";
                ?>
            </ul>
            <a href="booking.php?id=<?php echo $row['id']; ?>" class="btn">Select Package</a>
        </div>
        <?php } ?>
    </div>
</body>
</html>