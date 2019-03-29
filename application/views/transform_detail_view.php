<div class="post-detail">
    <div class="container cover">
        <div class="mask">
            <img src="<?php echo base_url('assets/upload/transform/image_after/' . $detail['image_after']); ?>" alt="Cover of Post Detail">
        </div>
    </div>

    <div class="container post-content">
        <div class="post-content-header">
            <h4>
                <?php echo $detail['title_advanced'] ?>
            </h4>

            <?php echo $detail['description_advanced'] ?>
        </div>

        <div class="post-content-body">
            <div class="row">
                <div class="left col-xs-12 col-md-12">
                    <article>
                        <?php echo $detail['body_advanced'] ?>
                    </article>

                    <div class="box-cta" style="background-image: url('https://images.unsplash.com/photo-1548587449-2c1dcd68cecd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=947&q=80')">
                        <div class="overlay">
                            <div class="left">
                                <h6 class="subtitle-sm">
                                    Action Subtitle
                                </h6>
                                <h6>
                                    Action Title <b>024 2120 2888</b>
                                </h6>
                            </div>

                            <div class="right">
                                <a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                                    Register to get Advise right now!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
