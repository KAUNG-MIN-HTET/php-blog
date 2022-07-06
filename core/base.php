<?php

function con() {
    return $conn = new mysqli('localhost','root','','blog');
}

$info = array(
    "name" => 'Sample Blog',
    "short" => "KMH-BLOG",
    "description" => "Sample Project"
);

$role = ["Admin","Editor","User"];

$url = "http://{$_SERVER["HTTP_HOST"]}/web_dev/5_sample_blog/";

date_default_timezone_set('Asia/Yangon');