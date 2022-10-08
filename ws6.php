<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<html>

<head>
    <meta charset="utf-8">
    <script>
        function confirmDelete(username) {
            var ans = confirm("ต้องการลบ username : " + username);
            if (ans == true) {
                document.location = "cfdelete.php?username=" + username;
            }
        }
    </script>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) :
    ?>
        ชื่อสมาชิก : <?= $row["name"] ?><br>
        ที่อยู่ : <?= $row["address"] ?><br>
        อีเมล์ :<?= $row["email"] ?><br>
        <a href='#' onclick='confirmDelete("<?= $row["username"] ?>")'>Delete</a>
        <hr><br>
    <?php endwhile; ?>
</body>

</html>