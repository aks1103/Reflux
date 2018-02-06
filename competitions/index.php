<?php
	$relative_path = "../";
	$current_page = "Competitions";
?>

<!DOCTYPE html>

<head>
	<title>Competitions | Reflux '16</title>
	<?php include "$relative_path"."embeds/include.php"; ?>
	<link rel="stylesheet" href="../css/panes.css" type="text/css" />
	<link rel="stylesheet" href="../css/competitions.css" type="text/css" />

</head>

<body>

	<?php include '../embeds/navbar.php'; ?>

	<div class="container-fluid page-content">

		<div class="hidden-lg hidden-md">
			<p>
			<button type="button" class="btn hamburgerButton">
				<i class="fa fa-bars"></i>
			</button>
			<h3 class="text-center" style="color: #F1C40F;">COMPETITIONS</h3>
			</p>
		</div>

		<div class="row">
			<div class="listPane col-md-3">
				<div>
					<div data-render="case_study">			Case study					</div>
					<div data-render="green_tech">			Green Tech					</div>
					<div data-render="ideation">			Ideation challenge 1.0		</div>
					<div data-render="industrial_design">	Industrial design problem	</div>
					<div data-render="quiz">				Mega Quiz					</div>
					<div data-render="paper_presentation">	Paper presentation			</div>
					<div data-render="photography">			Photography competition		</div>
					<div data-render="poster_presentation">	Poster presentation			</div>
					<div data-render="process_design">		Process design problem		</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="container-fluid contentPane">
					<div id="menu"><?php include 'menu.html'; ?></div>
					<div id="case_study"><?php include 'case_study.html'; ?></div>
					<div id="green_tech"><?php include 'green_tech.html'; ?></div>
					<div id="ideation"><?php include 'ideation.html'; ?></div>
					<div id="industrial_design"><?php include 'industrial_design.html'; ?></div>
					<div id="quiz"><?php include 'quiz.html'; ?></div>
					<div id="paper_presentation"><?php include 'paper_presentation.html'; ?></div>
					<div id="photography"><?php include 'photography.html'; ?></div>
					<div id="poster_presentation"><?php include 'poster_presentation.html'; ?></div>
					<div id="process_design"><?php include 'process_design.html'; ?></div>
				</div>	
			</div>
		</div>

	</div>
	
	<script type="text/javascript" src="../js/panes.js"></script>
		
</body>