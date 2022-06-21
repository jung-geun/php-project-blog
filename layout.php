<?php
session_start();
$log = $_SESSION['log'];
$pwd = $_SESSION['pwd'];

class Layout
{
    public $title = 'main page';
    public $style;
    public $csslink;
    public $sub = 'setup';
    public $content;

    public function LayoutMain()
    {
        echo "
        <!DOCTYPE html>
        <html lang='ko'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>" . $this->title . "</title>";
            $this->LayoutStyle();
        echo "
        </head>
        <body>
            <div class='container-fluid' id='wrap'>";
            $this->LayoutHeader();
        echo "<div id='container'>";
        $this->LayoutContent();
        $this->LayoutSide();
        echo "</div>";
        $this->LayoutFooter();
        echo
        "</div>
        </body>
        </html>
        ";
    }

    public function LayoutStyle()
    {
        echo "<link rel='stylesheet' type='text/css' href='" . $this->csslink . "'/> ";
        echo " 
        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' 
        integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
        echo "<style>" . $this->style . "</style>";
    }

    public function LayoutSide()
    {
        $this->board = explode('/', $_SERVER['PHP_SELF']);

        switch ($this->board[1]) {
            case 'setup':
                $this->sub = "@@@@만드는 중";
                break;
            default:
                $this->sub = "@@@사이드바 제작중";
        }

        echo "<div id='aside'>";
        $this->Loginmenu();
        $this->sub;
        echo "</div></section>";
    }

    public function LayoutHeader()
    {
        echo "<div class='container-fluid' id='header'>
			<div class='logo' id='logo'><h1><a href='http://www.pieroot.xyz'>    <img src='./img/pieroot.png' alt='pieroot' width='100'>
</a></h1></div>
			<nav>";
        echo $this->search_menu();
        echo "</nav>
		</div>
        
			<div class='ad_1'>
			</div>";
    }

    public function LayoutContent()
    {
        echo "<section><div class='container' id='article'>";
        $this->content;
        $this->board();
        echo "</div>";
    }

    public function LayoutFooter()
    {
        echo "<div class='container-fluid' id='footer'>Copyright © pieroot. All rights reserved. PieRoot</div>";
    }

    public function search_menu()
    {
        include "./search_menu.php";
    }

    public function postbox()
    {
        echo "<div class='postbox'>
        <form action='post.php' method='POST'>
            <input type='text' name='title' placeholder='제목을 입력하세요.'>
            <textarea name='content' placeholder='내용을 입력하세요.'></textarea>
            <input type='submit' value='작성하기'>
        </form>
        </div>";
    }

    public function board()
    {
        echo "<div class='board'>
        <div class='board_title'>
            <h1>게시판</h1>
        </div>
        <div class='board_list'>
            <ul>
                <li><a href='?page=notice'>공지사항</a></li>
                <li><a href='?page=free'>자유게시판</a></li>
                <li><a href='?page=qna'>Q&A</a></li>
            </ul>
        </div>
        </div>";
    }

    public function Loginmenu()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo "{$_SESSION['user_id']}님 환영합니다  ";
            echo "        <li class='nav-item d-flex align-items-center' onclick='logout()'>로그아웃</li>";
        } else {
            echo "        <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='signup.php'>회원가입 </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='login.php'>로그인</a>
        </li> ";
        }
        echo "
        <script>
        function logout() {
            console.log('hello');
            const data = confirm('로그아웃 하시겠습니까?');
            if (data) {
                location.href = 'logoutProcess.php';
            }
        }
        </script>";
    }

    function resize_image($file, $newfile, $w, $h)
    {
        list($width, $height) = getimagesize($file);
        if (strpos(strtolower($file), ".jpg"))
            $src = imagecreatefromjpeg($file);
        else if (strpos(strtolower($file), ".png"))
            $src = imagecreatefrompng($file);
        else if (strpos(strtolower($file), ".gif"))
            $src = imagecreatefromgif($file);
        $dst = imagecreatetruecolor($w, $h);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
        if (strpos(strtolower($newfile), ".jpg"))
            imagejpeg($dst, $newfile);
        else if (strpos(strtolower($newfile), ".png"))
            imagepng($dst, $newfile);
        else if (strpos(strtolower($newfile), ".gif"))
            imagegif($dst, $newfile);
    }
}