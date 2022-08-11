<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
require_once "../db/db_connect.php";
$db_conn = new db_conn();
if (isset($_SESSION['user_id'])) {
    $permission = $db_conn->Permission_check($_SESSION['user_id'], $_SESSION['user_passwd']);
    if (!($permission == 2 or $permission == 3)) {
        echo "<script>alert('권한이 없습니다');</script>";
        echo "<script>location.href='/';</script>";
    }
} else {
    echo "<script>alert('로그인이 필요합니다');</script>";
    echo "<script>location.href='/login';</script>";
}