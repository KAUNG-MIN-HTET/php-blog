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
        <?php include "./ads.php" ?>
        <!-- ad end -->
        <!-- posts start -->
        <div class="col-12 col-md-8">
            <div class="dropdown">
                <button class="btn btn-primary d-block ms-auto dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-sort"></i>
                    Sorting
                </button>
                <ul class="dropdown-menu custom-dropdown" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="?orderby=created_at&sorting=desc">
                            <i class="fas fa-sort-circle-up"></i>
                            Newest to oldest
                        </a></li>
                    <li><a class="dropdown-item" href="?orderby=created_at&sorting=asc">
                            <i class="fas fa-sort-circle-down"></i>
                            Oldest to newest
                        </a></li>
                    <li><a class="dropdown-item" href="">
                            <i class="fas fa-list"></i>
                            Default
                        </a></li>
                </ul>
            </div>
            <h4 class="my-2">Posts</h4>
            <?php
            if(isset($_GET['orderby']) && isset($_GET['sorting'])) {
                $orderby = $_GET['orderby'];
                $sorting = strtoupper($_GET['sorting']);
                $post = fPosts($orderby,$sorting);
            }else {
                $post = fPosts();
            }

            foreach ($post as $p) {
                include "./single.php";
            } ?>
        </div>
        <!-- posts end -->
        <?php require_once "./front_panel/right-side-bar.php" ?>
    </div>
</div>