<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านค้าออนไลน์</title>
    <link rel="icon" type="image/x-icon" href="fatman.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- ส่วนของ header หรือเมนู -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="line.php">ส่งแชทผ่าน LINE</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>ยินดีต้อนรับสู่ร้านค้าออนไลน์</h1>

        <!-- ส่วนของรายการสินค้ากริด -->
        <div class="product-grid">
            <!-- สินค้าชิ้นที่ 1 -->
            <div class="product-card">
                <img src="uploads/kuy.jpg" alt="Product 1">
                <h2>ชื่อสินค้า 1</h2>
                <p>ราคาสินค้า: 299 บาท</p>
                <a href="product-detail.php?id=1" class="btn">ดูรายละเอียด</a>
                <a href="cart.php" class="btn btn-buy">ซื้อเลย</a>
            </div>

            <!-- สินค้าชิ้นที่ 2 -->
            <div class="product-card">
                <img src="uploads/poom.jpg" alt="Product 2">
                <h2>ชื่อสินค้า 2</h2>
                <p>ราคาสินค้า: 399 บาท</p>
                <a href="product-detail.php?id=2" class="btn">ดูรายละเอียด</a>
                <a href="cart.php" class="btn btn-buy">ซื้อเลย</a>
            </div>

            <!-- สินค้าชิ้นที่ 3 -->
            <div class="product-card">
                <img src="uploads/ngo.jpg" alt="Product 3">
                <h2>ชื่อสินค้า 3</h2>
                <p>ราคาสินค้า: 499 บาท</p>
                <a href="product-detail.php?id=3" class="btn">ดูรายละเอียด</a>
                <a href="cart.php" class="btn btn-buy">ซื้อเลย</a>
            </div>

            <!-- สินค้าชิ้นที่ 4 -->
            <div class="product-card">
                <img src="uploads/dear.jpg"alt="Product 4">
                <h2>ชื่อสินค้า 4</h2>
                <p>ราคาสินค้า: 199 บาท</p>
                <a href="product-detail.php?id=4" class="btn">ดูรายละเอียด</a>
                <a href="cart.php" class="btn btn-buy">ซื้อเลย</a>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 ร้านค้าออนไลน์ของเรา</p>
    </footer>
</body>
</html>
