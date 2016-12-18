<?php
require_once("../dbconfig.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
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
    <h3>Post Delete</h3>
    <?php
    if (isset($id)) {
        $sql ="select count(id) as cnt from board where id = '$id'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        if (empty($row["cnt"])) {
        ?>
        <script>
            alert("Do not exist");
            history.go(-1);
        </script>
        <?php
        exit;
        }

        $sql = "select title from board where id = '$id'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <div id="boardDelete">
        <form action="./delete_update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <table>
                <caption class="readHide">Post Delete</caption>
                <thead>
                <tr>
                    <th scope="col" colspan="2">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">title</th>
                    <td><?php echo $row['title']?></td>
                </tr>
                <tr>
                    <th scope="row"><label for="password">password</label></th>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                </tbody>
            </table>
            <div class="btnSet">
                <button type="submit" class="btnSubmit btn">delete</button>
                <a href="./index.php" class="btnList btn">return</a>
            </div>
        </form>
    </div>
    <?php
    //if (isset($id)) {
    } else {
    ?>
        <script>
            alert('정상적인 경로를 이용해주세요.');
            history.go(-1);
        </script>
        <?php
        exit;
    }
    ?>
</article>
</body>
</html>
