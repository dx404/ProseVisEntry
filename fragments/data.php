<?php
require_once('lib/check.php');
require_once('crypto/ProseVisCipher.php');
require_once('lib/ProseVisTask.php');
$error_msg = '';
if (!isset($_POST) || count($_POST) == 0) {
	$error_msg = '<span style="color:green;">Please Fill in the following form </span>';
}
elseif ($ProseVis_Settings['enableCaptcha'] && !captcha_check()){
	$error_msg = "pesky Captcha didn't like your answer.  Be a good sport and try again.";
}
elseif (!email_check()) {
	$error_msg = "Please fill in a valid email address. ";
}
elseif (!isset($_FILES['documents'])) {
	$error_msg = 'Corrupt form - No document. ';
}
else {
	$error_msg = file_check();
}

if (strlen($error_msg) == 0 ) { // no error, to process
	$task = new ProseVisTask($_POST, $_FILES['documents']);
	$task->pack();
	$task->send();
	$task->invoke();
}
?>
<script type="text/javascript" src=""></script>
<div>
	<p>ProseVis displays documents after they have have been processed to
		extract meta-information about the sound of text. ProseVis users may
		upload their documents for processing on this page. Processing may
		take anywhere from five minutes to a couple days depending on server
		load. We will email you at your provided address with a link to
		download the processed data accepted by ProseVis.
	</p>
</div>

<div>
	<p>Currently, the data processing machinery only accepts TEI-XML files.</p>
</div>

<div>
	<p style="color:red;">
		<?php if (isset($error_msg)) { echo $error_msg;} ?>
	</p>
</div>

<form action="index.php?page=data"
	enctype="multipart/form-data" 
	method="post" 
	name="interface"
>
	<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" >
	
	<div style="margin-bottom: 1em;"><hr>
		<table class="data">
			<tr>
				<td width="300"> Data processing: </td>
				<td id="func-switch">
					<label id="Operation-0">
						<input type="radio" name="Operation" value="0" checked> 
						Analyze single document
					</label>
					<label id="Operation-1">
						<input type="radio" name="Operation" value="1" >
						Compare multiple documents
					</label>
				</td>
			</tr><tr>
				<td> Job Name: </td>
				<td> <input type="text" name="job_name" size="70"> </td>
			</tr><tr>
				<td> Email: </td>
				<td> <input type="text" name="email" size="70"> </td>
			</tr><tr>
				<td colspan="2" class="note" style="font-weight: normal;">
					<span class="multiple">Users must upload a zip file containing documents
					(TEI-XML files) for processing and comparisons will be calculated
					between the contained documents.</span></td>
			</tr><tr>
				<td id="file-type"> Single TEI-XML file (*.xml): </td>
				<td> <input type="file" name="documents[]" size="70"> </td>
			</tr>
		</table> <hr>
		<table class="data multiple" border="0" style="display:none;">	
			<thead>
				<tr>
					<th width="300">Parameter</th>
					<th>Value</th>
					<th>Note</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Document range:</td>
					<td><input type="text" name="comparison_range"
						onchange="validateList(document.interface.comparison_range);"
						value="all" size="9"></td>
					<td colspan="2"><p>The zero-based, comma-separated, indices of the
							documents that should be compared with all other documents. For
							example, using '0' means that only the first document will be
							compared with all others. Using '0,2' means that the first and
							third document submitted will be compared with all others. Using
							'all' means that everything will be compared with everything else.
						</p>
					</td>
				</tr>
				<tr>
					<td>Number of sampling rounds:</td>
					<td><input type="text" name="num_rounds" size="9" value="1"
						onchange="validateInteger(document.interface.num_rounds);">
					</td>
					<td><p>The number of sampling rounds to use (relevant when using sampling)</p></td>	
				</tr>
				<tr>
					<td>Should sampling be used:</td>
					<td><input type="checkbox" name="use_sampling" size="9">
					<td colspan="2"><p>Should sampling be used? (useful for very large data sets)</p></td>
				</tr>
				<tr>
					<td>Weighting power:</td>
					<td><input type="text" name="weighting_power" size="9" value="32"
						onchange="validateIntegerRange(document.interface.weighting_power,0,100);">
					</td>
					<td colspan="2"><p>Main parameter to be controlled. Valid values are
							in the range 0 to 100. High values cause it to behave like
							nearest-neighbor - finds the closest window; At lower values, it
							uses a larger neighborhood size to make the instance-based
							prediction; When set to zero, it equally weighs all examples.</p>
					</td>
				</tr>
				<tr>
					<td>Window size in phonemes:</td>
					<td><input type="text" name="phonemes_window_size" size="9" value="8"
						onchange="validateInteger(document.interface.phonemes_window_size);"><br>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>Include part of speech:</td>
					<td><input type="checkbox" name="pos_weight" checked="checked" /></td>
					<td></td>
				</tr>
				<tr>
					<td>Include accent:</td>
					<td><input type="checkbox" name="accent_weight" checked="checked"></td>
					<td></td>
				</tr>
				<tr>
					<td>Include stress:</td>
					<td><input type="checkbox" name="stress_weight" checked="checked"></td>
					<td></td>
				</tr>
				<tr>
					<td>Include tone:</td>
					<td><input type="checkbox" name="tone_weight" checked="checked"><input
						type="hidden" name="phraseId_weight" checked="checked"></td>
					<td></td>
				</tr>
				<tr>
					<td>Include break index:</td>
					<td><input type="checkbox" name="breakIndex_weight"
						checked="checked"></td>
					<td></td>
				</tr>
				<tr>
					<td>Include sound:</td>
					<td><input type="checkbox" name="phonemeId_weight"></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<!-- Capcha stuff -->
	<div style="margin-bottom: 1em;">
		<?php 
			require_once('lib/recaptchalib.php');
			$publickey = "6LdqrtESAAAAAFVqiQ9BCphNdxVmxXO2KVKtImdD";
			echo recaptcha_get_html($publickey); 
 		?>
	</div>
	<hr>

	<button type="submit" >Submit to Process</button>


<hr>

</form>
