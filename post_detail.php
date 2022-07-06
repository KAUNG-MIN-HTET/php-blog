<?php require_once "./core/auth.php"; ?>
<?php include "./template/header.php"; ?>

<?php
    $current_id = $_GET['id'];
?>

<!--breadcrumb-->
<div class="row">
    <div class="col-12 my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-2 rounded">
                <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>index.php" class="text-pri text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo "$url"; ?>post_add.php" class="text-pri text-decoration-none">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo post($current_id)['title'] ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- item-add part -->
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card border border-0 shadow-sm mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex">
                        <h4 class="mb-0 me-1">
                            <i class="fas fa-info-circle text-pri"></i>
                        </h4>
                        <p class="h4">Post Detail</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo "$url"; ?>item_list.php" class="btn outline-pri"><i class="fal fa-bars text-pri"></i></a>
                    </div>
                </div>
                <hr>
                <div>
                    <h4>
                        <?php echo post($current_id)['title'] ?>
                    </h4>
                    <p class="pt-3">
                        <i class="fas fa-user text-pri"></i>
                        <?php echo user(post($current_id)['user_id'])['name'] ?>
                        <i class="fas fa-layer-group text-success"></i>
                        <?php echo category(post($current_id)['category_id'])['title']; ?>
                        <i class="fas fa-calendar text-warning"></i>
                        <?php echo date("d-M-Y",strtotime(post($current_id)['created_at'])); ?>
                    </p>
                    <p><?php echo html_entity_decode(post($current_id)['description'],ENT_QUOTES) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex">
                        <h4 class="mb-0 me-1">
                            <i class="fas fa-info-circle text-pri"></i>
                        </h4>
                        <p class="h4">Viewer Detail</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="full-screen-btn btn btn-outline-secondary"><i class="fas fa-expand-alt"></i></a>
                    </div>
                </div>
                <hr>
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Device</th>
                            <th>View At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach(viewerCountByPost($current_id) as $v) { ?>
                            <tr>
                                <td class="text-nowrap"><?php
                                    if($v['user_id'] == 0) {
                                        echo "Guest";
                                    }else {
                                        echo user($v['user_id'])['name'];
                                    }
                                    ?></td>
                                <td><?php echo $v['device'] ?></td>
                                <td class="text-nowrap"><?php echo date('j-n-Y',strtotime($v['created_at'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "./template/footer.php"; ?>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "order" : [[0 , "desc"]],
            "pageLength": 5
        });
    });
</script>
