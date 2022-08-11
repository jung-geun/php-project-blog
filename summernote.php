<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <style>
    body {
        padding: 1rem;
    }

    h1 {
        text-align: center;
    }

    button {
        float: right;
    }

    #userInfoContainer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    #inputTitle {
        width: 100%;
        font-size: xx-large;
    }
    </style>

</head>

<body>

    <h1>게시글 작성</h1>
    <div id="userInfoContainer">
        <div>
            <label for="inputNickname">
                닉네임 :
            </label>
            <input id="inputNickname" />
        </div>
        <div>
            <label for="inputPassword">
                비밀번호 :
            </label>
            <input id="inputPassword" type='password' />
        </div>
    </div>
    <input id="inputTitle" placeholder="제목을 작성해주세요" />
    <div id="summernote"></div>
    <button>완료</button>




    <script>
    // 메인화면 페이지 로드 함수
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: '내용을 작성하세요',
            height: 400,
            maxHeight: 400
        });
    });
    </script>
</body>

</html>