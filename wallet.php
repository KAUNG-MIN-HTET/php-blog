<?php require_once "./core/auth.php" ?>
<?php include "./template/header.php"; ?>

<?php
if(isset($_POST['pay'])) {
    if(payNow()) {
        linkTo("wallet.php");
    }
}
?>

<!--breadcrumb-->
<div class="row">
    <div class="col-12 my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-2 rounded">
                <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>dashboard.php" class="text-pri text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
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
                            <i class="fas fa-dollar-sign text-pri"></i>
                        </h4>
                        <p class="h4">My Wallet</p>
                    </div>
                    <a href="<?php echo "$url"; ?>item_list.php" class="btn btn-outline-primary">
                        <i class="fas fa-dollar-sign"></i>
                        Your money : $ <?php echo user($_SESSION['user']['id'])['money'] ?>
                    </a>
                </div>
                <hr/>
                <!-- form -->
                <form method="post" class="mb-3">
                    <div class="d-flex gap-1">
                        <select name="to_user" id="" class="form-select" required>
                            <option value="0" selected disabled>Select user</option>
                            <?php foreach(users() as $user) { ?>
                                <option value="<?php echo $user['id']; ?>" class="<?php echo $user['id'] == $_SESSION['user']['id'] ? 'd-none' : ''; ?>"><?php echo $user['name'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="number" name="amount" placeholder="amount" class="form-control" min="100" max="<?php echo user($_SESSION['user']['id'])['money'] ?>" required>
                        <input type="text" name="description" placeholder="description" class="form-control" required>
                        <button name="pay" class="btn btn-primary bg-pri">Pay</button>
                    </div>
                </form>
                <hr/>
                <div class="row">
                    <div class="col-12">
                        <table id="table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Date / Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(transitions() as $t) { ?>
                                    <tr>
                                        <td><?php echo $t['id'] ?></td>
                                        <td><?php echo user($t['from_user'])['name'] ?></td>
                                        <td><?php echo user($t['to_user'])['name'] ?></td>
                                        <td><?php echo $t['amount'] ?></td>
                                        <td><?php echo $t['description'] ?></td>
                                        <td><?php echo date('d-m-y / h:i',strtotime($t['created_at'])) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
