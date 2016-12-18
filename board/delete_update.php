<?php
require_once("../dbconfig.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

$password = $_POST["password"];

if (isset($id)) {
    $sql = "select count(password) as cnt from board where id = '$id' and password = password('$password')";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    if ($row["cnt"]) {
        $sql = "delete from board where id = '$id'";
    } else {
    ?>
        <script>
            alert("Dose not match password");
            history.go(-1);
        </script>
    <?php
        exit;
    }
}

$result = $db->query($sql);
if ($result) {
    $msg = "deleted";
    $replaceURL = './';
} else {
    $msg = "cant't delete the post";
    ?>
    <script>
        alert("<?php echo $msg?>");
        history.go(-1);
    </script>
<?php
    exit;
}
?>
<script>
    alert("<?php echo $msg?>");
    location.replace("<?php echo $replaceURL?>");
</script>
