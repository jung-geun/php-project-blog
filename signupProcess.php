<?php
$conn = mysqli_connect("localhost", "webID", "-qwMqx8pnfuSW-VE", "pieroot", 3306);
$hashedPassword = password_hash($_POST['password'], PASSWORD_ARGON2ID);
// echo $hashedPassword;
$sql = "INSERT INTO users(user_ID, user_pwd, user_name, user_email)  VALUES('{$_POST['user_id']}', '{$hashedPassword}','{$_POST['user_name']}','{$_POST['user_email']}'";
// echo $sql;
$result = mysqli_query($conn, $sql);
if ($result === false) {
    ?>
<script>
alert("저장에 문제가 생겼습니다.관리자에게 문의해주세요.");
alert(mysqli_error($conn));
</script>
} else {
?>
<script>
alert("회원가입이 완료되었습니다");
location.href = "index.php";
</script>
<?php
}
?>