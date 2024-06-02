<html lang="sk">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Porsche - legenda automobilového sveta">
		<meta name="keywords" content="car, Porsche, germany car, sportcar,">
		<meta name="author" content="Taras Strakhov">
		<title>Porsche - legenda automobilového sveta</title>
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	</head>

	<body>
		<?php
			include_once('./partials/header.php');
		?>

		<main>
			<section class="container-main">
				<div class="row">
					<div class="col-100 text-center">
						<p><strong><em> Vitajte vo svete legendárnych automobilov Porsche!</em></strong></p>
					</div>
				</div>
			</section>
			<div class="carousel">
				<div><img src="img/E1D308FABA71409C93560855282CF829_437E590174E049EE91B9C6E16D4E1E72_discovering-porsche-with-dua-lipa-new.jpg" alt="Foto 1"></div>
				<div><img src="img/3698A3126E554226AE9A4FC07017FBB4_8D933D359101497F951C5704F25F6030_discovering-porsche-with-dua-lipa-new-2.jpg" alt="Foto 2"></div>
				<div><img src="img/545FEE9316AF49EBA60516A720644741_0AF58E6F4FC94AB7A84754776ED18928_discovering-porsche-with-dua-lipa-new.jpg" alt="Foto 3"></div>
			</div>
				<section class="container-gallery">
					<div class="gallery-item">
						<img src="img/cayenne.jpg" alt="Cayenne">
						<div class="caption">
							<h3>Cayenne</h3>
							<p>148.000€</p>
						</div>
					</div>

					<div class="gallery-item">
						<img src="img/911.webp" alt="Carrera">
						<div class="caption">
							<h3>911 Carrera</h3>
							<p>230.000€</p>
						</div>
					</div>

					<div class="gallery-item">
						<img src="img/panamera.jpg" alt="Panamera">
						<div class="caption">
							<h3>Panamera</h3>
							<p> 30.000€</p>
						</div>
					</div>

					<div class="gallery-item">
						<img src='img/taycan.jpg' alt="Taycan">
						<div class="caption">
							<h3>Taycan</h3>
							<p>99.000€</p>
						</div>
					</div>

					<div class="gallery-item">
						<img src="img/macan.jpg" alt="macan">
						<div class="caption">
							<h3>Macan</h3>
							<p>45.900€</p>
						</div>
					</div>
					
					<div class="gallery-item">
						<img src="img/718.jpg" alt="718">
						<div class="caption">
							<h3>718</h3>
							<p>68.700€</p>
						</div>
					</div>
				</section>
		</main>

		<?php
			include_once('./partials/footer.php');
		?>
	</body>
</html>