<?php
header("Content-Type: text/html; charset=utf-8");
include_once "./db/db_connect.php";
// echo "<xmp>";
print_r($_POST);
$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_POST['user_id'];
$category = $_POST['category'];

$db_conn = new db_conn();

$write_result = $db_conn->board_write($user_id, $title, $category, $content);

if ($write_result == 1) {
    echo "<script>location.href='board_list';</script>";
    echo "<script>location.href='login.php';</script>";
} else {
    echo "<script>alert('작성에 문제가 생겼습니다');</script>";
    echo "<script>history.back();</script>";
}

print_r($write_result);

mkdir("./data/$user_id", 0700);

if (!empty($_POST['upload_file'])) {
    // print_r($_POST['upload_file']);
    $up_files = $_POST['upload_file'];
    // $files = explode(",", $files);
    foreach ($up_files as $file) {
        $file_name = explode(".", $file);
        // echo $file_name[0] . "<br>";
        $enc_name = urlencode($file_name[0]);
        $enc_name = base64_encode($enc_name);
        $file = "./data/$user_id/$enc_name.$file_name[1]";
        echo "되냐?";
        echo $file . "<br>";
        if (!file_exists($file)) {
            echo "되냐?";
            $t = move_uploaded_file($_FILES['upload_file']['tmp_name'], $file);
            echo "$t 되냐?";
        }
    }
}