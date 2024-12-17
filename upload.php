<?php
$accessToken = "nFbBigZfLbH5FIHLbeeOP4R70horE0g7cStcJIivefN"; // แทนที่ด้วย Access Token ของคุณ

function sendLineNotify($accessToken, $message = " ", $imagePath = null) {
    $url = "https://notify-api.line.me/api/notify";
    $headers = [
        "Authorization: Bearer " . $accessToken,
    ];

    // ตั้งค่า POST Data
    $postData = ['message' => $message ?: " "]; // หากข้อความว่างให้ใช้ค่าว่างแบบไม่ error

    if ($imagePath) {
        $postData['imageFile'] = new CURLFile($imagePath);
    }

    // ส่งข้อมูลผ่าน cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return ['response' => $response, 'status' => $httpCode];
}

// ตรวจสอบว่ามีการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'] ?? null; // รับข้อความ ถ้าไม่มีให้เป็น null
    $imagePath = null;

    // ตรวจสอบการอัปโหลดไฟล์
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // สร้างโฟลเดอร์หากยังไม่มี
        }
        $uploadedFilePath = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath)) {
            $imagePath = $uploadedFilePath; // เก็บ path ของไฟล์
        } else {
            echo "<div class='alert error'>Failed to upload image.</div>";
            exit;
        }
    }

    // หากไม่มีข้อความและรูปภาพให้หยุดทำงาน
    if (!$message && !$imagePath) {
        echo "<div class='alert error'>กรุณาใส่ข้อความหรืออัปโหลดรูปภาพอย่างน้อย 1 รายการ</div>";
        exit;
    }

    // ส่งข้อมูลไปยัง LINE Notify
    $result = sendLineNotify($accessToken, $message, $imagePath);

    // แสดงผลลัพธ์
    $response = json_decode($result['response'], true);
    if ($result['status'] == 200) {
        echo "<div class='alert success'>ส่งข้อมูลสำเร็จ!</div>";
    } else {
        echo "<div class='alert error'>เกิดข้อผิดพลาด: " . ($response['message'] ?? 'ไม่ทราบสาเหตุ') . "</div>";
    }
}
?>