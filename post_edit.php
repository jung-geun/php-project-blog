<?php
header("Content-Type: text/html; charset=UTF-8");
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

if (session_id() == '') {
    session_start();
}

$id = null;
$id = $_GET['id'];
if (preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
    echo "<script>location.href='boarde?id=$id';</script>";
}

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='login';</script>";
}

if ($id == null) {
    echo "<script>alert('잘못된 접근입니다.');</script>";
    echo "<script>location.href='post_list';</script>";
}

require_once "db/db_connect.php";
$db_conn = new db_conn();
$board = $db_conn->post_content($id);
if ($board == -1) {
    echo "<script>alert('잘못된 접근입니다.');</script>";
    echo "<script>location.href='post_list';</script>";
}

$row = mysqli_fetch_assoc($board);
$content = $row['content'];

// $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <title>글 수정</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM08im8;'222222222222222wu8+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">


</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 p-3 mx-auto flex-column">
        <?php include_once "header.php"; ?>
        <main class="px-3">
            <form action="editProc" method="POST">

                <h1>게시글 수정</h1>
                <input name="title" id="inputTitle" placeholder="제목을 작성해주세요" value="<?= $row['title'] ?>" />
                <textarea id="summernote" name="content"><?= $row['content'] ?></textarea>
                <input type="hidden" name="post_id" value="<?= $row['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $row['editor'] ?>">
                <input type="hidden" name="category" value="<?= $row['category'] ?>">
                <button class="btn btn-light">완료</button>
            </form>
        </main>

        <?php include "footer.php"; ?>

    </div>

    <script src="./js/edit_summernote.js"></script>

    <script src="./js/board_write.js"></script>
</body>

</html>
<?php
?>