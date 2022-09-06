<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'db/db_connect.php';
$db_conn = new db_conn();
$list_cnt = $db_conn->board_count();
$result = $db_conn->board_list();

?>
<!DOCTYPE html>
<html lang="en" class="">

<head class="overflow-auto">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>PieRoot</title>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/board.css" rel="stylesheet" />
</head>

<body class="d-flex text-center mx-0 text-white bg-dark h-100">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?php include_once "header.php"; ?>

        <main class="px-3">
            <!-- <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Blog</h1>
                    </div>
                </div>
            </section> -->

            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
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
                                        <a href="user?id=<?= $row['editor'] ?>" class="text-white text-decoration-none">
                                            <?php
                                            echo $row['editor'];
                                            ?>
                                        </a>
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
        </main>
        <?php include_once "footer.php"; ?>
    </div>

</body>

</html>