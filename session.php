<?php
header("Content-Type: text/html; charset=UTF-8");

$co_id = $_GET['id'];
$co_name = $_GET['name'];
if (($_SESSION['user_id'] == $_COOKIE['user_id']) == $co_id) {
    $_COOKIE['user_id'] = $co_id;
}

$_SESSION['ss_name'] = $_GET['name'];
$_SESSION['ss_id'] = $_GET['id'];
?>
<meta http-equiv="refresh"
    content="1140; url=session.php?name=<?= $_SESSION('ss_name') ?> &id=<?= $_SESSION('ss_id') ?>">