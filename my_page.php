<?php
session_start();
require_once "db/db_connect.php";
$db_conn = new db_conn();
$permission = $db_conn->Permission_check($_SESSION['user_id'], $_SESSION['user_passwd']);
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>PieRoot</title>


    <link href="/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?php include_once 'header.php'; ?>

        <main class="px-3">
            <div>
                <p>
                    내 정보
                </p>
                <?php
                if ($permission == 2 or $permission == 3) {
                    echo "<a href='/admin/'>관리자 페이지</a>";
                }
                ?>

            </div>



        </main>

        <?php include_once 'footer.php'; ?>
    </div>

</body>

</html>