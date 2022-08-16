<?php
if (!session_id()) {
    session_start();
}
header("Content-Type: text/html; charset=UTF-8");

if ($_SESSION['user_id'] == "") {
    include "db/db_connect.php";

    $db_conn = new db_conn();

    $user_id = $_POST['user_id'];
    $password = $_POST['user_pw'];

    $result = $db_conn->get_ID($user_id, $password);

    if ($result == 1) {
        echo "<script>location.href='/';</script>";
    } else if ($result == -1) {
        echo "<script>alert('아이디를 다시 입력하세요');</script>";
        echo "<script>location.href='login';</script>";
    } else if ($result == -2) {
        $_SESSION = array();
        session_destroy();
        echo "<script>alert('비밀번호를 다시 입력하세요');</script>";
        echo "<script>history.back();</script>";
    }
} else {
    echo "<script>alert('이미 로그인 되어 있습니다');</script>";
    echo "<script>location.href='/';</script>";
}
