<?php require_once "./core/auth.php" ?>
<?php require_once "./core/isAdmin&Editor.php" ?>
<?php include "./template/header.php"; ?>

                <?php
                    if(isset($_POST['addCat'])) {
                        if($_POST['title'] === '') {
                            alert("Input can't be empty.","danger");
                        }else {
                            addCategory();
                        }
                    }
                ?>

                <!--breadcrumb-->
                <div class="row">
                    <div class="col-12 my-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 rounded">
                              <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>dashboard.php" class="text-pri text-decoration-none">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Category</li>
                            </ol>
                          </nav>
                    </div>
                </div>
                <!-- item-add part -->
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="card border border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <h4 class="mb-0 me-1">
                                            <i class="fas fa-layer-group text-pri"></i>
                                        </h4>
                                        <p class="h4">Add Category</p>
                                    </div>
                                    <a href="<?php echo "$url"; ?>item_list.php" class="btn outline-pri"><i class="fas fa-bars text-pri"></i></a>
                                </div>
                                <hr/>
                                <!-- form -->
                                <form action="" method="post" class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control d-inline-block" name="title">
                                        </div>
                                        <div class="col-6">
                                            <button class="btn bg-pri text-white" name="addCat">Add Category</button>
                                        </div>
                                    </div>
                                </form>
                                <?php include "category_list.php" ?>
                            </div>
                        </div>
                    </div>
                </div>

<?php include ">/template/footer.php"; ?>
