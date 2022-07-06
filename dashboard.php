<?php require_once "core/auth.php" ?>
<?php require_once("template/header.php"); ?>

    <!-- count numbers part -->
    <div class="row">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card my-3 status-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <i class="fas fa-eye text-pri h1 mb-0"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 fw-bolder">
                                <span class="counter-up"><?php echo countTotal("viewers") ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total Viewers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card my-3 status-card" onclick="go('<?php echo $url ?>post_list.php')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <i class="fas fa-newspaper text-pri h1 mb-0"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 fw-bolder">
                                <span class="counter-up"><?php echo countTotal("posts") ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total Posts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card my-3 status-card" onclick="go('<?php echo $url ?>category_add.php')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <i class="fas fa-layer-group text-pri h1 mb-0"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 fw-bolder">
                                <span class="counter-up"><?php echo countTotal("categories") ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total Categories</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card my-3 status-card" onclick="go('<?php echo $url ?>user_list.php')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <i class="fas fa-user text-pri h1 mb-0"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 fw-bolder">
                                <span class="counter-up"><?php echo countTotal("users") ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-end">
        <!-- line-chart -->
        <div class="col-12 col-md-8">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Transitions & Viewers</h4>
                        <div class="image">
                            <img src="<?php $url ?>assets/img/user1.jpg" class="shadow-sm" alt="user1">
                            <img src="<?php $url ?>assets/img/user2.jpg" class="shadow-sm" alt="user2">
                            <img src="<?php $url ?>assets/img/user3.jpg" class="shadow-sm" alt="user3">
                            <img src="<?php $url ?>assets/img/user4.jpg" class="shadow-sm" alt="user4">
                            <img src="<?php $url ?>assets/img/user5.jpg" class="shadow-sm" alt="user5">
                        </div>
                    </div>
                    <canvas id="ov" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
        <!--carousel item -->
        <!-- <div class="col-12 col-md-6 col-lg-5">
            <div class="card mt-lg-0 shadow-sm mb-3 mb-md-0 mb-lg-3" style="margin-top: 60px">
                <div id="carouselExampleIndicators" class="carousel slide item-card-carousel" data-bs-ride="carousel">
                    <div class="carousel-indicators" style="bottom: -10px">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-secondary" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-secondary" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-secondary" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="bg-secondary" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body">
                                <div class="item-card d-flex justify-content-between align-items-center">
                                    <div class="mt-5 w-50">
                                        <h4 class="fw-bold">Coffee Cup</h4>
                                        <small class="mb-2 d-inline-block text-black-50">1500 MMK</small>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped w-50 bg-pri"></div>
                                        </div>
                                    </div>
                                    <img src="<?php $url ?>assets/img/item1.png" alt="item1">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body">
                                <div class="item-card d-flex justify-content-between align-items-center">
                                    <div class="mt-5 w-50">
                                        <h4 class="fw-bold">Stick</h4>
                                        <small class="mb-2 d-inline-block text-black-50">12000 MMK</small>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped w-100 bg-pri"></div>
                                        </div>
                                    </div>
                                    <img src="<?php $url ?>assets/img/item2.png" alt="item2">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body">
                                <div class="item-card d-flex justify-content-between align-items-center">
                                    <div class="mt-5 w-50">
                                        <h4 class="fw-bold">Book</h4>
                                        <small class="mb-2 d-inline-block text-black-50">5000 MMK</small>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped w-25 bg-pri"></div>
                                        </div>
                                    </div>
                                    <img src="<?php $url ?>assets/img/item3.png" alt="item3">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body">
                                <div class="item-card d-flex justify-content-between align-items-center">
                                    <div class="mt-5 w-50">
                                        <h4 class="fw-bold">Name Card</h4>
                                        <small class="mb-2 d-inline-block text-black-50">4000 MMK</small>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped w-75 bg-pri"></div>
                                        </div>
                                    </div>
                                    <img src="<?php $url ?>assets/img/item4.png" alt="item4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- doughnut chart-->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Posts & Categories</h4>
                        <div class="icon">
                            <i class="fas fa-chart-pie h4 mb-0 text-pri"></i>
                        </div>
                    </div>
                    <div class="">
                        <canvas id="opChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- posts-table -->
        <div class="col-12">
            <div class="card shadow-sm mt-3 mt-lg-0 mb-3">
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-1">
                    <h4 class="mb-0 ps-2 fw-bolder">Current Posts</h4>
                    <div class="icon pe-4">
                            <?php
                                $currentUser = $_SESSION['user']['id'];
                                $totalPosts = countTotal("posts");
                                $userPosts = countTotal("posts","user_id = $currentUser");
                                $postPercent = ($userPosts / $totalPosts) * 100;

                                $finalPercent = ceil($postPercent);
                            ?>
                        <p class="mb-0">Your posts <?php echo $userPosts ?></p>
                        <div class="progress" style="width: 200px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $finalPercent ?>%"><?php echo $finalPercent ?>%</div>
                        </div>
                        <!-- <i class="fas fa-ellipsis-v h6 mb-0 text-pri"></i> -->
                    </div>
                </div>
                <table class="table table-hover my-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php if($_SESSION['user']['role'] < 2) { ?>
                                <th>User</th>
                            <?php } ?>
                            <th>Viewers</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach(dashboardPosts() as $p) { ?>
                        <tr>
                            <td><?php echo $p['id'] ?></td>
                            <td><?php echo short($p['title']); ?></td>
                            <td><?php echo short(strip_tags(html_entity_decode($p['description']))); ?></td>
                            <td class="text-nowrap"><?php echo category($p['category_id'])['title'] ?></td>
                            <?php if($_SESSION['user']['role'] < 2) { ?>
                                <td class="text-nowrap"><?php print_r(user($p['user_id'])['name']); ?></td>
                            <?php } ?>
                            <td>
                                <?php echo count(viewerCountByPost($p['id'])); ?>
                            </td>
                            <td class="text-nowrap">
                                <a href="post_detail.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-success""><i class="fas fa-info px-1"></i></a>
                                <a href="post_delete.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are u sure u want to delete?')"><i class="fas fa-trash-alt"></i></a>
                                <!--return ပါမှ cancel နှိပ်ရင်မပျက်မှာ-->
                                <a href="post_edit.php?id=<?php echo $p['category_id']; ?>&postid=<?php echo $p['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-nowrap"><?php echo date('j-n-Y',strtotime($p['created_at'])) ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <?php
        $catName = [];
        $countTotalByCategory = [];
        foreach(categories() as $c) {
            array_push($catName,$c['title']);
            array_push($countTotalByCategory,countTotal("posts","category_id = {$c['id']}"));
        }


        $dateArr = [];
        $visitorRate = [];
        $transitionRate = [];

        $today = date('Y-m-d');

        for($i=0;$i<10;$i++) {
            $date = date_create($today);

            date_sub($date,date_interval_create_from_date_string("$i days"));
            $current = date_format($date,"Y-m-d");
            array_push($dateArr,$current);
            $result = countTotal("viewers","CAST(created_at AS DATE) = '$current'");
            array_push($visitorRate,$result);

            $transitionResult = countTotal("transitions","CAST(created_at AS DATE) = '$current'");
            array_push($transitionRate,$transitionResult);
        }

//        echo json_encode($dateArr);

        ?>

<?php require_once("template/footer.php"); ?>