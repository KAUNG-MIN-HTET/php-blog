<?php require_once "./core/auth.php"; ?>
<?php include "./template/header.php"; ?>

<?php

$id = $_GET['id'];
//$postid = $_GET['postid'];

if(isset($_POST['edit-ad'])) {
    updateAd();
}

?>

    <!--breadcrumb-->
    <div class="row">
        <div class="col-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white p-2 rounded">
                    <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>index.php" class="text-pri text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo "$url"; ?>ad_manager.php" class="text-pri text-decoration-none">Ads Manager</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ads</li>
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
                            <p class="h4">Edit ads</p>
                        </div>
                        <a href="<?php echo "$url"; ?>ads_manager.php" class="btn outline-pri"><i class="fal fa-bars text-pri"></i></a>
                    </div>
                    <hr/>
                    <!-- form -->
                    <form action="" method="post">
                        <div class="w-50">
                            <label for="title">Photo</label>
                            <input type="text" id="photo" name="photo" value="<?php print_r(ad($id)['photo']) ?>" class="form-control">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                        <div class="w-50">
                            <label for="title">Link</label>
                            <textarea name="link" class="form-control" id="" cols="30" rows="10"><?php print_r(ad($id)['link']) ?></textarea>
                        </div>
                        <hr/>
                        <!--edit item button-->
                        <button class="btn bg-pri text-white" name="edit-ad"><i class="fal fa-plus-circle me-1"></i>UPDATE AD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ">/template/footer.php"; ?>