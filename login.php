<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
        integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous">
    </script>
</head>

<body>


    <form method="POST" action="loginProcess.php">
        <div class="w-50 ml-auto mr-auto mt-5">
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">아이디가 뭔데</label>
                <input name="user_id" type="text" class="form-control" id="exampleFormControlInput1" placeholder="id"
                    pattern="^([a-z0-9_]){3,20}$">
            </div>
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">비밀번호</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput1"
                    placeholder="password"
                    pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_-+=[]{}~?:;`|/]).{8,20}$">
            </div>

            <button type="submit" class="btn btn-primary mb-3">login</button>
            <!-- 비밀번호 분실 -->
            <a href="findPassword.php" class="btn btn-primary mb-3">비밀번호 분실</a>
        </div>
    </form>

</body>

</html>