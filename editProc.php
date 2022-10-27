<?php
header("Content-Type: text/html; charset=utf-8");
include_once "./db/db_connect.php";

$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_POST['user_id'];
$category = $_POST['category'];
$id = $_POST['post_id'];

$db_conn = new db_conn();


// echo "<xmp>";
echo "\$_POST<br>";
print_r($_POST);
echo "\$_FILES['upload_file']<br>";
print_r($_FILES['upload_file']);

$write_result = $db_conn->post_write($user_id, $title, $category, $content);
print_r($write_result);

echo "<script>consol.log('user_id > ',$user_id);</script>";

mkdir("./user_data/@$user_id", 0700);

$file_path = array();

if ($write_result == 1) {
    echo "<script>location.href='post_list';</script>";
    echo "<script>location.href='login.php';</script>";
} else {
    echo "<script>alert('작성에 문제가 생겼습니다');</script>";
    echo "<script>history.back();</script>";
}

foreach ($_FILES as $key => $value) {
    $file_name = $value['name'];
    $file_tmp_name = $value['tmp_name'];
    $file_size = $value['size'];
    $file_error = $value['error'];
    $file_type = $value['type'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $file_name = uniqid() . '.' . $file_ext;
    $file_destination = './user_data/@' . $user_id . '/' . $file_name;
    print_r($file_destination);
    move_uploaded_file($file_tmp_name, $file_destination);
}



// if (!empty($_POST['upload_file'])) {
//     // print_r($_POST['upload_file']);
//     $up_files = $_POST['upload_file'];
//     // $files = explode(",", $files);
//     foreach ($up_files as $file) {
//         $file_name = explode(".", $file);
//         // echo $file_name[0] . "<br>";
//         $enc_name = urlencode($file_name[0]);
//         $enc_name = base64_encode($enc_name);
//         $file = "./data/$user_id/$enc_name.$file_name[1]";
//         echo "되냐?";
//         echo $file . "<br>";
//         if (!file_exists($file)) {
//             echo "되냐?";
//             $t = move_uploaded_file($_FILES['upload_file']['tmp_name'], $file);
//             echo "$t 되냐?";
//         }
//     }
// }
