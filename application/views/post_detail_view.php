<div class="post-detail">
    <div class="container cover">
        <div class="mask">
            <img src="https://images.unsplash.com/photo-1548587449-2c1dcd68cecd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=947&q=80" alt="Cover of Post Detail">
        </div>
    </div>

    <div class="container post-content">
        <div class="post-content-header">
            <h6 class="subtitle-md">
                Category of this Post goes here
            </h6>
            <h4>
                Big Title of this Post appears here!!!
            </h4>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a posuere urna, sit amet aliquet erat. Praesent sit amet elit vitae tortor elementum malesuada sit amet sed ipsum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed suscipit sagittis condimentum. Quisque in commodo ex. In convallis efficitur justo vitae auctor. Mauris bibendum sagittis libero, sed hendrerit risus iaculis at. Suspendisse ut odio egestas, sodales lorem eu, vestibulum diam. Fusce vel ante ut arcu gravida auctor sit amet sed dolor. In nisi enim, sagittis in rhoncus a, posuere et nulla. Sed lacus nisi, placerat ut porttitor sed, porta sit amet metus. Maecenas viverra finibus velit id aliquam. Suspendisse in sollicitudin risus, in cursus turpis. Phasellus sed lobortis eros. Aliquam nec purus eget nunc euismod iaculis id sit amet arcu.
            </p>

            <!-- Below Post Feature appears if post has great feature, if not, delete or comment these below lines -->
            <div class="post-feature">
                <div class="row">
                    <!-- Should be limited no more than 6 items, best with 4 items -->
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                        <div class="feature col-xs-12 col-md-6 col-lg">
                            <h6 class="subtitle-sm">
                                Feature <?php echo $i+1 ?>
                            </h6>
                            <h6>
                                Feature <?php echo $i+1 ?> Detail
                            </h6>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="post-content-body">
            <div class="row">
                <div class="left col-xs-12 col-md-8">
                    <article>
                        <p>Main Post Content goes here</p>
                        <p>
                            Maecenas dictum nulla non ante vulputate finibus. Maecenas vitae mi non mi luctus volutpat ut nec ante. Ut mollis commodo mauris eu vestibulum. Vivamus viverra tellus id dui facilisis, et pharetra dui accumsan. Proin ut gravida dolor. Aenean nulla felis, ullamcorper ut ipsum sit amet, sollicitudin consequat est. Phasellus consequat ultricies ullamcorper. Curabitur sit amet nulla viverra, tincidunt augue quis, convallis metus. In luctus ornare vulputate. Suspendisse potenti. Vestibulum tincidunt semper diam id tincidunt. Praesent id libero quis nunc condimentum luctus nec non tortor.
                        </p>

                        <p>
                            Vestibulum ac erat in tortor scelerisque ultricies. Proin turpis nulla, dignissim sed sagittis ac, finibus sit amet est. Mauris lorem nibh, cursus sagittis euismod et, sagittis quis purus. Etiam a molestie nibh, in tempus libero. Ut dictum ac nisi ut iaculis. Mauris a fermentum ex, sed lacinia odio. Aenean commodo tortor quis mi scelerisque sagittis nec quis orci. Vestibulum sit amet feugiat felis, vitae congue magna. Maecenas dignissim gravida nisl ac egestas.
                        </p>

                        <img src="https://images.unsplash.com/photo-1548587449-2c1dcd68cecd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=947&q=80" alt="Image in Post">

                        <p>
                            Quisque eget libero nec odio tristique vestibulum. Vestibulum sem arcu, porta nec ante sagittis, lacinia viverra nibh. Fusce risus nulla, semper eget nibh a, imperdiet placerat diam. Quisque consectetur risus at lacus tristique, ac volutpat elit venenatis. Aenean nec lorem eros. Nullam volutpat nulla et ex suscipit varius. Phasellus aliquam sodales leo a blandit. Quisque blandit tellus quam, in rhoncus nisl tempor sit amet. Duis commodo bibendum elit in pharetra. Praesent a lacus vel elit scelerisque cursus at vel augue.
                        </p>

                        <p>
                            Mauris eros quam, pharetra aliquam nisi non, dapibus maximus sapien. Aliquam erat volutpat. Vivamus vestibulum vitae nisl vitae facilisis. Integer feugiat tellus pulvinar urna pharetra egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc vitae mattis risus, sed scelerisque libero. In sed quam ut lacus eleifend vehicula. Ut id dolor vel eros dignissim blandit. Mauris porttitor ligula venenatis elementum lacinia.
                        </p>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/sLZZZWN7NnA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </article>

                    <div class="box-cta" style="background-image: url('https://images.unsplash.com/photo-1548587449-2c1dcd68cecd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=947&q=80')">
                        <div class="overlay">
                            <div class="left">
                                <h6 class="subtitle-sm">
                                    Action Subtitle
                                </h6>
                                <h6>
                                    Action Title <b>1900.1900</b>
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

                <div class="right col-xs-12 col-md-4">
					<div class="post-related">
						<div class="post-related-header">
							<h6>
								Related Posts
							</h6>
						</div>
						<div class="post-related-body">
                            <?php for ($i = 0; $i < 3; $i++) { ?>
								<div class="post-item">
									<h6 class="subtitle-sm">
										Category Title
									</h6>
									<h5 class="text-wrapper">
										<a href="<?php echo base_url('') ?>">
											Post <?php echo $i+1 ?> Title here, limits to 3 lines.
										</a>
									</h5>
									<div class="mask">
										<a href="<?php echo base_url('') ?>">
											<img src="https://images.unsplash.com/photo-1548365278-2ee092b7bb18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80" alt="Image of Service <?php echo $i+1 ?>">
										</a>
									</div>
								</div>
                            <?php } ?>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>