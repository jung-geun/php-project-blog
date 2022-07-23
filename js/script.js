function registercheck() {
  var registerform = document.registerform;
  const email = registerform.email.value;
  const passwd = registerform.passwd.value;
  const name = registerform.name.value;

  if (!email) {
    //logmail로 받음
    alert("이메일을 입력하세요.");
    registerform.email.focus();
    return false;
  } else if (!passwd) {
    alert("비밀번호를 입력하세요.");
    registerform.passwd.focus();
    return false;
  } else if (!name) {
    alert("이름을 입력하세요.");
    registerform.name.focus();
    return false;
  } else {
    return true;
  }
}

function checkid() {
  var loginform = document.loginform;
  const email = loginform.logemail.value;
  const passwd = loginform.logpass.value;
  if (!email) {
    //logmail로 받음
    alert("이메일을 입력하세요.");
    loginform.logemail.focus();
    return false;
  } else if (!passwd) {
    alert("비밀번호를 입력하세요.");
    loginform.logpass.focus();
    return false;
  } else {
    return true;
  }
}

function cartadd(num) {
  var amount = document.amount;
  const count = amount.value;
  if (confirm("장바구니에 추가 하시겠습니까?")) {
    var str = "cartadd.jsp?item=" + num + "&count=" + count;
    alert("추가");
    document.location = str;
  } else {
    alert("취소");
  }
}

function price() {}

var money = $("#money").text();
var money2 = money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
$("#money").text(money2);
