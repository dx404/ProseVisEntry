<?php
	//for development purpose
	ini_set('display_errors', 'On');
	include_once('settings.php');
	
	/** Identify the corresponding page to load
	 *  Make the page selection by HTTP GET request
	 *  Invalid Request redirects to the home page
	 */
	$page = $ProseVis_Settings['page_pool'][0];
	if (isset($_GET['page']) && in_array(
			$_GET['page'], $ProseVis_Settings['page_pool'] )) {
		$page = $_GET['page'];
	}
	
	/** Creates the relative path to the page fragment
	 *  PHP double quote supports variable insertion 
	 */ 
	$content = "fragments/$page.php" ;
?>
<!DOCTYPE html>
<html>
<head>
	<title>ProseVis</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<?php if ($page == 'data'): ?>
	<script type="text/javascript" src="JS/func.js"></script>
	<script type="text/javascript" src="JS/jquery.js"></script>
	<script type="text/javascript" src="JS/data.js"></script>
<?php endif; ?>
</head>

<body>
	<div id="Header">
		<a href="index.php?page=home" title="ProseVis Home">ProseVis</a>
	</div>
	
	<div id="Content">
		<?php include($content) ?>
	</div>
	
	<?php include('fragments/menu.php') ?>
	
	<!-- BlueRobot was here. -->
	<!-- Borrowed with thanks from bluerobot.com -->
</body>
</html>