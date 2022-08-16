<?php
header("Content-Type: text/html; charset=UTF-8");
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

if (!preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
    echo "<script>location.href='login';</script>";
}

if (!session_id()) {
    session_start();
}
if ($_SESSION['user_id'] != null) {
    echo "<script>alert('잘못된 접근입니다');</script>";
    echo "<script>location.href='/';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PR 로그인/회원가입</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/loginm_style.css">

</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <div class="wrapper">

            <!--  Header  -->
            <header class="section header">
                <div class="trapezoid"></div>

                <div class="header__text">
                    <h1 onclick="location.href='/'">PieRoot</h1>
                    <p>Sign in or create a new account.</p>
                </div>
            </header>

            <!--  Sign Up  -->
            <section class="section sign-up">
                <div class="trapezoid"></div>
                <form action="registerProc" method="POST">
                    <input type="text" id="regname" name="user_name" placeholder="Name">
                    <input type="text" id="regID" name="user_id" placeholder="ID">
                    <input type="email" id="regemai" name="user_email" placeholder="Email">
                    <input type="password" id="regpass" name="user_passwd" placeholder="Password">
                    <button>Create Account</button>
                    <p class="opposite-btn2">Already have an account?</p>
                </form>
            </section>

            <!--  Sign In  -->
            <section class="section sign-in">
                <form action="loginProc" method="POST">
                    <input type="text" id="logID" name="user_id" placeholder="ID">
                    <input type="password" id="logpass" name="user_pw" placeholder="Password">
                    <button>Sign In</button>
                    <p class="opposite-btn1">Don't have an account?</p>
                </form>
            </section>
        </div>

    </div>
    <script src="./js/loginm_script.js"></script>
    <script src="./js/login_reg_check.js"></script>


</body>

</html>