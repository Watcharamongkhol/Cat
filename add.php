<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_th = $_POST["name_th"];
    $name_en = $_POST["name_en"];
    $description = $_POST["description"];
    $characteristics = $_POST["characteristics"];
    $care_instructions = $_POST["care_instructions"];
    $image_url = $_POST["image_url"];
    $is_visible = isset($_POST["is_visible"]) ? 1 : 0;

    $sql = "INSERT INTO CatBreeds (name_th, name_en, description, characteristics, care_instructions, image_url, is_visible) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name_th, $name_en, $description, $characteristics, $care_instructions, $image_url, $is_visible);

    if ($stmt->execute()) {
        echo "<script>alert('✅ เพิ่มข้อมูลสำเร็จ!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('❌ เกิดข้อผิดพลาด กรุณาลองใหม่');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสายพันธุ์แมว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="text-center mb-4">➕ เพิ่มสายพันธุ์แมว</h2>
    
    <div class="card shadow p-4">
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">ชื่อสายพันธุ์ (ภาษาไทย)</label>
                <input type="text" class="form-control" name="name_th" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ชื่อสายพันธุ์ (ภาษาอังกฤษ)</label>
                <input type="text" class="form-control" name="name_en" required>
            </div>

            <div class="mb-3">
                <label class="form-label">คำอธิบาย</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">ลักษณะทั่วไป</label>
                <textarea class="form-control" name="characteristics" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">คำแนะนำการเลี้ยงดู</label>
                <textarea class="form-control" name="care_instructions" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">URL รูปภาพ</label>
                <input type="text" class="form-control" name="image_url">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_visible" checked>
                <label class="form-check-label">แสดงผลข้อมูล</label>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">🔙 ย้อนกลับ</a>
                <button type="submit" class="btn btn-success">✅ บันทึก</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
