<?php require_once "./core/auth.php"; ?>
<?php include "./template/header.php"; ?>

<?php
if (isset($_POST['addpost'])) {
    addPost();
}
?>

<!--breadcrumb-->
<div class="row">
    <div class="col-12 my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-2 rounded">
                <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>index.php" class="text-pri text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Posts</li>
            </ol>
        </nav>
    </div>
</div>
<!-- item-add part -->
<form class="row" action="" method="post">
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
                <hr />
                <div class="">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="mt-2">
                    <label for="title">Description</label>
                    <textarea name="description" id="summernote" class="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card border border-0 shadow-sm mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <h4 class="mb-0 me-1">
                            <i class="fas fa-layer-group text-pri"></i>
                        </h4>
                        <p class="h4">Select Category</p>
                    </div>
                    <a href="<?php echo "$url"; ?>category_add.php" class="btn outline-pri"><i class="fal fa-bars text-pri"></i></a>
                </div>
                <hr />
                <div class=" mt-2">
                    <?php foreach (categories() as $c) { ?>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio<?php echo $c['id'] ?>" value="<?php echo $c['id'] ?>" name="categories_id">
                            <label for="customRadio<?php echo $c['id'] ?>"><?php echo $c['title'] ?></label>
                        </div>
                    <?php } ?>
                </div>
                <!--add item button-->
                <button class="btn bg-pri text-white mt-3" name="addpost"><i class="fal fa-plus-circle me-1"></i>ADD POST</button>
            </div>
        </div>
    </div>
</form>

<?php include ">/template/footer.php"; ?>

<script>
    $(document).ready(function() {
        $("#summernote").summernote({
            placeholder: 'Hello Bootstrap 5',
            height: 300
        });
    })
</script>