<?php
$site_prefix = '/var/www/localhost/htdocs/ProseVisTest/ProseVis';

$ProseVis_Settings = array (
		'page_pool' => array ("home", "data", "doc", "code", "people"), // the first one as home page
		'proc_server' => 'stampede.tacc.utexas.edu',
		'proc_username' => 'duotacc',
		'proc_token' => 'DUxMU6u0DkLhmbc3PKhSog==',
		'key_path' => "$site_prefix/../proseVisCrypto.enc", 
		'email_server' => 'login.ischool.utexas.edu',
		'email_username' => 'duotacc',
		'email_password' => '', # password removed
		'kMaxSz' => 5 * 1024 * 1024, // less than 5MB
		'extensions' => array('.xml', '.zip'),
		'privatekey' => "6LdqrtESAAAAAJd9UDNw9fU-48jojyoIaxp2XUbu",
		'enableCaptcha' => false,
		'java' => '/var/www/localhost/htdocs/ProseVisTest/bin/jdk1.7.0_25/bin/java',
		'javac' => '/var/www/localhost/htdocs/ProseVisTest/bin/jdk1.7.0_25/bin/javac'
	);

$user_paras = array(
		"Operation"=>"1",
		"job_name"=>"ProseVisDemo",
		"email"=>"wisdom.to.pilot@gmail.com",
		"comparison_range"=>"all",
		"num_rounds"=>"1",
		"weighting_power"=>"32",
		"phonemes_window_size"=>"8",
		"pos_weight"=>"1",
		"accent_weight"=>"1",
		"stress_weight"=>"1",
		"tone_weight"=>"1",
		"phraseId_weight"=>"0",
		"breakIndex_weight"=>"1",
		"phonemeId_weight"=>"1",
	);
?>
