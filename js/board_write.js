function check_title() {
  var post_write = document.post_write;
  const title = post_write.title.value;
  const content = post_write.content.value;
  if (!title) {
    alert("제목을 입력하세요.");
    post_write.title.focus();
    return false;
  } else if (!content) {
    alert("내용을 입력하세요.");
    post_write.content.focus();
    return false;
  } else {
    return true;
  }
}
