<?php
date_default_timezone_set('Asia/Seoul');
$date = date('Y-m-j H:m:s');

/* 서버내의 실제 파일 저장경로 */
$uploadBase = '/drive/www/web/data/imgs/';

/* src에 찍어줄 경로 */
$uploadUrlBase = '/api/get_image/';
$idx = 0;
$result = array();



foreach ($_FILES['file']['name'] as $f => $name) {
    $idx++;
    $name = $_FILES['file']['name'][$f];

    $exploded_file = explode(".", $name);
    $file_extension = array_pop($exploded_file);    //파일 확장자

    $thisName = $admin_session . $date . $idx . "." . $file_extension;
    $uploadFile = $uploadBase . $thisName;
    if (move_uploaded_file($_FILES['file']['tmp_name'][$f], $uploadFile)) {
        array_push($result, $uploadUrlBase . $thisName);
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit;