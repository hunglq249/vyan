<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<?php if ($this->uri->segment(1) == 'gioi-thieu' && $this->uri->segment(2) != '' && $this->uri->segment(2) != 'danh-sach'): ?>
		<meta name="keywords" content="<?php echo $detail['about_metakeywords'] ?>">
		<meta name="description" content="<?php echo $detail['about_metadescription'] ?>">
	<?php endif ?>

	<?php if ($this->uri->segment(1) == 'bai-viet' && $this->uri->segment(2) == 'chi-tiet'): ?>
		<meta name="keywords" content="<?php echo $detail['post_metakeywords'] ?>">
		<meta name="description" content="<?php echo $detail['post_metadescription'] ?>">
	<?php endif ?>
	
	<!-- TITLE -->
	<title>Vyan Beauty Clinic & Spa</title>

	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="<?php echo site_url('node_modules/') ?>bootstrap/dist/css/bootstrap.min.css">

	<!-- FontAwesome 5 -->
	<link rel="stylesheet" href="<?php echo site_url('node_modules/') ?>@fortawesome/fontawesome-free/css/all.min.css">

	<!-- Style -->
	<link rel="stylesheet" href="<?php echo site_url('assets/scss/') ?>style.css">

	<!--favicon -->
	<link rel="shortcut icon" href="<?php echo site_url('assets/img/') ?>favicon.png" />

	<!-- jQuery -->
	<script src="<?php echo site_url('node_modules/') ?>jquery/dist/jquery.min.js"></script>

	<!-- Popper js -->
	<script src="<?php echo site_url('node_modules/') ?>popper.js/dist/popper.min.js"></script>

	<!-- Bootstrap 4 js -->
	<script src="<?php echo site_url('node_modules/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
	
</head>

<body>

<header>
	<div class="container">
		<div class="nav-brand">
			<a href="<?php echo base_url('') ?>" title="Homepage">
				<img src="<?php echo site_url('assets/img/') ?>logo-w.svg" alt="Logo Vyan">
			</a>
		</div>

		<div class="nav-main">
			<ul>
				<li>
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/') ?>icon/ico-doctor-01.svg" alt="Image About Us">
						<br>
						About Us
					</a>
				</li>

				<li>
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/') ?>icon/ico-surgeon-01.svg" alt="Image Beauty Surgeon">
						<br>
						Beauty Surgeon
					</a>
				</li>

				<li>
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/') ?>icon/ico-skincare-01.svg" alt="Image Skincare & Spa">
						<br>
						Skincare & Spa
					</a>
				</li>

				<li>
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/') ?>icon/ico-others-01.svg" alt="Image Others Care">
						<br>
						Others Care
					</a>
				</li>

				<li>
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/') ?>icon/ico-story-01.svg" alt="Image Customers Story">
						<br>
						Customers Story
					</a>
				</li>

				<li>
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/') ?>icon/ico-image-01.svg" alt="Image About Us">
						<br>
						Images & Videos
					</a>
				</li>
			</ul>
		</div>

		<div class="nav-call">
			<a href="tel:84 1234 5678" class="btn btn-sm btn-light" role="button">
				Call Now!
			</a>
		</div>
	</div>
</header>
