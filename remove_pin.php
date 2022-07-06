<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$category_id = $_GET['id'];

if(removePin($category_id)) {
    linkTo("category_add.php");
}