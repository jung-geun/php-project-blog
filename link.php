<?php
$board;

if(isset($_GET['board']))
{
    $board = $_GET['board'];
}
else
{
    $board = 'free';
}
