<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "./db/db_connect.php";

$id = null;
$user_id = $_SESSION['user_id'];
if (!isset($_GET['id'])) {
    echo "<script>alert('잘못된 접근입니다');</script>";
    echo "<script>location.href='my_page.php';</script>";
} else {
    $id = $_GET['id'];
}
if (!isset($user_id)) {
    echo "<script>alert('로그인이 필요합니다');</script>";
    echo "<script>location.href='login.php';</script>";
}

$db_conn = new db_conn();

$result = $db_conn->board_delete($id, $user_id);
if ($result == -1) {
    echo "<script>alert('데이터가 존재 하지 않음');</script>";
    echo "<script>location.href='my_page';</script>";
} else if ($result == -2) {
    echo "<script>alert('계정 권한이 존재하지 않음');</script>";
    echo "<script>location.href='my_page';</script>";
} else if ($result == -3) {
    echo "<script>alert('해당 페이지가 존재하지 않음');</script>";
    echo "<script>location.href='my_page'</script>";
} else if ($result == -4) {
    echo "<script>alert('index db error');</script>";
    echo "<script>location.href='my_page';</script>";
} else if ($result == -5) {
    echo "<script>alert('db error');</script>";
    echo "<script>location.href='my_page';</script>";
} else if ($result == 1) {
    echo "<script>location.href='my_page';</script>";
} else {
    echo "<script>alert('오류');</script>";
    echo "<script>location.href='my_page';</script>";
}
