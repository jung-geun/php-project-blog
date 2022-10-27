$(document).ready(function () {
  $("#summernote").summernote({
    placeholder: "empty...",
    tabsize: 2,
    focus: true,
    height: 450,
    width: "100%",
    resize: false,
    disableResizeEditor: true,
    lang: "ko-KR",
    toolbar: [
      ["style", ["style"]],
      ["font", ["bold", "underline", "clear"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["table", ["table"]],
      ["insert", ["link", "picture", "video"]],
      ["view", ["fullscreen", "codeview", "help"]],
    ],

    callbacks: {
      onInit: function () {
        console.log("Summernote is launched");
      },
      onImageUpload: function (files) {
        // console.log(files);
        for (var i = 0; i < files.length; i++) {
          // console.log(files[i]);
          // console.log(files[i].name);
          uploadFile(files[i]);
        }
      },

      // onImageUpload: function(files, editor, welEditable) {
      //     sendFile(files[0], editor, welEditable);
      // },
    },
  });

  $('#summernote').summernote('saveRange');

  // $('#summernote').on('summernote.init', function() {
  //     console.log('Summernote is launched');
  // });

  // 이미지 업로드 링크 설정
  // $('#summernote').on('summernote.image.link.insert', function(we, url) {
  //     // url is the image url from the dialog
  //     $img = $('<img>').attr({
  //         src: url
  //     })
  //     $summernote.summernote('insertNode', $img[0]);
  // });

  // $('#summernote').on('summernote.image.upload', function(we, files) {
  //     // upload image to server and create imgNode...
  //     $summernote.summernote('insertNode', imgNode);
  // });

  function uploadFile(file) {
    let data = new FormData();
    console.log(file);
    data.set("file", file, file.name);
    console.log("2");
    console.log(data);
    // console.log(data.values());
    for (let [name, value] of data) {
      console.log(`${name} = ${value}`); // key1 = value1, then key2 = value2
    }

    $.ajax({
      data: data,
      type: "POST",
      url: "file_upload.php",
      contentType: false,
      processData: false,
      success: function (url) {
        var imgNode = $("<img>").attr({
          src: url,
        });
        $summernote.summernote("insertNode", imgNode[0]);
      },
    });
  }

  // // 이미지 url 비허용
  $(".note-group-image-url").remove();

  // // 버튼 클릭했을때 code 로 변환
  // $("#submit-btn").click(function() {
  //     var text = $('#summernote').summernote('code');
  // });
});
