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

						<div class="carousel-caption">
	                        <h6 class="subtitle-md">
									
							</h6>
							<h3 class="text-wrapper">
								<?php echo $value['title'];?>
							</h3>
							<a href="<?php echo $value['url'];?>" class="btn btn-outline-light" role="button">
								Xem chi tiết
							</a>
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
				<a href="<?php echo base_url('service/list_all') ?>" class="btn btn-primary" role="button">
					See all our services
				</a>
			</div>
		</div>
	</div>

	<div class="section whyus">
		<div class="row no-gutters">
			<div class="left col-xs-12 col-md-6">
				<div class="mask">
					<img src="<?php echo site_url('assets/img/test-gif.gif') ?>" alt="Background for Whyus Cover">
				</div>

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
                    <?php for ($i = 0; $i < 4; $i++) { ?>
						<div class="item col-xs-12 col-md-6">
							<a href="<?php echo base_url('') ?>">
								<div class="content">
									<!-- Replace by a 50x50px png image later -->
									<svg class="hospital"
										 version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
										 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
										 xml:space="preserve">
										<path class="line" d="M326.791,497.041h-141.58v-86.485c0-17.732,14.376-32.108,32.108-32.108h77.363
		c17.732,0,32.108,14.376,32.108,32.108v86.485L326.791,497.041L326.791,497.041z"/>
										<path class="line" d="M326.79,512H185.21c-8.262,0-14.959-6.697-14.959-14.959v-86.485
			c0-25.954,21.114-47.067,47.067-47.067h77.364c25.952,0,47.067,21.115,47.067,47.067v86.485
			C341.748,505.303,335.051,512,326.79,512z M200.17,482.082h111.662v-71.526c0-9.456-7.693-17.149-17.149-17.149h-77.364
			c-9.456,0-17.149,7.693-17.149,17.149V482.082z"/>
										<path class="line" d="M113.893,512H22.647c-8.262,0-14.959-6.697-14.959-14.959V354.93
			c0-30.518,24.829-55.346,55.346-55.346c8.262,0,14.959,6.697,14.959,14.959s-6.697,14.959-14.959,14.959
			c-14.021,0-25.429,11.406-25.429,25.429v127.152h76.287c8.262,0,14.959,6.697,14.959,14.959S122.155,512,113.893,512z"/>
										<path class="line" d="M489.355,512h-91.246c-8.262,0-14.959-6.697-14.959-14.959s6.697-14.959,14.959-14.959h76.287
			V354.93c0-14.021-11.406-25.429-25.429-25.429c-8.262,0-14.959-6.697-14.959-14.959s6.697-14.959,14.959-14.959
			c30.518,0,55.346,24.829,55.346,55.346V497.04C504.314,505.303,497.617,512,489.355,512z"/>
										<path class="line" d="M336.272,323.524H175.729c-8.262,0-14.959-6.697-14.959-14.959s6.697-14.959,14.959-14.959h160.543
			c8.262,0,14.959,6.697,14.959,14.959C351.231,316.827,344.534,323.524,336.272,323.524z"/>
										<path class="line" d="M336.272,260.696H175.729c-8.262,0-14.959-6.697-14.959-14.959s6.697-14.959,14.959-14.959h160.543
			c8.262,0,14.959,6.697,14.959,14.959S344.534,260.696,336.272,260.696z"/>
										<path class="line" d="M398.108,512H113.893c-8.262,0-14.959-6.697-14.959-14.959V182.014
			c0-34.794,27.185-63.758,61.891-65.939c0.313-0.019,0.625-0.03,0.938-0.03h188.475c0.313,0,0.625,0.009,0.938,0.03
			c34.705,2.181,61.891,31.144,61.891,65.939v315.029C413.067,505.303,406.369,512,398.108,512z M128.852,482.082h254.297V182.014
			c0-18.896-14.645-34.649-33.421-36.051H162.273c-18.776,1.402-33.421,17.155-33.421,36.051V482.082L128.852,482.082z"/>
										<path class="line" d="M256.001,14.959L256.001,14.959c-17.776,0-32.187,14.41-32.187,32.187v25.273h-25.273
			c-17.776,0-32.187,14.41-32.187,32.187l0,0c0,17.776,14.41,32.187,32.187,32.187h25.273v25.273c0,17.776,14.41,32.187,32.187,32.187
			l0,0c17.776,0,32.187-14.41,32.187-32.187v-25.273h25.273c17.776,0,32.187-14.41,32.187-32.187l0,0
			c0-17.776-14.41-32.187-32.187-32.187h-25.273V47.146C288.187,29.369,273.777,14.959,256.001,14.959z"/>
										<path class="fill" d="M256.001,209.209c-25.996,0-47.146-21.149-47.146-47.146v-10.314h-10.314
			c-25.996,0-47.146-21.149-47.146-47.146s21.149-47.146,47.146-47.146h10.314V47.143C208.855,21.149,230.004,0,256.001,0
			s47.146,21.149,47.146,47.146V57.46h10.314c25.996,0,47.146,21.149,47.146,47.146s-21.149,47.146-47.146,47.146h-10.314v10.314
			C303.146,188.06,281.997,209.209,256.001,209.209z M198.541,87.378c-9.499,0-17.228,7.729-17.228,17.228s7.729,17.228,17.228,17.228
			h25.273c8.262,0,14.959,6.697,14.959,14.959v25.273c0,9.499,7.729,17.228,17.228,17.228c9.499,0,17.228-7.729,17.228-17.228v-25.275
			c0-8.262,6.697-14.959,14.959-14.959h25.273c9.499,0,17.228-7.729,17.228-17.228s-7.729-17.228-17.228-17.228h-25.273
			c-8.262,0-14.959-6.697-14.959-14.959V47.146c0-9.499-7.729-17.228-17.228-17.228s-17.228,7.729-17.228,17.228v25.273
			c0,8.262-6.697,14.959-14.959,14.959C223.814,87.378,198.541,87.378,198.541,87.378z"/>

							</svg>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									</p>
								</div>
							</a>
						</div>
                    <?php } ?>
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
                <?php for ($i = 0; $i < 6; $i++) { ?>
					<div class="item">
						<div class="mask">
							<img src="https://images.unsplash.com/photo-1548365278-2ee092b7bb18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80" alt="Image of Service <?php echo $i + 1 ?>">
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="section-footer">
				<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
					See all our stories
				</a>
			</div>
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
                <?php for ($i = 0; $i < 6; $i++) { ?>
					<div class="item">
						<div class="mask mask-circle">
							<img src="https://images.unsplash.com/photo-1548365278-2ee092b7bb18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80"
								 alt="Image of Service <?php echo $i + 1 ?>">
						</div>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum non eros ac
							luctus. Nulla aliquam lobortis porttitor. Aenean non lobortis nulla. Donec at ligula ut
							justo pharetra elementum vitae a libero. Proin mattis, ligula quis aliquet posuere, tellus
							nibh mollis urna, quis dignissim quam diam eget purus.
						</p>
						<h6 class="subtitle-sm">
							Client <?php echo $i + 1 ?>
						</h6>
					</div>
                <?php } ?>
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
            ]
        });
    });
</script>