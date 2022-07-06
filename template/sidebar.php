<!-- navigation side-bar -->
<div class="col-12 col-lg-3 col-xl-2 vh-100 navigation">
    <div class="d-flex justify-content-between align-items-center p-2 logo" style="margin-top: 8px;">
        <p class="fw-bold m-0 h4 text-pri">My Shop</p>
        <button class="btn btn-light hide-navigation d-lg-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <!--list start-->
    <div class="list-group list-group-flush mb-1">
        <a href="<?php echo "$url"; ?>dashboard.php" class="list-group-item">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
    </div>
    <div class="list-group list-group-flush mb-1">
        <a href="<?php echo "$url"; ?>index.php" class="list-group-item">
            <i class="fas fa-arrow-left"></i>
            Go to news
        </a>
    </div>
    <!--span list start-->
    <!-- <div class="list-group list-group-flush mb-3">
      <a href="" class="list-group-item disabled ps-2">Manage Dashboard</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>Add Theme</a>
      <a href="#" class="list-group-item list-group-item-action position-relative">
        <i class="fas fa-bars me-1"></i>
        Extension List
        <span class="badge bg-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">15</span>
      </a>
    </div>
    <div class="list-group list-group-flush mb-3">
      <a href="" class="list-group-item disabled ps-2">Manage Order</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>New Order</a>
      <a href="#" class="list-group-item list-group-item-action position-relative">
        <i class="fas fa-bars me-1"></i>
        Order List
        <span class="badge bg-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">15</span>
      </a>
    </div>
    <div class="list-group list-group-flush mb-3">
      <a href="" class="list-group-item disabled ps-2">Reviews</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>New Review</a>
      <a href="#" class="list-group-item list-group-item-action position-relative">
        <i class="fas fa-bars me-1"></i>
        Review List
        <span class="badge bg-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">15</span>
      </a>
    </div>
    <div class="list-group list-group-flush mb-3">
      <a href="" class="list-group-item disabled ps-2">Ban User</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>Ban</a>
      <a href="#" class="list-group-item list-group-item-action position-relative">
        <i class="fas fa-bars me-1"></i>
        Ban List
        <span class="badge bg-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">15</span>
      </a>
    </div>
    <div class="list-group list-group-flush mb-3">
      <a href="" class="list-group-item disabled ps-2">Stocks</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>Warehouse</a>
      <a href="#" class="list-group-item list-group-item-action position-relative">
        <i class="fas fa-bars me-1"></i>
        Remain Stocks
        <span class="badge bg-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">15</span>
      </a>
    </div>
    <div class="list-group list-group-flush mb-3">
      <a href="" class="list-group-item disabled ps-2">New users</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>Recently</a>
      <a href="#" class="list-group-item list-group-item-action position-relative">
        <i class="fas fa-bars me-1"></i>
        User List
        <span class="badge bg-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">15</span>
      </a>
    </div> -->
    <!--span list end-->
    <!-- post start -->
    <div class="list-group list-group-flush mb-1">
        <a href="" class="list-group-item disabled ps-2">Manage Posts</a>
        <a href="<?php echo "$url"; ?>post_add.php" class="list-group-item list-group-item-action">
            <i class="fal fa-plus-circle me-1"></i>
            Add Post
        </a>
        <a href="<?php echo "$url"; ?>post_list.php" class="list-group-item list-group-item-action position-relative">
            <i class="fas fa-bars me-1"></i>
            Post List
            <span class="badge bg-white text-pri position-absolute top-50 end-0 translate-middle-y rounded-pill"><?php echo countTotal("posts") ?></span>
        </a>
    </div>
    <!-- post end -->
    <!-- profile start -->
    <div class="list-group list-group-flush mb-1">
        <a href="" class="list-group-item disabled ps-2">Wallet</a>
        <a href="<?php echo "$url"; ?>wallet.php" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign me-1"></i>My Wallet</a>
    </div>
    <!-- profile end -->
    <!-- setting start -->
    <?php if($_SESSION['user']['role'] < 2) { ?>
    <div class="list-group list-group-flush mb-1">
        <a href="" class="list-group-item disabled ps-2">Setting</a>
        <!--          <a href="--><?php //echo "$url" ?><!--category_read.php" class="list-group-item list-group-item-action"><i class="fal fa-plus-circle me-1"></i>Category Lists</a>-->
        <a href="<?php echo "$url" ?>category_add.php" class="list-group-item list-group-item-action position-relative">
            <i class="fas fa-layer-group me-1"></i>
            Category Manager
            <span class="badge bg-white text-pri position-absolute top-50 end-0 translate-middle-y rounded-pill"><?php echo countTotal("categories") ?></span>
        </a>
        <?php if($_SESSION['user']['role'] < 1) { ?>
        <a href="<?php echo "$url" ?>ad_manager.php" class="list-group-item list-group-item-action position-relative">
            <i class="fas fa-ad me-1"></i>
            Ad Manager
            <span class="badge bg-white text-pri position-absolute top-50 end-0 translate-middle-y rounded-pill"><?php echo countTotal("ads") ?></span>
        </a>
        <a href="<?php echo "$url" ?>user_list.php" class="list-group-item list-group-item-action position-relative">
            <i class="fas fa-user me-1"></i>
            User List
            <span class="badge bg-white text-pri position-absolute top-50 end-0 translate-middle-y rounded-pill"><?php echo countTotal("users") ?></span>
        </a>
        <?php } ?>
    </div>
    <?php } ?>
    <!-- setting end -->
    <div class="list-group list-group-flush mb-1">
        <a href="" class="list-group-item disabled ps-2">Ban User</a>
        <a href="#" class="list-group-item list-group-item-action" onclick="noti()"><i class="fal fa-plus-circle me-1"></i>Ban</a>
        <a href="#" class="list-group-item list-group-item-action position-relative" onclick="noti()">
            <i class="fas fa-bars me-1"></i>
            Ban List
            <span class="badge bg-white text-pri position-absolute top-50 end-0 translate-middle-y rounded-pill">1</span>
        </a>
    </div>
    <div class="list-group list-group-flush mb-1">
        <a href="logout.php" class="btn btn-danger"><i class="fal fa-lock me-1"></i>Logout</a>
    </div>
    <!--list end-->
</div>