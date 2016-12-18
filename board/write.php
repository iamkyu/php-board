<?php
require_once("../dbconfig.php");

if (isset($_GET["id"]))
{
    $id = $_GET["id"];
}

if (isset($id))
{
    $sql = "select id, title, content, date, hit, writer, password from board where id=" . $id;
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE HTML>
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
    <div id="boardWrite">
        <form action="./write_update.php" method="post">
            <?php
            if(isset($id)) {
                echo '<input type="hidden" name="id" value="' . $id . '">';
            }
            ?>
            <table id="boardWrite">
                <caption class="readHide">Free Board</caption>
                <tbody>
                <tr>
                    <th scope="row"><label for="id">writer</label></th>
                    <td class="writer">
                    <?php
                    if(isset($id)) {
                        echo $row["writer"];
                    } else { ?>
                        <input type="text" name="writer" id="writer"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th scope="row"><label for="password">password</label></th>
                    <td class="password"><input type="text" name="password" id="password"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="title">title</label></th>
                    <td class="title"><input type="text" name="title" id="title"
                                             value="<?php echo isset($row["title"])?$row["title"]:null?>"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="content">contents</label></th>
                    <td class="content">
                        <textarea name="content" id="content"><?php echo isset($row['content'])?$row['content']:null?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="btnSet">
                <button type="submit" class="btnSubmit btn"><?php echo isset($id)?'수정':'작성'?></button>
                <a href="index.php" class="btnList btn">list</a>
            </div>
        </form>
    </div>
</article>
</body>
</html>

