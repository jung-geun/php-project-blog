<?php
header("Content-Type: text/html; charset=UTF-8");
require_once "per_check.php";
$db_conn = new db_conn();
$list = $db_conn->post_list();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PieRoot</title>
    <?php include "head.php"; ?>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <?php include "header.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">글 전체 목록</h1>
                    <p class="mb-4">수정 / 삭제 시 주의 하시기 바랍니다
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 5, "desc" ]]' data-page-length='25'>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Title</th>
                                            <th>Editor</th>
                                            <th>Category</th>
                                            <th>Write Date</th>
                                            <th>last Edit Date</th>
                                            <th>비고</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Title</th>
                                            <th>Editor</th>
                                            <th>Category</th>
                                            <th>Write Date</th>
                                            <th>last Edit Date</th>
                                            <th>비고</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($list)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['title'] ?></td>
                                                <td><?= $row['editor'] ?></td>
                                                <td><?= $row['category'] ?></td>
                                                <td><?= $row['write_date'] ?></td>
                                                <td><?= $row['edit_date'] ?></td>
                                                <td>
                                                    <a href="board_edit.php?id=<?= $row['id'] ?>">
                                                        <button class="btn btn-primary">수정</button>
                                                    </a>
                                                    <a href="board_delete.php?id=<?= $row['id'] ?>&editor=<?= $row['editor'] ?>" onclick="return confirm('삭제 하시겠습니까?')">
                                                        <button class="btn btn-danger">삭제</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- End of Footer -->
            <?php require_once "footer.php" ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include "bottom.php" ?>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</body>

</html>