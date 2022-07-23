<?php
require_once "db/db_connect.php";
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

            </div>

            <h1>여긴 개인 블로그 입니다</h1>
            <p class="lead"> 공부하고 배운 각종 지식들과 자료들을 업로드하고 관리하는 블로그입니다.</p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
            </p>

        </main>

        <?php include_once 'footer.php'; ?>
    </div>

</body>

</html>