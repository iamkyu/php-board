<?php
    require_once("../dbconfig.php");
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
    <table>
        <thead>
        <tr>
            <th scope="col" class="no">no</th>
            <th scope="col" class="title">title</th>
            <th scope="col" class="author">writer</th>
            <th scope="col" class="date">date</th>
            <th scope="col" class="hit">hit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = 'select * from board order by id desc';
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc())
        {
            $datetime = explode(' ', $row['date']);
            $date = $datetime[0];
            $time = $datetime[1];
            if ($date == Date('Y-m-d'))
            {
                $row['date'] = $time;
            }
            else
            {
                $row['date'] = $date;
            }
            ?>
            <tr>
                <td class="no"><?php echo $row['id']?></td>
                <td class="title"><a href="./view.php?id=<?php echo $row['id'] ?>"><?php echo $row['title']?></a></td>
                <td class="author"><?php echo $row['writer']?></td>
                <td class="date"><?php echo $row['date']?></td>
                <td class="hit"><?php echo $row['hit']?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="btnSet">
        <a href="write.php" class="btnList btn">wirte</a>
    </div>
</article>
</body>
</html>