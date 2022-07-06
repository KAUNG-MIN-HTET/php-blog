<?php require_once "./core/auth.php"; ?>
<?php include "./template/header.php"; ?>

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
        <div class="col-12">
            <div class="card border border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex">
                            <h4 class="mb-0 me-1">
                                <i class="fal fa-plus-circle text-pri"></i>
                            </h4>
                            <p class="h4">Post Lists</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="full-screen-btn btn btn-outline-secondary me-3"><i class="fas fa-expand-alt"></i></a>
                            <a href="<?php echo "$url"; ?>post_list.php" class="btn outline-pri"><i class="fal fa-bars text-pri"></i></a>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mb-0" id="table">
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
                            <?php foreach(posts() as $row) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo short($row['title']); ?></td>
                                    <td><?php echo short(strip_tags(html_entity_decode($row['description']))); ?></td>
                                    <td class="text-nowrap"><?php echo category($row['category_id'])['title'] ?></td>
                                    <?php if($_SESSION['user']['role'] < 2) { ?>
                                        <td class="text-nowrap"><?php print_r(user($row['user_id'])['name']); ?></td>
                                    <?php } ?>
                                    <td>
                                        <?php echo count(viewerCountByPost($row['id'])); ?>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="post_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-success""><i class="fas fa-info px-1"></i></a>
                                        <a href="post_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are u sure u want to delete?')"><i class="fas fa-trash-alt"></i></a>
                                        <!--return ပါမှ cancel နှိပ်ရင်မပျက်မှာ-->
                                        <a href="post_edit.php?id=<?php echo $row['category_id']; ?>&postid=<?php echo $row['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td class="text-nowrap"><?php echo date('j-n-Y',strtotime($row['created_at'])) ?></td>
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