<div class="card">
    <div class="card-body">
        <a href="detail.php?id=<?php echo $p['id'] ?>&category_id=<?php echo $p['category_id'] ?>" class="text-decoration-none text-dark">
            <h4 class="ptitle text-primary">
                <?php echo $p['title'] ?>
            </h4>
        </a>
        <p class="mt-3">
            <i class="fas fa-user text-pri"></i>
            <?php echo user($p['user_id'])['name'] ?>
            <i class="fas fa-layer-group text-success"></i>
            <?php echo category($p['category_id'])['title']; ?>
            <i class="fas fa-calendar text-warning"></i>
            <?php echo date("d-M-Y",strtotime($p['created_at'])); ?>
        </p>
        <p class="text-black-50">
            <?php echo short(strip_tags(html_entity_decode($p['description'])),500) ?>
        </p>
    </div>
</div>