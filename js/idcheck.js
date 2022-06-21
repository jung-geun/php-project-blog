function checkid() {
  var userid = document.getElementById("uid").value;
  if (userid) {
    //userid로 받음
    url = "check.php?userid=" + userid;
    window.open(url, "chkid", "width=400,height=200");
  } else {
    alert("아이디를 입력하세요.");
  }
}
