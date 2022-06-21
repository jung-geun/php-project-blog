<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
        integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous">
    </script>
    <script src="js/idcheck.js"></script>
</head>

<body>
    <form action="signupProcess.php" method="POST" id="signup-form">
        <div class="w-50 ml-auto mr-auto mt-5">
            <div class="mb-3 ">
                <label for="user_id" class="form-label">아이디</label>
                <input type="text" name="user_id" class="form-control" id="user-id" placeholder="아이디를 입력해 주세요."
                    pattern="^([a-z0-9_]){3,20}$">
            </div>
            <div>
                <button type="button" id="check_button" value="ID 중복 검사" onclick="checkid();">중복체크</button>
            </div>
            <div class="mb-3 ">
                <label for="email" class="form-label">이메일</label>
                <input type="email" name="user_email" class="form-control" id="email" placeholder="이메일을 입력해 주세요.">
            </div>
            <div class="mb-3 ">
                <label for="user_name" class="form-label">이름</label>
                <input type="user_name" name="user_name" class="form-control" id="user_name" placeholder="이름을 입력해 주세요."
                    pattern="^([a-z]){3,15}$">
            </div>
            <div class=" mb-3 ">
                <label for=" password" class="form-label">비밀번호</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호를 입력해 주세요."
                    pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_-+=[]{}~?:;`|/]).{8,20}$">
            </div>
            <div class="mb-3 ">
                <label for="passwordCheck" class="form-label">비밀번호 체크</label>
                <input type="password" class="form-control" id="password-check" placeholder="비밀번호를 입력해 주세요."
                    pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_-+=[]{}~?:;`|/]).{8,20}$">
            </div>
            <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button>
            <button type="reset" id="signup-button" class="btn btb-primary mb-3">초기화</button>
        </div>
    </form>
    <script>
    const signupForm = document.querySelector("#signup-form");
    const signupButton = document.querySelector("#signup-button");
    const password = document.querySelector("#password");
    const passwordCheck = document.querySelector("#password-check");
    const emailcheck = document.querySelector("#email");
    signupButton.addEventListener("click", function(e) {
        if (password.value && password.value === passwordCheck.value) {
            signupForm.submit();
        } else {
            alert("비밀번호가 서로 일치하지 않습니다");
        }
    });
    </script>
</body>

</html>