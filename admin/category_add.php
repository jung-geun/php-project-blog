<?php
header("Content-Type: text/html; charset=UTF-8");
if (!isset($_POST['category'])) {
    echo "<script>alert('잘못된 접근입니다');history.back();</script>";
} else {
    require_once "../db/db_connect.php";
    $db_conn = new db_conn();

    $category = $_POST['category'];
    $result = $db_conn->use_category($category);

    if ($result == 1) {
        echo "<script>alert('이미 존재하는 카테고리입니다.');history.back();</script>";
    } else if ($result == -1) {
        $result = $db_conn->category_add($category);
        if ($result == 1) {
            echo "<script>alert('카테고리가 추가되었습니다.');location.href='category_plus.php';</script>";
        } else {
            echo "<script>alert('카테고리 추가에 실패하였습니다.');history.back();</script>";
        }
    } else {
        echo "<script>alert('카테고리 추가에 실패하였습니다.');history.back();</script>";
    }
}
