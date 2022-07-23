<?php
header("Content-Type: text/html; charset=UTF-8");
if (!session_id()) {
    session_start();
}
if ($_SESSION['user_id'] != null) {
    echo "<script>alert('잘못된 접근입니다');</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PR 로그인/회원가입</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
        integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous">
    </script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="css/login_style.css">
    <script src="js/login_script.js"></script>

</head>

<body>

    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3">
                            <span>로그인 </span><span>회원가입</span>
                        </h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" /> <label
                            for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">
                                                <a href="index.php">PieRoot</a>
                                            </h4>
                                            <form method="POST" action="loginProc.php" onsubmit="return checkid()"
                                                name="loginform">
                                                <div class="form-group">
                                                    <input type="text" name="user_id" class="form-style"
                                                        placeholder="아이디" id="logID" autocomplete="off"
                                                        pattern="^[a-zA-Z0-9-_/,.][a-zA-Z0-9-_/,. ]*$">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="user_pw" class="form-style"
                                                        placeholder="비밀번호" id="logpass" autocomplete="off"
                                                        pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_-+=[]{}~?:;`|/]).{8,20}$">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4" value="로그인">
                                                <p class="mb-0 mt-4 text-center">
                                                    <a href="#0" class="link">비밀번호를 잃어버리셨나요?</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">
                                                <a href="index.php">PieRoot</a>
                                            </h4>
                                            <form action="registerProc.php" method="POST" id="signup-form"
                                                name="registerform" onsubmit="return registercheck()">
                                                <div class="form-group">
                                                    <input type="text" name="user_id" class="form-style"
                                                        placeholder="아이디" id="logID" autocomplete="off"
                                                        pattern="^[a-zA-Z0-9-_/,.][a-zA-Z0-9-_/,. ]*$">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="user_name" class="form-style"
                                                        placeholder="이름" id="logname" autocomplete="off"
                                                        pattern="^[가-힣]{2,10}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}|[0-9]{1,10}{$">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="user_email" class="form-style"
                                                        placeholder="이메일" id="logemail" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="user_passwd" class="form-style"
                                                        placeholder="비밀번호" id="logpass" autocomplete="off"
                                                        pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_-+=[]{}~?:;`|/]).{8,20}$">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4" value="회원가입">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->

    <script src="js/login_script.js"></script>
</body>

<.php>