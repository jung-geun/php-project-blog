function registercheck() {
  var registerform = document.registerform;
  const regID = registerform.regID.value;
  const regemail = registerform.regemail.value;
  const regpass = registerform.regpass.value;
  const regname = registerform.regname.value;
  if (!regID) {
    alert("아이디를 입력하세요.");
    registerform.regID.focus();
    return false;
  } else if (!regname) {
    alert("이름을 입력하세요.");
    registerform.regname.focus();
    return false;
  } else if (!regemail) {
    alert("이메일을 입력하세요.");
    registerform.regemail.focus();
    return false;
  } else if (!regpass) {
    alert("비밀번호를 입력하세요.");
    registerform.regpass.focus();
    return false;
  } else {
    return true;
  }
}

function checkid() {
  var loginform = document.loginform;
  const logID = loginform.logID.value;
  const logpass = loginform.logpass.value;
  if (!logID) {
    alert("아이디를 입력하세요.");
    loginform.logID.focus();
    return false;
  } else if (!logpass) {
    alert("비밀번호를 입력하세요.");
    loginform.logpass.focus();
    return false;
  } else {
    return true;
  }
}
