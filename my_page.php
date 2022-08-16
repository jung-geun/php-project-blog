<?php
session_start();
require_once "db/db_connect.php";
$user_id = $_SESSION['user_id'];
$db_conn = new db_conn();
$permission = $db_conn->Permission_check($_SESSION['user_id'], $_SESSION['user_passwd']);
$board_list = $db_conn->board_list_user($user_id);
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

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark"
    style="background-attachment: fixed; background-repeat: no-repeat;">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?php include_once 'header.php'; ?>

        <main class="px-3">
            <div>
                <p>
                    내 정보
                </p>
                <p>내가 쓴 글</p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>id</th>
                            <th>Write Date</th>
                            <th>last Edit Date</th>
                            <th>비고</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>id</th>
                            <th>Write Date</th>
                            <th>last Edit Date</th>
                            <th>비고</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($board_list)) {
                        ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $db_conn->id_for_category($row['category']) ?></td>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['write_date'] ?></td>
                            <td><?= $row['edit_date'] ?></td>
                            <td>
                                <a href="board_edit.php?id=<?= $row['id'] ?>">
                                    <button class="btn btn-primary">수정</button>
                                </a>
                                <a href="board_delete.php?id=<?= $row['id'] ?>">
                                    <button class="btn btn-danger">삭제</button>
                                </a>

                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if ($permission == 2 or $permission == 3) {
                    echo "<a href='/admin/'>관리자 페이지</a>";
                }
                ?>

            </div>



        </main>

        <?php include_once 'footer.php'; ?>
    </div>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>

</body>

</html>