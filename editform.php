<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); 
$stmt->execute(); 
$row = $stmt->fetch(); 
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <form action="cfupdate.php" method="post">
        <input type="hidden" name="username" value="<?= $row["username"] ?>">
        ชื่อสมาชิก : <input type="text" name="name" value="<?= $row["name"] ?>"><br>
        ที่อยู่ : <br>
        <textarea name="address" rows="3" cols="40"><?= $row["address"] ?></textarea><br>
        อีเมล์ : <input type="email" name="email" value="<?= $row["email"] ?>"><br>
        หมายเลขโทรศัพท์ : <input type="text" name="mobile" value="<?= $row["mobile"] ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>