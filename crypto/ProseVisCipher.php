<?php
class ProseVisCipher {
	public $plain_text;
	public $cipher_text;
	private $key;
	private $iv;
	private $key_path;
	
	function __construct($file) {
		$this->key_path = $file;
		$key_hash = hash_file('sha256', $this->key_path, true);
		$this->key = substr($key_hash, 0, 16);
		$this->iv = substr(hash('sha256', $this->key, true), 0, 16);
	}
	
	function encrypt() {
		$this->cipher_text = openssl_encrypt($this->plain_text, 'aes-128-cbc', $this->key, False, $this->iv);
		return $this->cipher_text;
	}

	function decrypt() {
		$this->plain_text = openssl_decrypt($this->cipher_text, 'aes-128-cbc', $this->key, False, $this->iv);
		return $this->plain_text;
	}
}

?>