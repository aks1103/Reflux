<?php
	if(!isset($navbar_style) || $navbar_style=="")
		$navbar_style = "navbar-static-top navbar-transparent";
?>
<nav class="navbar navbar-inverse capitalfont <?php echo $navbar_style; ?>">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href='<?= $relative_path ?>' title="Reflux, IIT Guwahati">
				<img src=<?php echo "$relative_path","images/logo/logo_date.png"; ?> alt="Reflux logo" style="width:120px;">
			</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php if($current_page=="HomePage") { ?>
					<li><a href='#home'>Home</a></li>
					<li><a href='#about'>About</a></li>
					<li><a href='#events'>Events</a></li>
					<li><a href='#competitions'>Competitions</a></li>
					<li><a href='#sponsors'>Sponsors</a></li>
					<li><a href='#gallery'>Gallery</a></li>
					<li><a href='#team'>Our team</a></li>
					<li><a href='#contact'>Contact Us</a></li>
				<?php } else { ?>
					<li><a href='<?= $relative_path ?>' title='HomePage'>Home</a></li>
					<li><a href='<?= $relative_path ?>events' title='Events'>Events</a></li>
					<li><a href='<?= $relative_path ?>competitions' title='Competitions'>Competitions</a></li>
					<?php if($register_closed!=true) { ?>
					<li><a href='<?= $relative_path ?>register' title='Participate'>Participate</a></li>
					<?php } ?>
					<?php if($campus_ambassador_closed!=true) { ?>
					<li><a href='<?= $relative_path ?>campus_ambassador' title='Campus ambassador'>Campus ambassador</a></li>
					<?php } ?>
					<?php if($tshirt_closed!=true) { ?>
					<li><a href='<?= $relative_path ?>tshirt' title='T-shirt design'>T-shirt design</a></li>
					<?php } ?>
				<?php } ?>
				<li class="iitgLogo">
					<a href="http://iitg.ernet.in/" target="_blank" title="Indian Institute of Technology">
					<span class="hidden-lg hidden-md hidden-sm">IIT Guwahati</span>
						<img style="height:50px;" src=<?php echo "$relative_path","images/logo/iitg_logo.png"; ?> />
					</a>	
				</li>
			</ul> 
		</div>
	</div>
</nav>

<link rel="stylesheet" href=<?php echo "$relative_path","css/navbar.css"; ?> type="text/css" />

<script type="text/javascript">
	var current_page = "<?= $current_page ?>";
</script>

<script type="text/javascript" src=<?php echo "$relative_path","js/navbar.js"; ?> ></script>