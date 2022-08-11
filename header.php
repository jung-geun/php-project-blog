<?php
$user_name = null;
$user_id = null;
if (!session_id()) {
    session_start();
}
if (session_id())
    if ($_SESSION['user_name'] != null) {
        $user_name = $_SESSION['user_name'];
        $user_id = $_SESSION['user_id'];
    }

require_once "db/db_connect.php";

// $db_conn = new db_conn();

// $permission = $db_conn->Permission_check($_SESSION['user_id'], $_SESSION['user_passwd']);


?>
<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0" href='/'>PieRoot</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="menu nav-link fw-bold py-1 px-0" aria-current="page" href='/' name='index'>Home</a>
            <a class="menu nav-link fw-bold py-1 px-0" href='/board_list' name='board'>Board</a>
            <?php

            if ($user_id != null) {
                echo "<a class='nav-link fw-bold py-1 px-0' href='/board_write'>글쓰기</a>";
                echo "<a class='nav-link fw-bold py-1 px-0' href='/my_page'> $user_name </a>";
                if ($permission == 2 or $permission == 3) {
                    echo "<a class='nav-link fw-bold py-1 px-0' href='/admin/'>관리자</a>";
                }
                echo "<a class='nav-link fw-bold py-1 px-0' href='/logout'>Logout</a>";
            } else {
                echo "<a class='nav-link fw-bold py-1 px-0' href='/login'>Login</a>";
            }
            ?>
        </nav>
    </div>
</header>