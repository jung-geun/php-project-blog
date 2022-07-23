<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
if ($_SESSION['user_id'] != null) {

    echo "<script>alert('로그아웃 되었습니다');</script>";
    $_SESSION = array();
    session_destroy();
    echo "<script>location.href='index.php';</script>";
} else {
    echo "<script>alert('잘못된 접근입니다');</script>";
    echo "<script>location.href='index.php';</script>";
}