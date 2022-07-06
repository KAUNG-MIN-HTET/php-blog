<?php require_once "./core/auth.php" ?>
<?php include "./template/header.php"; ?>

<?php

$id = $_GET['id'];
$current = category($id);

if(isset($_POST['updateCat'])) {
    if($_POST['title'] === '') {
        alert("Input can't be empty.","danger");
    }else {
        if(updateCategory()){
            linkTo("category_add.php");
        }
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
        <div class="col-12 col-lg-8">
            <div class="card border border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <h4 class="mb-0 me-1">
                                <i class="fas fa-layer-group text-pri"></i>
                            </h4>
                            <p class="h4">Update Category</p>
                        </div>
                        <a href="<?php echo "$url"; ?>item_list.php" class="btn outline-pri"><i class="fas fa-bars text-pri"></i></a>
                    </div>
                    <hr/>
                    <!-- form -->
                    <form action="" method="post" class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" class="form-control d-inline-block" name="id" value="<?php echo $current['id'] ?>">
                                <input type="text" class="form-control d-inline-block" name="title" value="<?php echo $current['title'] ?>">
                            </div>
                            <div class="col-6">
                                <button class="btn bg-pri text-white" name="updateCat">Update</button>
                            </div>
                        </div>
                    </form>
                    <?php include "category_list.php" ?>
                </div>
            </div>
        </div>
    </div>

<?php include ">/template/footer.php"; ?>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "order" : [[0 , "desc"]],
            "pageLength": 5
        });
    });
</script>
