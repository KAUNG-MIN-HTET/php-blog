<?php require_once "./core/auth.php"; ?>
<?php include "./template/header.php"; ?>

<?php

    $id = $_GET['id'];
    $postid = $_GET['postid'];
    $current_id = $id;

    if(isset($_POST['edit-post'])) {
        updatePost();
    }

?>

    <!--breadcrumb-->
    <div class="row">
        <div class="col-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white p-2 rounded">
                    <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>index.php" class="text-pri text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo "$url"; ?>post_add.php" class="text-pri text-decoration-none">Add Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- item-add part -->
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card border border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <h4 class="mb-0 me-1">
                                <i class="fal fa-plus-circle text-pri"></i>
                            </h4>
                            <p class="h4">Add Post</p>
                        </div>
                        <a href="<?php echo "$url"; ?>item_list.php" class="btn outline-pri"><i class="fal fa-bars text-pri"></i></a>
                    </div>
                    <hr/>
                    <!-- form -->
                    <form action="" method="post">
                        <div class="w-50">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="<?php print_r(post($postid)['title']) ?>" class="form-control">
                            <input type="hidden" name="id" value="<?php print_r(post($postid)['id']) ?>">
                        </div>
                        <div class="w-50 my-2">
                            <select name="category_id" class="form-select">
<!--                                <option selected disabled>Select Category</option>-->
                                <?php foreach(categories() as $c) { ?>
                                    <option value="<?php echo $c['id']; ?>" <?php echo $c['id'] == $current_id?"selected":""; ?>><?php echo $c['title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="w-50">
                            <label for="title">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php print_r(post($postid)['description']) ?></textarea>
                        </div>
                        <hr/>
                        <!--edit item button-->
                        <button class="btn bg-pri text-white" name="edit-post"><i class="fal fa-plus-circle me-1"></i>EDIT POST</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ">/template/footer.php"; ?>