<?php
$sql = "select id, postid, depth, content, writer, password from comment 
        where id = depth and postid = " . $id;
$result = $db->query($sql);
?>
<div id="commentView">
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
    <ul class="oneDepth">
        <li>
            <div>
                <span>Writer: <?php echo $row["id"]?></span>
                <p><?php echo $row["content"]?></p>
            </div>
            <?php
            $subSql = "select id, postid, depth, content, writer, password from comment
                       where id != depth and depth = " . $row["id"];
            $subResult = $db->query($subSql);
            while ($subRow = $subResult->fetch_assoc()) {
                ?>
                <ul class="twoDepth">
                    <li>
                        <div>
                            <span>Writer: <?php echo $subRow["writer"] ?></span>
                            <p><?php echo $subRow["content"] ?></p>
                        </div>
                    </li>
                </ul>
                <?php
            }
            ?>
        </li>
    </ul>
    <?php }?>
</div>
<form action="comment_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <table>
        <tbody>
            <tr>
                <th scope="row"><label for="coId">writer</label></th>
                <td><input type="text" name="writer" id="writer"></td>
            </tr>
            <tr>
                <th scope="row">
                <label for="coPassword">password</label></th>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <th scope="row"><label for="content">내용</label></th>
                <td><textarea name="content" id="content"></textarea></td>
            </tr>
        </tbody>
    </table>
    <div class="btnSet">
        <input type="submit" value="comment">
    </div>
</form>
