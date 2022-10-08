<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "ชื่อสมาชิก : " . $row["name"] . "<br>";
        echo "ที่อยู่ : " . $row["address"] . "<br>";
        echo "อีเมล์ : " . $row["email"] . "<br>";
        echo "หมายเลขโทรศัพท์ : " . $row["mobile"] . "<br>";
        echo "<a href='editform.php?username=" . $row["username"] . "'>Edit</a>";
        echo "<hr>\n";
    }
    ?>
</body>

</html>