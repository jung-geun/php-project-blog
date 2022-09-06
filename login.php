<?php
header("Content-Type: text/html; charset=UTF-8");
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

if (preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
    echo "<script>location.href='loginm';</script>";
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" -->
    <!-- integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="./css/login_style.css">

</head>

<body class="bg-dark">
    <div class="container">

        <div class="backbox">
            <div class="loginMsg">
                <div class="textcontent">
                    <p class="title">Don't have an account?</p>
                    <p>Sign up to save all your graph.</p>
                    <button id="switch1">Sign Up</button>
                </div>
            </div>
            <div class="signupMsg visibility">
                <div class="textcontent">
                    <p class="title">Have an account?</p>
                    <p>Log in to see all your collection.</p>
                    <button id="switch2">LOG IN</button>
                </div>
            </div>
        </div>
        <!-- backbox -->


        <div class="frontbox">
            <form class="login" action="loginProc.php" method="POST" name="loginform" onsubmit="return checkid()">
                <h2>LOG IN</h2>
                <div class=" inputbox">
                    <input type="text" name="user_id" id="logID" placeholder="  ID" required="">
                    <input type="password" name="user_pw" id="logpass" placeholder="  PASSWORD" required="">
                </div>
                <p>FORGET PASSWORD?</p>
                <button type="submit">LOG IN</button>
            </form>

            <form class="signup hide" action="registerProc.php" method="POST" name="registerform" onsubmit="return registercheck()">
                <h2>SIGN UP</h2>
                <div class="inputbox">
                    <input type="text" name="user_name" id="regname" placeholder="  FULLNAME" required="">
                    <input type="text" name="user_id" id="regID" placeholder="  ID" required="">
                    <input type="email" name="user_email" id="regemail" placeholder="  EMAIL" required="">
                    <input type="password" name="user_passwd" id="regpass" placeholder="  PASSWORD" required="">
                </div>
                <button type="submit">SIGN UP</button>
            </form>

        </div>
        <!-- frontbox -->
    </div>
    <script src="./js/login_script.js"></script>
    <script src="./js/login_reg_check.js"></script>

</body>

</html>