<?php 
require_once('lib/recaptchalib.php');

function captcha_check () {
	global $ProseVis_Settings;
	return recaptcha_check_answer (
			$ProseVis_Settings['privatekey'],
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]
	);
}

function email_check() {
	if (isset($_POST['email']) &&
			filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		return True;

	return False;
}

function file_check() {
	global $ProseVis_Settings;
	if (!isset($_FILES['documents'])) {
		return 'Corrupt form - No document. ';
	}
	elseif ($_FILES['documents']['size'][0] > $ProseVis_Settings['kMaxSz']){
		return 'File size exceeds maximum processing capacity';
	}
	else {
		$file_name = $_FILES['documents']['name'][0];
		$file_ext = substr($file_name, -4);
		$support_exts = $ProseVis_Settings['extensions'];
		$support_exts_str = implode(' or ', $support_exts);
		if (!in_array($file_ext, $support_exts)) {
			return "Please upload supported-format file: $support_exts_str.";
		}
	}
	return '';
}
?>