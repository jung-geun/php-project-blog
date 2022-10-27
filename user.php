<?php
// session_start();
require_once "./db/db_connect.php";

$id = null;
if (isset($_GET['id'])) { // 넘겨받은 name이 있으면
    $id = $_GET['id'];
} else {    // 넘겨받은 name 이 없으면
    echo "<script>alert('로그인이 필요합니다');</script>";
    echo "<script>location.href='login';</script>";
}

if (isset($_SESSION['user_id'])) {  // 세션이 있고 세션에 정보가 있을때
    $user_id  = $_SESSION['user_id'];
} else {
    $user_id = null;
}
$db_conn = new db_conn();
$permission = null;
$board_result = null;
$board_result = $db_conn->post_list_user($id);

if (isset($user_id)) {
    $permission = $db_conn->Permission_check($_SESSION['user_id'], $_SESSION['user_passwd']);
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>PieRoot</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/board.css" rel="stylesheet">

</head>

<body class="d-flex <?php
                    if ($list_cnt <= 6) {
                        echo "h-100";
                    } else {
                        echo "h-auto overflow-auto";
                    }
                    ?> text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?php require_once './header.php'; ?>
        <main class="px-3">
            <div>
                <h3 onclick="location.href='./user?id=<?= $id ?>'">
                    <?php echo $id; ?>
                </h3>
                <p>
                    <?php if ($id == $user_id) { ?>
                        내
                    <?php
                    } else {
                        echo $id; ?> (이)<?php } ?>가 쓴 글</p>
                <?php
                if ($board_result == -1) {
                ?>
                    <h1>

                        아직 작성한 글이 없습니다.
                    </h1>
                <?php
                } else if ($board_result == -2) {
                    echo "<script>alert('DB 오류');</script>";
                } else {
                ?>
                    <div class="album py-5">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                                <?php
                                while ($row = mysqli_fetch_array($board_result)) {
                                ?>
                                    <div class="col shadow-sm">
                                        <div class="board-container card shadow-sm h-100">
                                            <a href="post?id=<?= $row['id'] ?>" class="text-decoration-none">
                                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                    <title><?= $orw['title'] ?></title>
                                                    <rect width="100%" height="100%" fill="#55595c" />
                                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                                        <?php
                                                        echo $row['title'];

                                                        echo $db_conn->id_for_category($row['category']); ?>
                                                    </text>
                                                </svg>
                                            </a>
                                            <div class="card-body bg-dark">
                                                <div id="target">
                                                    <a href="post?id=<?= $row['id'] ?>" class="text-decoration-none">

                                                        <div class="card-text nowrap line-clamp board-overflow text-white" id="content">
                                                            <?php
                                                            $content = $row['content'];
                                                            $content = preg_replace("!<(.*?)>!is", "", $content);
                                                            $content = preg_replace("!</(.*?)>!is", "", $content);

                                                            echo $content ?>

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center card-footer bg-dark bg-opacity-75">

                                                <small class="text-muted"><?= $row['edit_date']  ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
        <?php require_once './footer.php'; ?>
    </div>

</body>

</html>