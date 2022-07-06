<?php

// common start

function alert($data,$color) {
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery($sql) {
    $con = con();
    if(mysqli_query($con,$sql)) {
        return true;
    }else {
        die("Query Failed : ".mysqli_error(con()));
    }
}

function fetch($sql) {
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql) {
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)) {
        array_push($rows,$row);
    }
    return $rows;
}

function redirect($l) {
    header("location: $l");
}

function linkTo($l) {
    echo "<script> location.href = '$l'; </script>";
}

function countTotal($table,$category = 1) {
    $sql = "SELECT COUNT(id) from $table WHERE $category";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function short($str,$length = "100") {
        return substr($str,0,$length)."...";
}

function textFilter($text) {
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);

    return $text;
}

// common end

// auth start

function register() {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cfpassword = $_POST['cfpassword'];

    if($password != $cfpassword) {
        return alert("Password do not match!","danger");
    }else {
        $sPass = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$sPass')";
        if(runQuery($sql)) {
            // redirect("login.php");

            //register & login
            login();
        }
    }
}

function login() {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);

    if(!$row) {
        return alert("Email and Password do not match","danger");
    }else {
        if(!password_verify($password,$row['password'])) {
            return alert("Email and Password do not match","danger");
        }else {
            session_start();
            $_SESSION['user'] = $row;
            // return alert("Login success","success");
            redirect("dashboard.php");
        }
    }
}

// auth end

// user start

function users() {
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}

function user($id) {
    $sql = "SELECT * FROM users WHERE id = $id";
    return fetch($sql);
}

// user end

//category start
function addCategory() {
    $title = textFilter(strip_tags($_POST['title']));
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
    if(runQuery($sql)){
        linkTo("category_add.php");
    }
}

function category($id) {
    $sql = "SELECT * FROM categories WHERE id = $id";
    return fetch($sql);
}

function categories() {
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function dateTime($timestamp,$format = 'd-m-o') {
    return date($format,strtotime($timestamp));
}

function deleteCategory($id) {
    $sql = "DELETE FROM categories WHERE id = '$id'";
    return runQuery($sql);
}

function updateCategory() {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $sql = "UPDATE categories SET title = '$title' WHERE id = '$id'";
    return runQuery($sql);
}

function pinToTopCategory($id) {
    $sql = "UPDATE categories SET ordering = 0"; // all 0
    runQuery($sql);
    $sql = "UPDATE categories SET ordering = 1 WHERE id = '$id'";
    return runQuery($sql);
}

function removePin($id) {
    $sql = "UPDATE categories SET ordering = 0 WHERE id = '$id'";
    return runQuery($sql);
}

//category end

//post start

function isCategory($id) {
    if(category($id)) {
        return $id;
    }else {
        die("Category is not valid");
    }
}

function addPost() {
    $con = con();
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategory($_POST['categories_id']);
    $userid = $_SESSION['user']['id'];

    $sql = "INSERT INTO posts (title,description,user_id,category_id) VALUES ('$title','$description','$userid','$category_id')";
//    die($sql);
    if(runQuery($sql)) {
        linkTo("post_add.php");
    }else {
        die("Query fail: ".mysqli_error($con));
    }
}

function post($id) {
    $sql = "SELECT * FROM posts WHERE id = $id";
    return fetch($sql);
}

function posts() {
    if($_SESSION['user']['role'] == 2) {
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = '$current_user_id'";
    }else {
        $sql = "SELECT * FROM posts";
    }
    return fetchAll($sql);
}

function deletePost($id) {
    $sql = "DELETE FROM posts WHERE id = $id";
    return runQuery($sql);
}

function updatePost() {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $sql = "UPDATE posts SET title = '$title',description='$description',category_id='$category_id' WHERE id = '$id'";
//    die($sql);
    if(runQuery($sql)) {
        linkTo("post_list.php");
    }
}

//post end

//front panel start

function fPosts($orderby = "id", $sorting = "DESC") {
    $sql = "SELECT * FROM posts ORDER BY $orderby $sorting";
//    die($sql);
    return fetchAll($sql);
}

function fCategories() {
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function fPostByCat($category_id,$limit = 9999,$id = 0) {
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND NOT id = $id ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}

function searchPost($keyword) {
    $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%' ORDER BY id DESC";
    return fetchAll($sql);
}

function searchPostByDate($start,$end) {
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchAll($sql);
}

//front panel end

// viewer list start

function viewers($user_id,$post_id,$device) {
    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$user_id','$post_id','$device')";
    return runQuery($sql);
}

// will count with php count() function
function viewerCountByPost($post_id){
    $sql = "SELECT * FROM viewers WHERE post_id = $post_id";
    return fetchAll($sql);
}

// will count with php count() function
function viewerCountByUser($user_id) {
    $sql = "SELECT * FROM viewers WHERE user_id = $user_id";
//    die($sql);
    return fetchAll($sql);
}

// viewer list end

// ads start

function ads() {
    $today = date('Y-m-d');
    $sql = "SELECT * FROM ads WHERE start <= '$today' AND end > '$today'";
//    die($sql);
    return fetchAll($sql);
}

function ad($id) {
    $sql = "SELECT * FROM ads WHERE id = $id";
    return fetch($sql);
}

function adsall() {
    $sql = "SELECT * FROM ads";
    return fetchAll($sql);
}

function deleteAds($id) {
    $sql = "DELETE FROM ads WHERE id = $id";
    runQuery($sql);
}

function updateAd() {
    $id = $_POST['id'];
    $photo = $_POST['photo'];
    $link = $_POST['link'];
    $sql = "UPDATE ads SET photo = '$photo',link = '$link' WHERE id = '$id'";
    if(runQuery($sql)) {
        linkTo("ad_manager.php");
    };
}


// ads end

// payment start

function payNow() {
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    // from user money update
    $fromUserDetail = user($from);
    if($fromUserDetail['money'] >= $amount) {
        $leftMoney = $fromUserDetail['money'] - $amount;
        $sql = "UPDATE users SET money = '$leftMoney' WHERE id = '$from'";
        mysqli_query(con(),$sql); // runquery မှာ return ပါနေလို့ ၂ ခုမသုံးပါ

        // to user money update
        $toUserDetail = user($to);
        $newAmount = $toUserDetail['money'] + $amount;
        $sql = "UPDATE users SET money = '$newAmount' WHERE id = '$to'";
        mysqli_query(con(),$sql);

        // add to transition table
        $sql = "INSERT INTO transitions (from_user,to_user,amount,description) VALUES('$from','$to','$amount','$description')";
        mysqli_query(con(),$sql);
    }
}

function transitions() {
    $id = $_SESSION['user']['id'];
    if($id == 3) {
        $sql = "SELECT * FROM transitions";
    }else {
        $sql = "SELECT * FROM transitions WHERE from_user = '$id' OR to_user = '$id'";
    }
    return fetchAll($sql);
}

// payment end

// dashbooard start

function dashboardPosts() {
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
    return fetchAll($sql);
}

// dashbooard end

// api start

function apiOutput($rows) {
    return json_encode($rows);
}

// api end