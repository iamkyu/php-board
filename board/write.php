<?php
    require_once("../dbconfig.php");
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
            <table id="boardWrite">
                <caption class="readHide">Free Board</caption>
                <tbody>
                <tr>
                    <th scope="row"><label for="id">writer</label></th>
                    <td class="id"><input type="text" name="id" id="id"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="password">password</label></th>
                    <td class="password"><input type="text" name="password" id="password"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="title">title</label></th>
                    <td class="title"><input type="text" name="title" id="title"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="content">contents</label></th>
                    <td class="content"><textarea name="content" id="content"></textarea></td>
                </tr>
                </tbody>
            </table>
            <div class="btnSet">
                <button type="submit" class="btnSubmit btn">submit</button>
                <a href="index.php" class="btnList btn">list</a>
            </div>
        </form>
    </div>
</article>
</body>
</html>

