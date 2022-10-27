<?php
header("Content-Type: text/html; charset=UTF-8");
require_once "../db/db_connect.php";
$db_conn = new db_conn();

$editor = $_GET['editor'];
$board_id = $_GET['id'];

$result = $db_conn->post_delete($board_id, $editor);
if ($result == 1) {
    echo "<script>alert('삭제되었습니다');</script>";
    echo "<script>location.href='post_table';</script>";
} else if ($result == -1) {
    echo "<script>alert('삭제에 문제가 생겼습니다');</script>";
    echo "<script>history.back();</script>";
} else if ($result == -2) {
    echo "<script>alert('작성자가 다릅니다');</script>";
    echo "<script>history.back();</script>";
} else if ($result == -3) {
    echo "<script>alert('글을 찾지 못했습니다');</script>";
    echo "<script>history.back();</script>";
} else if ($result == -4) {
    echo "<script>alert('과정중 오류가 발생');</script>";
    echo "<script>history.back();</script>";
}

?>