<?php
header("Content-Type: text/html; charset=utf-8");
include_once "./db/db_connect.php";

$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_POST['user_id'];
$category = $_POST['category'];

$db_conn = new db_conn();


echo "<xmp>";
echo "\$_POST<br>";
print_r($_POST);
// echo "\$_FILES['upload_file']<br>";
// print_r($_FILES['upload_file']);

// $write_result = $db_conn->post_write($user_id, $title, $category, $content);
// print_r($write_result);

// echo "<script>consol.log('user_id > ',$user_id);</script>";

mkdir("./user_data/@$user_id", 0700);
mkdir("./user_data/@$user_id/$title", 0700);

$file_path = array();


foreach ($_FILES as $key => $value) {
    $file_name = $value['name'];
    $file_tmp_name = $value['tmp_name'];
    $file_size = $value['size'];
    $file_error = $value['error'];
    $file_type = $value['type'];

    foreach ($file_name as $key => $value) {
        $file_destination = './user_data/@' . $user_id . '/' . $title . '/' . $value;
        print_r($file_destination);
        $file_path[] = $file_destination;
        if (move_uploaded_file($file_tmp_name[$key], $file_destination)) {
            echo "파일 업로드 성공";
        } else {
            echo "파일 업로드 실패";
        }
    }

    $dir = './user_data/@' . $user_id . '/' . $title . '/';
    print_r(scandir($dir));
}

// if ($write_result == 1) {
//     echo "<script>location.href='post_list';</script>";
//     echo "<script>location.href='login.php';</script>";
// } else {
//     echo "<script>alert('작성에 문제가 생겼습니다');</script>";
//     echo "<script>history.back();</script>";
// }