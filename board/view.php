<?php
require_once("../dbconfig.php");

$id = $_GET["id"];
$sql = "select id, title, content, date, hit, writer, password from board where id=" . $id;
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Free Board</title>
    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./css/board.css" />
</head>
<body>
<article class="boardArticle">
    <h3>Free Board</h3>
    <div id="boardView">
        <h3 id="boardTitle"><?php echo $row['title']?></h3>
        <div id="boardInfo">
            <span id="boardID">writer: <?php echo $row["writer"]?></span>
            <span id="boardDate">date: <?php echo $row["date"]?></span>
            <span id="boardHit">hit: <?php echo $row["hit"]?></span>
        </div>
        <div id="boardContent"><?php echo $row["content"]?></div>
    </div>
    <div class="btnSet">
        <a href="./write.php?id=<?php echo $id?>">수정</a>
        <a href="./delete.php?id=<?php echo $id?>">삭제</a>
        <a href="./">목록</a>
    </div>
</article>
</body>
</html>

