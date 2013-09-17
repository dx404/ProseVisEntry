<?php
class ProseVisTask {
	private $taskID;
	private $local_workspace;
	private $local_prefix = "uploads/";
	private $local_log = "uploads/log.txt";
	private $remote_prefix = "ProseVisService/data/src/";
	private $password;
	
	private $staus = True;
	private $raw_file_obj;
	private $raw_temp_path;
	private $raw_file_name;
	private $raw_file_ext;
	
	private $pack_path; //$local_prefix . $zip file name
	
	private $isToCompare = False;
	
	public $user_paras = array(
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
	
	private $user_paras_json;

	function __construct($paras, $file) {
		$this->taskID = uniqid();
		$this->log_header();
		$this->local_workspace = "$this->local_prefix" . "pv$this->taskID/";
		echo "<p style='color:green'> Your Task ID is $this->taskID. 
			Please save it for future reference. You will receive an email shortly after the processing completion. </p>";
		$this->prepare_user_paras($paras);
		$this->categorize_file($file);
		$this->getPassword();
	}
	
	function proseVis_shell_exec($cmd) {
		$cmd_filter = '';
		$pos = strpos($cmd, 'conn.sh');
		if ($pos === false)
			$cmd_filter = $cmd;
		else #hiding password from the log file
			$cmd_filter = substr($cmd, 0, -12) . '*==========*';
			
		$cmd_filter = htmlspecialchars($cmd_filter);
		shell_exec("echo \"$cmd_filter\" >> $this->local_log");
		$status = shell_exec("$cmd >> $this->local_log 2>> $this->local_log");
		return $status;
	}
	
	function log_header() {
		shell_exec("echo -e '\n\n'===== Task: $this->taskID ===== >> $this->local_log");
		shell_exec("date >> $this->local_log");
	}
	
	function getPassword() {
		global $ProseVis_Settings;
		$pass_token = $ProseVis_Settings['proc_token'];
		$key_path = $ProseVis_Settings['key_path'];
		$cipher = new ProseVisCipher($key_path);
		$cipher->cipher_text = $pass_token;
		$this->password = $cipher->decrypt();
	}
	
	private function prepare_user_paras ($paras) {
		foreach ($this->user_paras as $key => &$value)
			if (isset($paras[$key])) {
				$value = $paras[$key];
				if ($value == 'on' || $value == 'On' || 
					$value == 'true' || $value == 'True' || 
					$value == 'yes' || $value == 'Yes'){
					$value = '1';		
				} 
				if ($value == ''){
					$value = '0';
				}
			}
		$this->isToCompare = ($this->user_paras['Operation'] == '1');
		$this->user_paras_json = json_encode($this->user_paras);
	}
	
	private function categorize_file($file){
		$this->raw_file_obj = $file;
		$this->raw_temp_path = $this->raw_file_obj['tmp_name'][0];
		$this->raw_file_name = $this->raw_file_obj['name'][0];
		$this->raw_file_ext = substr($this->raw_file_name, -4);
	}
	
	private function prepare_workspace() {
		mkdir($this->local_workspace);
		
		$fp = fopen($this->local_workspace . 'info.json', 'w');
		fwrite($fp, $this->user_paras_json);
		fclose($fp);
	}
	
	// find . -name '*.xml' -exec mv '{}' . \;
	private function prepare_archive() {
		if ($this->isToCompare){
			$this->proseVis_shell_exec("
				cd $this->local_prefix/pv$this->taskID/;
				find . -name '*.xml' -exec mv '{}' . \;;
				zip src.zip *.xml;
				cd ../;
				zip pv$this->taskID pv$this->taskID/*.zip pv$this->taskID/*.json;
				rm -r pv$this->taskID;"
			);}
		else {
			$this->proseVis_shell_exec("
				cd $this->local_prefix;
				zip pv$this->taskID pv$this->taskID/*.xml pv$this->taskID/*.json;
				rm -r pv$this->taskID;"
			);}
		$this->pack_path = $this->local_prefix . "pv$this->taskID.zip";
	}
	
	public function pack() {
		$this->prepare_workspace();
		if($this->raw_file_ext == '.xml'){
			$this->status = 
				move_uploaded_file(
					$this->raw_temp_path, 
					$this->local_workspace . $this->raw_file_name);
		}
		elseif ($this->raw_file_ext == '.zip'){
			$this->status = (NULL != $this->proseVis_shell_exec("
					unzip -d  $this->local_workspace \"$this->raw_temp_path\";
				") );
		}
		else 
			die ("Unsupported file format! ");
		
		if (!$this->status) 
			die ('Internal error: failed to move the file');
		
		$this->prepare_archive();
	}
	
	public function send() {
		$this->proseVis_shell_exec("connector/conn.sh -send $this->pack_path $this->remote_prefix $this->password");
		$this->proseVis_shell_exec("rm -f $this->pack_path");
	}
	
	public function invoke() {
		$task = "connector/conn.sh -exec";
		$remote_cmd = "cd ProseVisService;" .
					  "./control.sh $this->taskID > log/std.txt 2> log/error.txt;" .
					  "sleep 5; cd ~/;";
		$pw = $this->password;
		
		$cmd = "$task \"$remote_cmd\" $pw";
		$this->proseVis_shell_exec($cmd);
	}

}

?>