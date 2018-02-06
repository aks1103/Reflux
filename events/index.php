<?php
	$relative_path = "../";
	$current_page = "Events";
?>

<!DOCTYPE html>

<head>
	<title>Events | Reflux '16</title>
	<?php include "$relative_path"."embeds/include.php"; ?>
	<link rel="stylesheet" href="../css/panes.css" type="text/css" />
	<link rel="stylesheet" href="../css/events.css" type="text/css" />
	<link rel="stylesheet" href="../css/timeline.css" type="text/css" />
</head>

<body>

	<?php include '../embeds/navbar.php'; ?>

	<div class="container-fluid page-content">

		<div class="hidden-lg hidden-md">
			<p>
			<button type="button" class="btn hamburgerButton">
				<i class="fa fa-bars"></i>
			</button>
			<h3 class="text-center" style="color: #F1C40F;">EVENTS</h3>
			</p>
		</div>

		<div class="row">
			<div class="listPane col-md-3">
				<div>
					<div data-render="exhibitions">		Exhibitions		</div>
					<div data-render="lecture_series">	Lecture Series	</div>
					<div data-render="panel_discussion">Panel discussion</div>
					<div data-render="startup_showcase">Startup showcase</div>
					<div data-render="workshops">		Workshops		</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="container-fluid contentPane">
					<div id="menu"><?php include 'menu.html'; ?></div>
					<div id="exhibitions"><?php include 'exhibitions.html'; ?></div>
					<div id="lecture_series"><?php include 'lecture_series.html'; ?></div>
					<div id="panel_discussion"><?php include 'panel_discussion.html'; ?></div>
					<div id="startup_showcase"><?php include 'startup_showcase.html'; ?></div>
					<div id="workshops"><?php include 'workshops.html'; ?></div>
				</div>	
			</div>
		</div>

	</div>

	<script type="text/javascript" src="../js/panes.js"></script>
		
</body>