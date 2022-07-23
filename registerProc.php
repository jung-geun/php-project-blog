<?php
header("Content-Type: text/html; charset=UTF-8");
try {
    include_once "db_connect.php";

    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $reg_this_date = date('Y-m-j H:m:s');
    $password = $_POST['user_passwd'];
    $password = $password . $reg_this_date;
    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
    if (password_verify($password, $hashedPassword)) {
        $sql = "INSERT INTO users(user_ID, user_Passwd, user_Name, user_Email, user_Regdate)  VALUES('{$user_id}','{$hashedPassword}','{$user_name}','{$user_email}','{$reg_this_date}')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('회원가입 성공!');</script>";
            echo "<script>location.href='login.php';</script>";
        } else {
            echo "<script>alert('회원가입 실패!');</script>";
            echo "<script>location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('회원가입 실패!');</script>";
        echo "<script>location.href='login.php';</script>";
    }
} catch (Exception $e) {
    $errormessage = $e;
    // echo $errormessage;
}