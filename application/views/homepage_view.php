<div id="homepage">
	<div id="slideHomepage" class="carousel slide carousel-fade" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach ($banner as $key => $value): ?>
				<li data-target="#slideHomepage" data-slide-to="<?php echo $key ?>"
					class="<?php echo ($key == 0) ? 'active' : '' ?>"></li>
			<?php endforeach ?>
		</ol>
		<div class="carousel-inner">
			<!-- Import Slider database Here -->
			<?php if ($banner): ?>
				<?php foreach ($banner as $key => $value): ?>
					<div class="carousel-item <?php echo ($key == 0) ? 'active' : '' ?>">
						<div class="mask">
							<!-- Test Slider -->
							<img src="<?= base_url('assets/upload/banner/' . $value['image'] ) ?>"
									 alt="Image Slide <?php echo $key + 1 ?>">
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		<a class="carousel-control-prev" href="#slideHomepage" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slideHomepage" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<div class="section about">
		<div class="row no-gutters">
			<div class="left col-xs-12 col-md-6">
				<div class="section-intro">
					<h5 class="heading wow fadeInUp">
						Our Professional Doctors
					</h5>

					<p class="wow fadeInUp">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum non eros ac luctus.
						Nulla aliquam lobortis porttitor. Aenean non lobortis nulla. Donec at ligula ut justo pharetra
						elementum vitae a libero. Proin mattis, ligula quis aliquet posuere, tellus nibh mollis urna,
						quis dignissim quam diam eget purus.
					</p>
				</div>
			</div>

			<div class="right col-xs-12 col-md-6">
				<div id="slideAbout" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
							<li data-target="#slideAbout" data-slide-to="<?php echo $i ?>"
								class="<?php echo ($i == 0) ? 'active' : '' ?>"></li>
                        <?php } ?>
					</ol>
					<div class="carousel-inner">
                        <?php if($doctors){ ?>
                            <?php foreach($doctors as $key => $value){ ?>
                                <div class="carousel-item <?php echo ($key == 0) ? 'active' : '' ?>">
                                    <div class="mask">
                                        <img src="<?php echo base_url('assets/upload/doctor/' . $value['image']) ?>"
                                             alt="Image Slide <?php echo $key; ?>">
                                    </div>
                                    <div class="carousel-caption">
                                        <h6>
                                            <?php echo $value['name']; ?>
                                        </h6>
                                        <p><?php echo $value['title']; ?></p>
                                        <ul>
                                            <li><?php echo $value['biography']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
					</div>
					<a class="carousel-control-prev" href="#slideAbout" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#slideAbout" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="section services">
		<div class="container">
			<div class="section-intro">
				<h5 class="heading wow fadeInUp">
					Our services at Vyan Beauty Clinic & Spa
				</h5>

				<p class="wow fadeInUp">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum non eros ac luctus. Nulla
					aliquam lobortis porttitor. Aenean non lobortis nulla. Donec at ligula ut justo pharetra elementum
					vitae a libero. Proin mattis, ligula quis aliquet posuere, tellus nibh mollis urna, quis dignissim
					quam diam eget purus.
				</p>
			</div>

			<div class="owl-carousel services">
				<?php if ( $list_service ): ?>
					<?php foreach ($list_service as $key => $value): ?>
						<div class="item">
							<div class="mask mask-circle">
								<img src="<?php echo base_url('assets/upload/service/' . $value['slug'] . '/' . $value['image']) ?>"
									 alt="<?php echo $value['title'] ?>">
							</div>

							<p>
								<?php echo $value['title'] ?>
							</p>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>

			<div class="section-footer">
				<a href="<?php echo base_url('dich-vu') ?>" class="btn btn-primary" role="button">
					See all our services
				</a>
			</div>
		</div>
	</div>

	<div class="section whyus">
		<div class="row no-gutters">
			<div class="left col-xs-12 col-md-6">
				<?php if ( $commercial ): ?>
					<?php if ( $commercial['is_active'] == 0 ): ?>
						<?php if ( $commercial['image'] && file_exists('assets/upload/why/commercial/' . $commercial['image']) && is_file('assets/upload/why/commercial/' . $commercial['image']) ): ?>
							<div class="mask">
								<img src="<?php echo base_url('assets/upload/why/commercial/' . $commercial['image']) ?>" alt="Background for Whyus Cover">
							</div>
						<?php else: ?>
							<div class="mask">
								<img src="<?php echo base_url('assets/img/no-image.jpg') ?>" alt="Background for Whyus Cover">
							</div>
						<?php endif ?>
					<?php else: ?>
						<?php echo $commercial['iframe'] ?>
					<?php endif ?>
					
				<?php endif ?>
				<div class="overlay"></div>

				<div class="wrapper">
					<div class="row">
						<div class="title col-xs-12 col-md-6">
							<h5>
								Why should chosing us?
							</h5>
						</div>

						<div class="desc col-xs-12 col-md-6">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris varius lacus in mollis
								vestibulum.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="right col-xs-12 col-md-6">
				<div class="row no-gutters">
					<!-- Must be 4 items -->
					<?php if ($why): ?>
						<?php foreach ($why as $key => $value): ?>
							<div class="item col-xs-12 col-md-6">
								<a href="<?php echo base_url('tai-sao-chon-vyan/' . $value['slug']) ?>">
									<div class="content">
										<!-- Replace by a 50x50px png image later -->
										<i class="fa fa-3x <?php echo $value['icon'] ?>" aria-hidden="true"></i>

										<p>
											<?php echo $value['title'] ?>
										</p>
									</div>
								</a>
							</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section story">
		<div class="container">
			<div class="section-intro">
				<h5 class="heading wow fadeInUp">
					Customers's Story
				</h5>
			</div>

			<div class="slicker">
				<?php if ($transform): ?>
					<?php foreach ($transform as $key => $value): ?>
						<div class="item">
							<a href="<?php echo base_url('ket-qua/' . $value['slug']) ?>">
								<div class="mask after" data-id="<?php echo $value['id'] ?>">
									<img src="<?php echo base_url('assets/upload/transform/image_after/' . $value['image_after']) ?>" alt="<?php echo $value['name'] . ' trước'; ?>">

									<div class="info">
										<h6>
											<?php echo $value['name'] ?>
										</h6>
										<p><?php echo $value['age'] ?></p>
									</div>
								</div>

								<div class="mask before">
									<img src="<?php echo base_url('assets/upload/transform/image_before/' . $value['image_before']) ?>" alt="<?php echo $value['name'] . ' sau'; ?>">
								</div>
							</a>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>

			<div class="detail-info">
				<p class="transform-title"></p>
				<p class="transform-intro"></p>
			</div>

			<!--
			<div class="section-footer">
				<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
					See all our stories
				</a>
			</div>
			-->
		</div>
	</div>

	<div class="section testimonial">
		<div class="background-image"
			 style="background-image: url('https://images.unsplash.com/photo-1548358520-2ef49c127e51?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80')"></div>
		<div class="overlay"></div>
		<div class="container">
			<div class="section-intro">
				<h5 class="heading wow fadeInUp">
					Testimonial
				</h5>
			</div>

			<div class="owl-carousel comments">
				<?php if ($customer): ?>
					<?php foreach ($customer as $key => $value): ?>
						<div class="item">
							<div class="mask mask-circle">
								<img src="<?php echo base_url('assets/upload/customer/' . $value['image']) ?>" alt="<?php echo $value['title'] ?>">
							</div>

							<p>
								<?php echo $value['description'] ?>
							</p>
							<h6 class="subtitle-sm">
								<?php echo $value['title'] ?>
							</h6>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo site_url('node_modules/') ?>animate.css/animate.min.css">

<!-- slick css -->
<link rel="stylesheet" href="<?php echo site_url('node_modules/') ?>slick-carousel/slick/slick.css">
<link rel="stylesheet" href="<?php echo site_url('node_modules/') ?>slick-carousel/slick/slick-theme.css">

<!-- owl carousel css -->
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">

<!-- wow.js -->
<script src="<?php echo site_url('node_modules/') ?>wow.js/dist/wow.min.js"></script>

<!-- owl carousel js -->
<script src="<?php echo site_url('assets/lib/') ?>OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>

<!-- slick js -->
<script src="<?php echo site_url('node_modules/') ?>slick-carousel/slick/slick.js"></script>

<script>
    $(document).ready(function () {

        $(".services .owl-carousel").owlCarousel({
            loop: true,
            center: true,
            margin: 15,
			nav: true,
			dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 6
                }

            }
        });

        $(".owl-carousel.comments").owlCarousel({
            loop: true,
            center: true,
            mouseDrag: false,
            items: 1,
            nav: true,
            dots: false
        });

        new WOW().init();

        $('.slicker').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ],

        }).on('afterChange', function(event, slick, currentSlide, nextSlide){
            // finally let's do this after changing slides
            id = $('.slick-track').find('.slick-center').find('.after').data('id');
            $.ajax({
	            method: 'GET',
	            url: HOSTNAME + '/homepage/get_intro_article',
	            data: {
	            	id : id, is_session : false
	            },
	            success: function(response){
	                if ( response.status == 200 ) {
	                	if ( response.result != '' ) {
	                		$('.transform-title').html(response.result.title_basic);
	                		$('.transform-intro').html(response.result.description_basic);
	                	}
	                }
	            },
	            error: function(jqXHR, exception){
	                console.log(errorHandle(jqXHR, exception));
	            }
	        });
        });

        $('.slick-track').each(function(){
        	id = $(this).find('.slick-center').find('.after').data('id');
        	$.ajax({
	            method: 'GET',
	            url: HOSTNAME + '/homepage/get_intro_article',
	            data: {
	            	id : id, is_session : true
	            },
	            success: function(response){
	                if ( response.status == 200 ) {
	                	if ( response.result != '' ) {
	                		$('.transform-title').html(response.result.title_basic);
	                		$('.transform-intro').html(response.result.description_basic);
	                	}
	                }
	            },
	            error: function(jqXHR, exception){
	                console.log(errorHandle(jqXHR, exception));
	            }
	        });
        })
    });

$('.slider')
        
</script>
