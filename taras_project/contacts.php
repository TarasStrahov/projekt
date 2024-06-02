<!DOCTYPE html>
<html lang="sk">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Kontakty</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>

	<body>
		<?php
			include_once('./partials/header.php');
		?>

		<main>
			<div class="contact-table">
				<table>
					<thead>
						<tr>
							<th>Meno</th>
							<th>Email</th>
							<th>Telefone-cislo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Taras Strahov</td>
							<td>taras.strahov@gmail.com</td>
							<td>+09505279600</td>
						</tr>
							<td>Example</td>
							<td>example@gmail.com</td>
							<td>+09505279600</td>
					</tbody>
				</table>
			</div>
			<section>
				<h2>Kontaktný formulár:</h2>
				<form id="contactForm"  action="thankyou.html" method="post">
					<label for="name">Meno:</label>
					<input type="text" id="name" name="name" required>
					
					<label for="email">E-mail:</label>
					<input type="email" id="email" name="email" required>

					<label for="telefone-cislo">Telefone cislo:</label>
					<input type="text" id="name" name="name" required>
					
					<label for="message">Správa:</label>

					<input type="submit" value="Odoslat">
				</form>
			</section>
		</main>
		
		<?php
			include_once('./partials/footer.php');
		?>
	</body>
</html>
