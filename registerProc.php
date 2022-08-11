<?php
header("Content-Type: text/html; charset=UTF-8");
try {
    require_once "db/db_connect.php";
    $db = new db_conn();

    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $user_passwd = $_POST['user_passwd'];

    $result_check = $db->use_id_check($user_id, $user_email);

    if ($result_check == 1) {
        $result_reg = $db->register_user($user_name, $user_id, $user_email, $user_passwd);
        echo "되냐?<br>";
        if ($result_reg == 1) {
            // echo "<script>alert('회원가입 성공!');</script>";
            echo "<script>location.href='login.php';</script>";
        } else if ($result_reg == -1) {
            // echo "<script>alert('회원가입 실패!');</script>";
            echo "<script>location.href='login.php';</script>";
        }
    } else if ($result_check == -1) {
        echo "<script>alert('사용중인 아이디 입니다');</script>";
        echo "<script>history.back();</script>";
    } else if ($result_check == -2) {
        echo "<script>alert('사용중인 이메일 입니다');</script>";
        echo "<script>history.back();</script>";
    }
} catch (Exception $e) {
    $errormessage = $e;
    // echo $errormessage;
}