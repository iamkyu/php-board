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
