<?php

include_once "db_connect.php";

$user_id = $_SESSION['user_id'];
$user_passwd = $_SESSION['user_passwd'];
$permission = 0;
$sql = "SELECT * FROM users WHERE user_ID ='{$user_id}',user_Passwd='{$user_passwd}'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 0) {
    $row = mysqli_fetch_array($result);
    $user_ID = $row['user_ID'];
    $sql = "SELECT * FROM permission_check WHERE user_ID ='{$user_ID}'";
    $permission_check = mysqli_query($conn, $sql);
    if (mysqli_num_rows($permission_check) >= 0) {
        $per_row = mysqli_fetch_array($permission_check);
        $permission = $per_row['permission'];
        if ($permission == 1 or $permission == 2 or $permission == 3) {
            echo "<a class='nav-link fw-bold py-1 px-0' href='write_board.php'>글쓰기</a>";
        }
    }
}