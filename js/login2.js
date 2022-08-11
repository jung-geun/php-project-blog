function registercheck() {
  var registerform = document.registerform;
  const logID = registerform.logID.value;
  const logemail = registerform.logemail.value;
  const logpass = registerform.logpass.value;
  const logname = registerform.logname.value;
  if (!logID) {
    alert("아이디를 입력하세요.");
    registerform.logID.focus();
    return false;
  } else if (!logname) {
    alert("이름을 입력하세요.");
    registerform.logname.focus();
    return false;
  } else if (!logemail) {
    alert("이메일을 입력하세요.");
    registerform.logemail.focus();
    return false;
  } else if (!logpass) {
    alert("비밀번호를 입력하세요.");
    registerform.logpass.focus();
    return false;
  } else {
    return true;
  }
}

function checkid() {
  var loginform = document.loginform;
  const logID = loginform.logID.value;
  const passwd = loginform.logpass.value;
  if (!logID) {
    alert("아이디를 입력하세요.");
    loginform.logID.focus();
    return false;
  } else if (!passwd) {
    alert("비밀번호를 입력하세요.");
    loginform.logpass.focus();
    return false;
  } else {
    return true;
  }
}
