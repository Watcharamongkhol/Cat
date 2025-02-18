<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    $query = "SELECT * FROM CatBreeds WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo "<h4>" . htmlspecialchars($row['name_th']) . " (" . htmlspecialchars($row['name_en']) . ")</h4>";
        echo "<p><strong>คำอธิบาย:</strong> " . nl2br(htmlspecialchars($row['description'])) . "</p>";
        echo "<p><strong>ลักษณะทั่วไป:</strong> " . nl2br(htmlspecialchars($row['characteristics'])) . "</p>";
        echo "<p><strong>คำแนะนำการเลี้ยงดู:</strong> " . nl2br(htmlspecialchars($row['care_instructions'])) . "</p>";
        if (!empty($row['image_url'])) {
            echo "<img src='" . htmlspecialchars($row['image_url']) . "' class='img-fluid' style='max-width: 100%; border-radius: 10px;'>";
        }
    } else {
        echo "<p class='text-danger'>❌ ไม่พบข้อมูล</p>";
    }
    
    $stmt->close();
}
?>
