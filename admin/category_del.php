<?php
include_once 'per_check.php';
$id = null;
$name = null;
$id = $_GET['id'];
$name = $_GET['name'];
if ($id == null or $name == null) {
    echo "<script>alert('삭제할 카테고리를 선택해주세요.'); history.back();</script>";
    exit;
}

require_once '../db/db_connect.php';

$db_conn = new db_conn();
$result = $db_conn->category_del($id, $name);
if ($result == 1) {
    echo "<script>alert('삭제되었습니다.'); location.href='category_plus.php';</script>";
} else if ($result == -1) {
    echo "<script>alert('삭제에 실패했습니다.'); history.back();</script>";
} else {
    echo "<script>alert('삭제에 실패했습니다.'); history.back();</script>";
}
