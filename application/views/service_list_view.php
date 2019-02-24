<div class="post-list">
    <div class="container cover">
        <div class="mask">
            <img src="https://images.unsplash.com/photo-1550847067-93887e03cfbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2089&q=80" alt="Cover of Post List">
        </div>
    </div>

    <div class="container post-content">
        <div class="post-content-header">
            <h6 class="subtitle-md">
                Category SubTitle
            </h6>
            <h4>
                Category Title
            </h4>

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam, orci id lacinia porta, diam nulla ultricies tellus, eget gravida mi mauris a lectus. Ut fringilla dignissim mauris, ut tincidunt enim interdum eu. Nunc venenatis enim vel eros rutrum, vitae dapibus ligula dapibus. Sed scelerisque tellus nec maximus scelerisque. Praesent auctor interdum gravida. Proin ac quam libero. Duis consequat ultricies arcu sed consectetur. Fusce aliquam tempus turpis non venenatis. Cras convallis urna pellentesque massa tempor, at congue lectus varius.

        </div>

        <div class="post-content-body">
            <div class="row">
                <?php for($i = 0; $i < 9; $i++) { ?>
                    <div class="item col-xs-12 col-md-6 col-lg-4">
                        <a href="#">
                            <div class="inner">
                                <div class="mask">
                                    <img src="https://images.unsplash.com/photo-1550847067-93887e03cfbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2089&q=80" alt="Image of Service">
                                </div>

                                <h6 class="text-wrapper">Category II/ Service Title Category II/ Service Title Category II/ Service Title</h6>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>