<?php
header("Content-Type: text/html; charset=UTF-8");
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

if (preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
    echo "<script>location.href='postw';</script>";
}
require_once "login_check.php";

require_once "db/db_connect.php";
$db_conn = new db_conn();
$permission = $db_conn->Permission_check($_SESSION['user_id'], $_SESSION['user_passwd']);
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">


</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 p-3 mx-auto flex-column">
        <?php include_once "header.php"; ?>
        <main class="px-3 h-75">
            <form action="writeProc" method="POST" name="post_write" onsubmit="return check_title()" enctype='multipart/form-data'>

                <h1>게시글 작성</h1>
                <input name="title" id="inputTitle" placeholder="제목을 작성해주세요" />
                <select NAME=category SIZE=1>
                    <?php
                    foreach ($db_conn->category_list() as $row) {
                        if ($row['category_name'] == 'test') {
                            if (!($permission == 3 or $permission == 4)) {
                                continue;
                            }
                        }
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                    ?>
                </select>
                <textarea id="summernote" name="content" multiple></textarea>
                <input type="file" name="upload_file[]" multiple>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="tempFolder" id="tempFolder" value="temp" />
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