<?php
header("Content-Type: text/html; charset=UTF-8");
if (session_id() == '') {
    session_start();
}
$id = null;
$id = $_GET['id'];
if ($id == null) {
    echo "<script>alert('잘못된 접근입니다.');</script>";
    echo "<script>location.href='post_lsit';</script>";
}
require_once "db/db_connect.php";
$db_conn = new db_conn();
$board = $db_conn->post_content($id);
$row = mysqli_fetch_assoc($board);
$content = $row['content'];

// $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <title>글 수정</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />


    <link rel="stylesheet" href="css/style.css">


</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?php include_once "header.php"; ?>
        <main class="px-3">
            <form action="writeProc" method="POST">

                <h1>게시글 수정</h1>
                <input name="title" id="inputTitle" placeholder="제목을 작성해주세요" />
                <div id="summernote"></div>
                <button class="btn btn-light">완료</button>
            </form>
        </main>

        <?php include "footer.php"; ?>

    </div>
  
    <script src="./js/post_summernote.js"></script>

    <script src="./js/board_write.js"></script>
</body>

</html>
<?php
?>