<?php
$user_name = null;
$user_id = null;
if (!session_id()) {
    session_start();
}
if (session_id())
    if ($_SESSION['user_name'] != null) {
        $user_name = $_SESSION['user_name'];
        $user_id = $_SESSION['user_id'];
    }
?>
<?php
// $page = $_GET['page'];
// require_once "layout.php"; // 레이아웃을 require 함
// echo "ajdjsalkjdlkasjdlksj";
// $base = new Layout; // Layout class 객체를 생성

// $base->csslink = 'css/indexstyle.css'; // css 파일의 주소
// $base->csslink = './bootstrap/css/bootstrap.css'; // css 파일의 주소

// $base->content = "content";

// $base->LayoutMain();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>PieRoot</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/"> -->

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <? include_once "header.php"; ?>

        <main class="px-3">
            <h1>여긴 개인 블로그 입니다</h1>
            <p class="lead">공부하고 배운 각종 지식들과 자료들을 업로드하고 관리하는 블로그입니다.</p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
            </p>
        </main>


        <? include_once "footer.php"; ?>
    </div>

</body>

</html>