<?php
header("Content-Type: text/html; charset=UTF-8");
if (session_id() == '') {
    session_start();
}
$id = null;
$id = $_GET['id'];
if ($id == null) {
    echo "<script>alert('잘못된 접근입니다.');</script>";
    echo "<script>location.href='board_lsit';</script>";
}
require_once "db/db_connect.php";
$db_conn = new db_conn();
$board = $db_conn->board_content($id);
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
    <script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 570,
        lang: "ko-KR",
        resize: false,
        disableResizeEditor: true,
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

    $('#summernote').summernote('code', "<?php echo $content ?>");
    $(".note-group-image-url").remove();

    $("#submit-btn").click(function() {
        var text = $('#summernote').summernote('code');

    });


    function RealTimeImageUpdate(files, editor) {
        var formData = new FormData();
        var fileArr = Array.prototype.slice.call(files);
        fileArr.forEach(function(f) {
            if (f.type.match("image/jpg") || f.type.match("image/jpeg" || f.type.match("image/jpeg"))) {
                alert("JPG, JPEG, PNG 확장자만 업로드 가능합니다.");
                return;
            }
        });
        for (var xx = 0; xx < files.length; xx++) {
            formData.append("file[]", files[xx]);
        }

        $.ajax({
            url: "./이미지 받을 백엔드 파일",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            type: 'POST',
            success: function(result) {

                //항상 업로드된 파일의 url이 있어야 한다.
                if (result === -1) {
                    alert('이미지 파일이 아닙니다.');
                    return;
                }
                var data = JSON.parse(result);
                for (x = 0; x < data.length; x++) {
                    var img = $("<img>").attr({
                        src: data[x],
                        width: "100%"
                    }); // Default 100% ( 서비스가 앱이어서 이미지 크기를 100% 설정 - But 수정 가능 )
                    console.log(img);
                    $(editor).summernote('pasteHTML', "<img src='" + data[x] + "' style='width:100%;' />");
                }
            }
        });
    }
    </script>
</body>

</html>
<?php
?>