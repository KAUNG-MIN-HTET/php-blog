<?php require_once "./core/auth.php"; ?>
<?php require_once "./core/isAdmin.php"; ?>
<?php include  "./core/functions.php"; ?>
<?php include "./template/header.php"; ?>

    <!--breadcrumb-->
    <div class="row">
        <div class="col-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white p-2 rounded">
                    <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>index.php" class="text-pri text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User List</li>
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
                            <p class="h4">User Lists</p>
                        </div>
                        <a href="<?php echo "$url"; ?>item_list.php" class="btn outline-pri"><i class="fal fa-bars text-pri"></i></a>
                    </div>
                    <table class="table table-striped table-hover mt-3 mb-0" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Money</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach(users() as $row) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $role[$row['role']] ?></td>
                                <td><?php echo $row['money'] ?></td>
                                <td>
                                    <a href="post_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are u sure u want to delete?')"><i class="fas fa-trash-alt"></i></a>
                                    <!--return ပါမှ cancel နှိပ်ရင်မပျက်မှာ-->
                                    <a href="post_edit.php" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                </td>
                                <td><?php echo $row['created_at'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

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
