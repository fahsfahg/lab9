<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>
    <div style="display:flex">
        <div style="padding: 15px">
            <h2><?= $row["username"] ?></h2>
            <?= $row["name"] ?><br>
            <?= $row["address"] ?><br>
            <?= $row["email"] ?>
            <?= $row["mobile"] ?>
        </div>
    </div>
</body>

</html>