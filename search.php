<?php require_once "core/base.php" ?>
<?php require_once "core/functions.php" ?>

<?php require_once "front_panel/head.php" ?>


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
        <!-- category based post start -->
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb" class="mt-2 bg-white p-3 mb-3 rounded">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Search by "<?php echo($_POST['search_by']) ?>"</li>
                </ol>
            </nav>
            <?php if(count(searchPost($_POST['search_by'])) == 0) {
                echo alert("There is no result.","danger");
            } ?>
            <?php foreach(searchPost($_POST['search_by']) as $p) { ?>
                <?php include "single.php"?>
            <?php } ?>
        </div>
        <!-- category based post end -->
        <!-- categories & advertisement -->
        <div class="col-12 col-md-4">
            <div class="front-panel-right-side">
                <!-- categories -->
                <h4 class="my-2">Categories</h4>
                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? : 'active' ?>">All Categories</a>
                    <?php foreach (fCategories() as $row) { ?>
                        <a href="category_based_post.php?category_id=<?php echo $row['id'] ?>"
                           class="list-group-item list-group-item-action
                           <?php echo isset($_GET['category_id']) ? ($row['id'] == $_GET['category_id'] ? 'active' : '') : '' ?>">
                            <?php if($row['ordering'] == 1) { ?>
                                <i class="fas fa-star text-success"></i>
                            <?php } ?>
                            <?php echo $row['title'] ?>
                        </a>
                    <?php } ?>
                </div>
                <!-- advertisement -->
                <h4 class="my-2">Advertisement</h4>
                <img class="rounded w-100" src="<?php echo $url ?>/assets/img/ad.png" alt="">
                <!-- search by date -->
                <h4 class="my2">Search by date</h4>
                <div class="card">
                    <div class="card-body">
                        <form action="search_by_date.php" method="get">
                            <input type="date" name="start" class="form-control my-2">
                            <input type="date" name="end" class="form-control my-2">
                            <button class="btn btn-primary my-2" name="searchdate"><i class="fas fa-calendar me-2"></i>Search by date</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "front_panel/foot.php" ?>

