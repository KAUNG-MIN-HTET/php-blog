<!-- table -->
<table class="table table-hover table-striped mb-0 mt-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>User</th>
            <th>Control</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach(categories() as $row) {


        ?>
        <tr class="<?php echo $row['ordering'] == 1 ? 'bg-soft-success' : '' ?>">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php print_r(user($row['user_id'])['name']); ?></td>
            <td>
                <a href="category_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are u sure u want to delete?')"><i class="fas fa-trash-alt"></i></a>
                <!--return ပါမှ cancel နှိပ်ရင်မပျက်မှာ-->
                <a href="category_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                <?php if($row['ordering'] == 0) { ?>
                <a href="category_pin_to_top.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-success"><i class="fas fa-star"></i></a>
                <?php }else { ?>
                <a href="remove_pin.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-star"></i></a>
                <?php } ?>
            </td>
            <td><?php echo dateTime($row['created_at']); ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

</table>