<?php
header("Content-Type: text/html; charset=utf-8");
echo "<xmp>";
print_r($_POST);
$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_POST['user_id'];
mkdir("./data/$user_id", 0755);

?>
<!-- <script>
location.href = "board_list";
</script> -->