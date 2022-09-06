<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'db/db_connect.php';
if (!isset($_GET['id'])) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='/';</script>";
}
$board_id = $_GET['id'];
$db_conn = new db_conn();
$content = $db_conn->board_content($board_id);
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>PieRoot</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/"> -->

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/board.css" rel="stylesheet" />
</head>

<body class="d-flex text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?php include_once "header.php"; ?>

        <main class="px-3">

            <?php
            if ($content == -2) {
                echo "<p>문서 연결에 실패하였습니다</p>";
            } else if ($content == -1) {
                echo "<p>문서가 존재하지 않습니다</p>";
            } else if (isset($content)) {
                $row = mysqli_fetch_assoc($content);
                // print_r($row);
            ?>

                <section class="py-5 text-center container">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-light"><?= $row['title'] ?></h1>
                            <p class="lead text-muted">테스ㅡ트 중입니다</p>
                            <p class="lead text-muted">작성자 : <?= $row['editor'] ?></p>

                        </div>
                        <div>
                            <?php
                            $content = str_replace("\n", "<br>", $row['content']);
                            echo $content;
                            ?>
                        </div>
                    </div>
                </section>

            <?php
            }
            ?>
        </main>
        <?php include_once "footer.php"; ?>
    </div>

    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="js/baord_script.js"></script>
</body>

</html>