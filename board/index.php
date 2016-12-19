<?php
require_once("../dbconfig.php");

define("ONE_PAGE_POSTS", 5);
define("ONE_SECTION", 5);


if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$searchCategory = "";
$subString = "";
if (isset($_GET["searchCategory"])) {
    $searchCategory = $_GET["searchCategory"];
    $subString .= '&amp;searchCategory=' . $searchCategory;
}

if (isset($_GET["searchText"])) {
    $searchText = $_GET["searchText"];
    $subString .= '&amp;searchText=' . $searchText;
}

$isValidSearchOption = isset($searchCategory) && isset($searchText);
$searchSql = "";
if ($isValidSearchOption) {
    $searchSql = ' where ' . $searchCategory . ' like "%' . $searchText . '%"';
}

$sql = "select count(*) as cnt from board" . $searchSql;
$result = $db->query($sql);
$row = $result->fetch_assoc();

$allPost = $row["cnt"];
$allPage = ceil($allPost / ONE_PAGE_POSTS);

$isOutOfBound = (1>$page) && $page > $allPage;
if ($isOutOfBound) {
    ?>
    <script>
        alert("page does not exist");
        history.go(-1);
    </script>
    <?php
    exit;
}

$currentSection = ceil($page / ONE_SECTION);
$allSection = ceil($allPage / ONE_SECTION);
$firstPage = ($currentSection * ONE_SECTION)  - (ONE_SECTION -1);

$lastPage = ($currentSection == $allSection) ? $allPage : $currentSection * ONE_SECTION;
$prevPage = ($currentSection - 1) * ONE_SECTION;
$nextPage = (($currentSection + 1) * ONE_SECTION) - (ONE_SECTION - 1);

$paging = "<ul>";

if($page != 1) {
    $paging .= '<li class="page page_start"><a href="./index.php?page=1' . $subString . '">first</a></li>';
}
if($currentSection != 1) {
    $paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . $subString . '">prev</a></li>';
}

for($i = $firstPage; $i <= $lastPage; $i++) {
    if($i == $page) {
        $paging .= '<li class="page current">' . $i . '</li>';
    } else {
        $paging .= '<li class="page"><a href="./index.php?page=' . $i . $subString . '">' . $i . '</a></li>';

    }
}

if($currentSection != $allSection) {
    $paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . $subString . '">next</a></li>';

}

if($page != $allPage) {
    $paging .= '<li class="page page_end"><a href="./index.php?page=' . $allPage . $subString . '">last</a></li>';

}
$paging .= '</ul>';

$currentLimit = (ONE_PAGE_POSTS * $page) - ONE_PAGE_POSTS;
$sqlLimit = ' limit ' . $currentLimit . ', ' . ONE_PAGE_POSTS;

$sql = 'select * from board ' . $searchSql . ' order by id desc' . $sqlLimit;
$result = $db->query($sql);
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
    <div id="boardList">
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
        while ($row = $result->fetch_assoc())
        {
            $datetime = explode(' ', $row['date']);
            $date = $datetime[0];
            $time = $datetime[1];
            if ($date == Date('Y-m-d')) {
                $row['date'] = $time;
            } else {
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
    <div class="paging">
        <?php echo $paging ?>
    </div>
    <div class="searchBox">
        <form action="./index.php" method="get">
            <select name="searchCategory">
                <option <?php echo $searchCategory=='title'?'selected="selected"':null?> value="title">title</option>
                <option <?php echo $searchCategory=='content'?'selected="selected"':null?> value="content">content</option>
                <option <?php echo $searchCategory=='writer'?'selected="selected"':null?> value="writer">writer</option>
            </select>
            <input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
            <button type="submit">search</button>
        </form>
    </div>
    </div>
</article>
</body>
</html>