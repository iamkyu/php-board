<?php
require_once("../dbconfig.php");

$id = $_POST["id"];
$password = $_POST["password"];
$title = $_POST["title"];
$content = $_POST["content"];
$date = date("Y-m-d H:i:s");

$sql = "insert into board (id, title, content, date, hit, writer, password) 
    values(null, '$title', '$content', '$date', 0, '$id', password('$password'))";

$result = $db->query($sql);
$msg;
if ($result)
{
    $msg = "success";
    $insertId = $db->insert_id;
    $replaceURL = './view.php?id=' . $insertId;
}
else
{
    $msg = "fail";
?>

<script>
    alert("<?php echo $msg?>");
    debugger;
    history.go(-1);
</script>

<?php
}
?>

<script>
    alert("<?php echo $msg?>");
    location.replace("<?php echo $replaceURL?>");
</script>
