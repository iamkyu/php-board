<?php
require_once("../dbconfig.php");

$id = $_POST["id"];
$writer = $_POST["writer"];
$password = $_POST["password"];
$content = $_POST["content"];

$sql = 'insert into comment values(null, ' .$id . ', null, "' . $content . '", "' . $writer . '", password("' . $password . '"))';
$result = $db->query($sql);
$id = $db->insert_id;

$sql = 'update comment set depth = id where id = ' . $id;
$result = $db->query($sql);
if($result) {
    ?>
    <script>
        location.replace("./view.php?id=<?php echo $id?>");
    </script>
    <?php
}
?>


