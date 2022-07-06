<!-- posts start -->
<div class="col-12 col-md-8">
    <h4 class="my-2">Posts</h4>
    <?php foreach (fPosts() as $c) { ?>
        <div class="card border-0 shadow-sm my-2">
            <div class="card-body">
                <a href="" class="text-decoration-none text-dark">
                    <h4>
                        <?php echo $c['title'] ?>
                    </h4>
                </a>
                <p class="mt-3">
                    <i class="fas fa-user text-pri"></i>
                    <?php echo user($c['user_id'])['name'] ?>
                    <i class="fas fa-layer-group text-success"></i>
                    <?php echo category($c['category_id'])['title']; ?>
                    <i class="fas fa-calendar text-warning"></i>
                    <?php echo date("d-M-Y",strtotime($c['created_at'])); ?>
                </p>
                <p>
                    <?php echo short(strip_tags(html_entity_decode($c['description'])),500) ?>
                </p>
            </div>
        </div>
    <?php } ?>
</div>
<!-- posts end -->