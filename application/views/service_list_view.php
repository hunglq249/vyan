<div class="post-list">
    <div class="container cover">
        <div class="mask">
            <img src="<?php echo base_url('assets/upload/service_category_sub_1/' . $detail['slug'] . '/' . $detail['image']) ?>" alt="<?php echo $detail['title'] ?>">
        </div>
    </div>

    <div class="container post-content">
        <div class="post-content-header">
            <h6 class="subtitle-md">
                <?php echo $category['title'] ?>
            </h6>
            <h4>
                <?php echo $detail['title'] ?>
            </h4>

            <?php echo $detail['description'] ?>

        </div>

        <div class="post-content-body">
            <div class="row">
                <?php if ( $result ): ?>
                    <?php foreach ($result as $key => $value): ?>
                        <div class="item col-xs-12 col-md-6 col-lg-4">
                            <a href="<?php echo base_url('dich-vu/' . $detail['slug'] . '/' . $value['slug']) ?>">
                                <div class="inner">
                                    <div class="mask">
                                        <img src="<?php echo base_url('assets/upload/service/' .  $value['slug'] . '/' . $value['image']) ?>" alt="<?php echo $value['title'] ?>">
                                    </div>

                                    <h6 class="text-wrapper"><?php echo $value['title'] ?></h6>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="col-md-6 col-md-offset-5 page">
                <?php echo $page_links ?>
            </div>
        </div>
    </div>
</div>