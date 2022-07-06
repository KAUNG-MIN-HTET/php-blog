<!-- categories & advertisement -->
<div class="col-12 col-md-4">
    <div class="front-panel-right-side">
        <div class="card">
            <div class="card-body">
                <?php if(isset($_SESSION['user'])) { ?>
                <p>
                    Hello <?php echo $_SESSION['user']['name']; ?>
                </p>
                <a class="btn btn-primary" href="dashboard.php">
                    <i class="fas fa-arrow-right"></i>
                    Go Dashboard
                </a>
                <?php }else { ?>
                <p>
                    Hello Guest
                </p>
                <a class="btn btn-primary" href="register.php">
                    <i class="fas fa-arrow-right"></i>
                    Register here
                </a>
                <?php } ?>
            </div>
        </div>
        <!-- categories -->
        <h4 class="my-2">Categories</h4>
        <div class="list-group">
            <a href="index.php" class="list-group-item list-group-item-action active">All Categories</a>
            <?php foreach (fCategories() as $row) { ?>
                <a href="category_based_post.php?category_id=<?php echo $row['id'] ?>" class="list-group-item list-group-item-action">
                    <?php if($row['ordering'] == 1) { ?>
                        <i class="fas fa-star text-success"></i>
                    <?php } ?>
                    <?php echo $row['title'] ?>
                </a>
            <?php } ?>
        </div>
<!--         advertisement -->
<!--        <h4 class="my-2">Advertisement</h4>-->
<!--        <img class="rounded w-50" src="--><?php //echo $url ?><!--/assets/img/ad.png" alt="">-->
        <!-- search by date -->
        <h4 class="my-2">Search by date</h4>
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