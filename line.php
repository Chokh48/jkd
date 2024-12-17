<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปโหลดและส่งข้อความไป LINE Notify</title>
    <link rel="icon" type="image/x-icon" href="fatman.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- ส่วนของ header หรือเมนู -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="shop.php">ร้านค้า</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>อัปโหลดรูปภาพหรือส่งข้อความไปที่ LINE Notify</h1>

        <!-- ฟอร์มสำหรับกรอกข้อความและอัปโหลดไฟล์ -->
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <label for="message">ข้อความ: </label>
            <textarea name="message" rows="4" cols="50" placeholder="กรอกข้อความของคุณที่นี่..."></textarea><br><br>

            <label for="image">เลือกภาพที่ต้องการอัปโหลด: </label>
            <input type="file" name="image" accept="image/*"><br><br>

            <button type="submit">อัปโหลดและส่ง</button>
        </form>

        <!-- ปุ่มกลับไปหน้าหลัก -->
        <div class="back-button">
            <a href="index.php" class="button">กลับไปหน้าหลัก</a>
        </div>
    </div>

    <footer>
        <p>© 2024 เว็บไซต์ของเรา</p>
    </footer>
</body>
</html>
