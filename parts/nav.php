<?php
include_once "classes/Menu.php";
use classes\Menu;
$menu = new Menu();
?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand"><span>App</span> Starter</a>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php echo $menu->getMenu("header"); ?>
			</ul>
		</div>

	</div>
</nav>