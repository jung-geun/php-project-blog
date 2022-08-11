<?php
header("Content-Type: text/html; charset=UTF-8");
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

if (session_id() == '') {
    session_start();
}
if (!preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
    echo "<script>location.href='board_write';</script>";
}
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='login';</script>";
    // $user_id = $_SESSION['user_id'];
}


require_once "db/db_connect.php";
$db_conn = new db_conn();
// $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>

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

                <h1>게시글 작성</h1>
                <input name="title" id="inputTitle" placeholder="제목을 작성해주세요" />
                <textarea id="summernote"></textarea>
                <button class="btn btn-light">완료</button>
            </form>
        </main>

        <?php include "footer.php"; ?>

    </div>
    <script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        resize: false,
        disableResizeEditor: true,
        height: 570,
        lang: "ko-KR",
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    $(".note-group-image-url").remove();

    $("#submit-btn").click(function() {
        var text = $('#summernote').summernote('code');

    });
    </script>
</body>

</html>
<?php
?>