<?php
$page = $_GET['page'];
require_once "layout.php"; // 레이아웃을 require 함 
// echo "ajdjsalkjdlkasjdlksj";
$base = new Layout; // Layout class 객체를 생성

$base->csslink = 'css/indexstyle.css'; // css 파일의 주소
// $base->csslink = './bootstrap/css/bootstrap.css'; // css 파일의 주소

$base->content = "content";

$base->LayoutMain();
?>