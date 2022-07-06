<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$id = $_GET['id'];
if(deleteAds($id)) {
    linkTo("ad_manager.php");
}