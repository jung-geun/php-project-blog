<?php
header("Content-Type: text/html; charset=utf-8");
if (session_id() == '') {
    session_start();
}
if (!isset($_SESSION['user_id']) or !$_SESSION['user_name']) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='login';</script>";
}
?>