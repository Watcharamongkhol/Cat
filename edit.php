<?php
include '../config/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM CatBreeds WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_th = $_POST['name_th'];
    $name_en = $_POST['name_en'];
    $description = $_POST['description'];
    $is_visible = isset($_POST['is_visible']) ? 1 : 0;

    $sql = "UPDATE CatBreeds SET name_th='$name_th', name_en='$name_en', description='$description', is_visible='$is_visible' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    ชื่อไทย: <input type="text" name="name_th" value="<?= $row['name_th']; ?>" required><br>
    ชื่ออังกฤษ: <input type="text" name="name_en" value="<?= $row['name_en']; ?>" required><br>
    คำอธิบาย: <textarea name="description"><?= $row['description']; ?></textarea><br>
    แสดงผล? <input type="checkbox" name="is_visible" <?= $row['is_visible'] ? 'checked' : ''; ?>><br>
    <button type="submit">บันทึก</button>
</form>
