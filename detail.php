<?php require_once "core/base.php" ?>
<?php require_once "core/functions.php" ?>

<?php require_once "front_panel/head.php" ?>

<?php

if(isset($_GET['id'])) {
    $current_id = $_GET['id'];
}else {
    linkTo("post.php");
}

$current_category_id = $_GET['category_id'];

if(isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
}else{
    $user_id = 0;
}

viewers($user_id,$current_id,$_SERVER['HTTP_USER_AGENT']);

?>

</head>
<body style="background-color: #f0f0f0;">

<div class="container">
    <!--nav start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary my-2 rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Sample Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" action="search.php" method="post">
                    <input class="form-control me-2" type="search" name="search_by" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!--nav end -->
    <div class="row">
        <!-- ad start -->
        <?php include "ads.php" ?>
        <!-- ad end -->
        <!-- posts detail start -->
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb" class="mt-2 bg-white p-3 mb-3 rounded">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post detail</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <h4><?php echo post($current_id)['title'] ?></h4>
                    <p class="mt-3">
                        <i class="fas fa-user text-pri"></i>
                        <?php echo user(post($current_id)['user_id'])['name'] ?>
                        <i class="fas fa-layer-group text-success"></i>
                        <?php echo category(post($current_id)['category_id'])['title']; ?>
                        <i class="fas fa-calendar text-warning"></i>
                        <?php echo date("d-M-Y",strtotime(post($current_id)['created_at'])); ?>
                    </p>
                    <p>
                        <?php echo html_entity_decode(post($current_id)['description']) ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <?php foreach (fPostByCat($current_category_id,2,$current_id) as $p) { ?>
                <div class="col-6 my-2">
                    <?php include "single.php"?>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- posts detail end -->
        <?php require_once "front_panel/right-side-bar.php" ?>
    </div>
</div>

<?php require_once "front_panel/foot.php" ?>

