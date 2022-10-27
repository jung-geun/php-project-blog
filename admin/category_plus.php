<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'per_check.php';
$db_conn = new db_conn();
$list = $db_conn->category_list();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PieRoot</title>
    <?php include "head.php"; ?>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- <link href="css/style.css" rel="stylesheet"> -->

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
                    <h1 class="h3 mb-2 text-gray-800">Category</h1>
                    <div class="size">
                        <form action="category_add.php" method="POST" name="category" onsubmit="return cate()">
                            <input class="text-form-control" placeholder="category" type="text" id="input_category" name="category" />
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                        </form>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">category list</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>category_id</th>
                                            <th>category_name</th>
                                            <th>비고</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>category_id</th>
                                            <th>category_name</th>
                                            <th>비고</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($list)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['category_id'] ?></td>
                                                <td><?= $row['category_name'] ?></td>
                                                <td>
                                                    <a href="category_edit.php?id=<?= $row['category_id'] ?>&name=<?= $row['category_name'] ?>">
                                                        <button class="btn btn-primary">수정</button>
                                                    </a>
                                                    <a href="category_del.php?id=<?= $row['category_id'] ?>&name=<?= $row['category_name'] ?>" onclick="return confirm('삭제 하시겠습니까?')">
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

            <?php require_once "footer.php"; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php include "bottom.php" ?>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->



    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function cate() {
            var category = document.category;
            const input_category = category.input_category.value;
            if (!input_category) {
                alert("카테고리를 입력해주세요");
                category.input_category.focus();
                return false;
            } else {
                return true;
            }
        }
    </script>

</body>

</html>