<?php
require_once "../core/base.php";
require_once "../core/functions.php";

header("content-type:application/json");
header('charset=UTF-8');

$sql = "SELECT * FROM categories WHERE 1";

if(isset($_GET['id'])) {
    $id = textFilter($_GET['id']);
    $sql .= " AND id=$id";
}

if(isset($_GET['limit'])) {
    $limit = textFilter($_GET['limit']);
    $sql .= " LIMIT $limit";
}

if(isset($_GET['offset'])) {
    $offset = textFilter($_GET['offset']);
    $sql .= " OFFSET $offset";
}
$rows = [];
$query = mysqli_query(con(), $sql);
while($row = mysqli_fetch_assoc($query)) {
    $arr = [
        "id" => $row['id'],
        "title" => $row['title'],
        "userid" => user($row['user_id'])['name'],
    ];
    array_push($rows, $arr);
}

echo apiOutput($rows);

